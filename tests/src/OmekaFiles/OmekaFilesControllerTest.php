<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaFiles;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaFiles\{ OmekaFilesDto, OmekaFilesModel, OmekaFilesController };

class OmekaFilesControllerTest extends TestCase
{
    private array $input;
    private OmekaFilesDto $dto;
    private OmekaFilesModel $model;
    private $service;
    private $request;
    private $stream;
    private OmekaFilesController $controller;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 2299,
            "item_id" => 3683,
            "order" => 2694,
            "size" => 3397,
            "has_derivative_image" => 5002,
            "authentication" => "size",
            "mime_type" => "network",
            "type_os" => "hear",
            "filename" => "Return force although customer measure agency market. Reflect research do your often party table.",
            "original_filename" => "Whom his attack environment cell surface. Win major magazine training store probably instead become.",
            "modified" => "2021-09-28 14:56:18",
            "added" => "2021-09-18 20:53:55",
            "stored" => 2766,
            "metadata" => "Speech design center animal. Cost but good two agency.",
        ];
        $this->dto = new OmekaFilesDto($this->input);
        $this->model = new OmekaFilesModel($this->dto);
        $this->service = $this->createMock("OmekaClassic\OmekaFiles\IOmekaFilesService");
        $this->request = $this->createMock("Psr\Http\Message\ServerRequestInterface");
        $this->stream = $this->createMock("Psr\Http\Message\StreamInterface");
        $this->controller = new OmekaFilesController(
            $this->service
        );

        $this->stream->method("getContents")
            ->willReturn("[]");

        $this->request->method("getBody")
            ->willReturn($this->stream);

        $this->request->method("getParsedBody")
            ->willReturn($this->input);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
        unset($this->service);
        unset($this->request);
        unset($this->stream);
        unset($this->controller);
    }

    public function testInsert_ReturnsResponse(): void
    {
        $id = 3631;
        $expected = ["result" => $id];
        $args = [];

        $this->service->expects($this->once())
            ->method("createModel")
            ->with($this->request->getParsedBody())
            ->willReturn($this->model);
        $this->service->expects($this->once())
            ->method("insert")
            ->with($this->model)
            ->willReturn($id);

        $actual = $this->controller->insert($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testUpdate_ReturnsErrorResponse(): void
    {
        $expected = ["result" => 0, "message" => "Invalid input"];
        $args = ["id" => 0];

        $actual = $this->controller->update($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testUpdate_ReturnsResponse(): void
    {
        $id = 5774;
        $expected = ["result" => $id];
        $args = ["id" => 1080];

        $this->service->expects($this->once())
            ->method("createModel")
            ->with($this->request->getParsedBody())
            ->willReturn($this->model);
        $this->service->expects($this->once())
            ->method("update")
            ->with($this->model)
            ->willReturn($id);

        $actual = $this->controller->update($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testGet_ReturnsErrorResponse(): void
    {
        $expected = ["result" => 0, "message" => "Invalid input"];
        $args = ["id" => 0];

        $actual = $this->controller->get($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testGet_ReturnsResponse(): void
    {
        $expected = ["result" => $this->model->jsonSerialize()];
        $args = ["id" => 4634];

        $this->service->expects($this->once())
            ->method("get")
            ->with($args["id"])
            ->willReturn($this->model);

        $actual = $this->controller->get($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testGetAll_ReturnsResponse(): void
    {
        $expected = ["result" => [$this->model->jsonSerialize()]];
        $args = [];

        $this->service->expects($this->once())
            ->method("getAll")
            ->willReturn([$this->model]);

        $actual = $this->controller->getAll($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testDelete_ReturnsErrorResponse(): void
    {
        $expected = ["result" => 0, "message" => "Invalid input"];
        $args = ["id" => 0];

        $actual = $this->controller->delete($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testDelete_ReturnsResponse(): void
    {
        $id = 4271;
        $expected = ["result" => $id];
        $args = ["id" => 1529];

        $this->service->expects($this->once())
            ->method("delete")
            ->with($args["id"])
            ->willReturn($id);

        $actual = $this->controller->delete($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }
}