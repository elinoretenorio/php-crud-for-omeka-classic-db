<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaRecordsTags;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaRecordsTags\{ OmekaRecordsTagsDto, OmekaRecordsTagsModel };

class OmekaRecordsTagsModelTest extends TestCase
{
    private array $input;
    private OmekaRecordsTagsDto $dto;
    private OmekaRecordsTagsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6368,
            "record_id" => 6289,
            "record_type" => "past",
            "tag_id" => 8466,
            "time" => "2021-09-20 21:22:59",
        ];
        $this->dto = new OmekaRecordsTagsDto($this->input);
        $this->model = new OmekaRecordsTagsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaRecordsTagsModel(null);

        $this->assertInstanceOf(OmekaRecordsTagsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 9378;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetRecordId(): void
    {
        $this->assertEquals($this->dto->recordId, $this->model->getRecordId());
    }

    public function testSetRecordId(): void
    {
        $expected = 948;
        $model = $this->model;
        $model->setRecordId($expected);

        $this->assertEquals($expected, $model->getRecordId());
    }

    public function testGetRecordType(): void
    {
        $this->assertEquals($this->dto->recordType, $this->model->getRecordType());
    }

    public function testSetRecordType(): void
    {
        $expected = "you";
        $model = $this->model;
        $model->setRecordType($expected);

        $this->assertEquals($expected, $model->getRecordType());
    }

    public function testGetTagId(): void
    {
        $this->assertEquals($this->dto->tagId, $this->model->getTagId());
    }

    public function testSetTagId(): void
    {
        $expected = 3638;
        $model = $this->model;
        $model->setTagId($expected);

        $this->assertEquals($expected, $model->getTagId());
    }

    public function testGetTime(): void
    {
        $this->assertEquals($this->dto->time, $this->model->getTime());
    }

    public function testSetTime(): void
    {
        $expected = "2021-10-09 04:29:55";
        $model = $this->model;
        $model->setTime($expected);

        $this->assertEquals($expected, $model->getTime());
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