<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaItemTypes;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaItemTypes\{ OmekaItemTypesDto, OmekaItemTypesModel };

class OmekaItemTypesModelTest extends TestCase
{
    private array $input;
    private OmekaItemTypesDto $dto;
    private OmekaItemTypesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6829,
            "name" => "court",
            "description" => "Plant increase no. Poor power man job bag door off. Cell drive mission the another Republican recognize.",
        ];
        $this->dto = new OmekaItemTypesDto($this->input);
        $this->model = new OmekaItemTypesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaItemTypesModel(null);

        $this->assertInstanceOf(OmekaItemTypesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 6992;
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
        $expected = "according";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
    }

    public function testGetDescription(): void
    {
        $this->assertEquals($this->dto->description, $this->model->getDescription());
    }

    public function testSetDescription(): void
    {
        $expected = "Marriage little task law. Market PM chair reveal appear. Seek produce sit night. Light gun lawyer blood local.";
        $model = $this->model;
        $model->setDescription($expected);

        $this->assertEquals($expected, $model->getDescription());
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