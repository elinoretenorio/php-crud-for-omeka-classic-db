<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaTags;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaTags\{ OmekaTagsDto, OmekaTagsModel };

class OmekaTagsModelTest extends TestCase
{
    private array $input;
    private OmekaTagsDto $dto;
    private OmekaTagsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 4936,
            "name" => "land",
        ];
        $this->dto = new OmekaTagsDto($this->input);
        $this->model = new OmekaTagsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaTagsModel(null);

        $this->assertInstanceOf(OmekaTagsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 4581;
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
        $expected = "conference";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
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