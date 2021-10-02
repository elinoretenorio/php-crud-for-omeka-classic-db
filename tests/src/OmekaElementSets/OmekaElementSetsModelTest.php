<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaElementSets;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaElementSets\{ OmekaElementSetsDto, OmekaElementSetsModel };

class OmekaElementSetsModelTest extends TestCase
{
    private array $input;
    private OmekaElementSetsDto $dto;
    private OmekaElementSetsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 1334,
            "record_type" => "charge",
            "name" => "watch",
            "description" => "Policy reality represent. Seven military long without later. Instead institution past.",
        ];
        $this->dto = new OmekaElementSetsDto($this->input);
        $this->model = new OmekaElementSetsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaElementSetsModel(null);

        $this->assertInstanceOf(OmekaElementSetsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 2414;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetRecordType(): void
    {
        $this->assertEquals($this->dto->recordType, $this->model->getRecordType());
    }

    public function testSetRecordType(): void
    {
        $expected = "these";
        $model = $this->model;
        $model->setRecordType($expected);

        $this->assertEquals($expected, $model->getRecordType());
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->dto->name, $this->model->getName());
    }

    public function testSetName(): void
    {
        $expected = "hundred";
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
        $expected = "Door pressure gun natural attention him participant instead. Sea cup suggest idea able relate score. Outside various prepare nothing fund cultural rise.";
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