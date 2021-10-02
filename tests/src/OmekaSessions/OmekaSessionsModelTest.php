<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaSessions;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaSessions\{ OmekaSessionsDto, OmekaSessionsModel };

class OmekaSessionsModelTest extends TestCase
{
    private array $input;
    private OmekaSessionsDto $dto;
    private OmekaSessionsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "session_id" => 2244,
            "id" => "clearly",
            "modified" => 9323,
            "lifetime" => 5591,
            "data" => "Right method make fear peace fact human big.",
        ];
        $this->dto = new OmekaSessionsDto($this->input);
        $this->model = new OmekaSessionsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaSessionsModel(null);

        $this->assertInstanceOf(OmekaSessionsModel::class, $model);
    }

    public function testGetSessionId(): void
    {
        $this->assertEquals($this->dto->sessionId, $this->model->getSessionId());
    }

    public function testSetSessionId(): void
    {
        $expected = 7476;
        $model = $this->model;
        $model->setSessionId($expected);

        $this->assertEquals($expected, $model->getSessionId());
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = "better";
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetModified(): void
    {
        $this->assertEquals($this->dto->modified, $this->model->getModified());
    }

    public function testSetModified(): void
    {
        $expected = 4388;
        $model = $this->model;
        $model->setModified($expected);

        $this->assertEquals($expected, $model->getModified());
    }

    public function testGetLifetime(): void
    {
        $this->assertEquals($this->dto->lifetime, $this->model->getLifetime());
    }

    public function testSetLifetime(): void
    {
        $expected = 6548;
        $model = $this->model;
        $model->setLifetime($expected);

        $this->assertEquals($expected, $model->getLifetime());
    }

    public function testGetData(): void
    {
        $this->assertEquals($this->dto->data, $this->model->getData());
    }

    public function testSetData(): void
    {
        $expected = "Around culture happen build in.";
        $model = $this->model;
        $model->setData($expected);

        $this->assertEquals($expected, $model->getData());
    }

    public function testToDto(): void
    {
        $this->assertEquals($this->dto, $this->model->toDto());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->input, $this->model->jsonSerialize());
    }
}