<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaOptions;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaOptions\{ OmekaOptionsDto, OmekaOptionsModel };

class OmekaOptionsModelTest extends TestCase
{
    private array $input;
    private OmekaOptionsDto $dto;
    private OmekaOptionsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 1971,
            "name" => "enjoy",
            "value" => "Individual score later everything sport. Away receive figure feel. Produce the military attorney government nearly not.",
        ];
        $this->dto = new OmekaOptionsDto($this->input);
        $this->model = new OmekaOptionsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaOptionsModel(null);

        $this->assertInstanceOf(OmekaOptionsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 6495;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->dto->name, $this->model->getName());
    }

    public function testSetName(): void
    {
        $expected = "up";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
    }

    public function testGetValue(): void
    {
        $this->assertEquals($this->dto->value, $this->model->getValue());
    }

    public function testSetValue(): void
    {
        $expected = "National ok those need. Current character right view offer total.";
        $model = $this->model;
        $model->setValue($expected);

        $this->assertEquals($expected, $model->getValue());
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