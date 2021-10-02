<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaFiles;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaFiles\{ OmekaFilesDto, OmekaFilesModel, IOmekaFilesService, OmekaFilesService };

class OmekaFilesServiceTest extends TestCase
{
    private $repository;
    private array $input;
    private OmekaFilesDto $dto;
    private OmekaFilesModel $model;
    private IOmekaFilesService $service;

    protected function setUp(): void
    {
        $this->repository = $this->createMock("OmekaClassic\OmekaFiles\IOmekaFilesRepository");
        $this->input = [
            "id" => 2127,
            "item_id" => 874,
            "order" => 1647,
            "size" => 9835,
            "has_derivative_image" => 717,
            "authentication" => "on",
            "mime_type" => "contain",
            "type_os" => "event",
            "filename" => "Themselves others bill TV. Lead station two perform design former.",
            "original_filename" => "Chair require great clear successful such. School their action him that them. Bill enough direction during involve. Protect military where attention.",
            "modified" => "2021-10-09 23:32:14",
            "added" => "2021-09-29 06:35:42",
            "stored" => 5654,
            "metadata" => "Child provide far several. Surface do form analysis sport. Change agree almost could my.",
        ];
        $this->dto = new OmekaFilesDto($this->input);
        $this->model = new OmekaFilesModel($this->dto);
        $this->service = new OmekaFilesService($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->repository);
        unset($this->input);
        unset($this->dto);
        unset($this->model);
        unset($this->service);
    }

    public function testInsert_ReturnsId(): void
    {
        $expected = 1216;

        $this->repository->expects($this->once())
            ->method("insert")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->insert($this->model);
        $this->assertEquals($expected, $actual);
    }

    public function testInsert_ReturnsEmpty(): void
    {
        $expected = 0;

        $this->repository->expects($this->once())
            ->method("insert")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->insert($this->model);
        $this->assertEmpty($actual);
    }

    public function testUpdate_ReturnsRowCount(): void
    {
        $expected = 9786;

        $this->repository->expects($this->once())
            ->method("update")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->update($this->model);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsEmpty(): void
    {
        $expected = 0;

        $this->repository->expects($this->once())
            ->method("update")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->update($this->model);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsNull(): void
    {
        $id = 3763;

        $this->repository->expects($this->once())
            ->method("get")
            ->with($id)
            ->willReturn(null);

        $actual = $this->service->get($id);
        $this->assertNull($actual);
    }

    public function testGet_ReturnsModel(): void
    {
        $id = 439;

        $this->repository->expects($this->once())
            ->method("get")
            ->with($id)
            ->willReturn($this->dto);

        $actual = $this->service->get($id);
        $this->assertEquals($this->model, $actual);
    }

    public function testGetAll_ReturnsEmpty(): void
    {
        $this->repository->expects($this->once())
            ->method("getAll")
            ->willReturn([]);

        $actual = $this->service->getAll();
        $this->assertEmpty($actual);
    }

    public function testGetAll_ReturnsModels(): void
    {
        $this->repository->expects($this->once())
            ->method("getAll")
            ->willReturn([$this->dto]);

        $actual = $this->service->getAll();
        $this->assertEquals([$this->model], $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 3984;
        $expected = 2803;

        $this->repository->expects($this->once())
            ->method("delete")
            ->with($id)
            ->willReturn($expected);

        $actual = $this->service->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testCreateModel_ReturnsNullIfEmpty(): void
    {
        $actual = $this->service->createModel([]);
        $this->assertNull($actual);
    }

    public function testCreateModel_ReturnsModel(): void
    {
        $actual = $this->service->createModel($this->input);
        $this->assertEquals($this->model, $actual);
    }
}