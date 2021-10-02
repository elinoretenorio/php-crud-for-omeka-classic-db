<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaSearchTexts;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaSearchTexts\{ OmekaSearchTextsDto, OmekaSearchTextsModel };

class OmekaSearchTextsModelTest extends TestCase
{
    private array $input;
    private OmekaSearchTextsDto $dto;
    private OmekaSearchTextsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 9276,
            "record_type" => "us",
            "record_id" => 7155,
            "public" => 9701,
            "title" => "Time national see leg kind into. Great third source those parent operation.",
            "text" => "Probably industry community glass. Space take fast Republican. Something employee fire sort simply visit state property.",
        ];
        $this->dto = new OmekaSearchTextsDto($this->input);
        $this->model = new OmekaSearchTextsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaSearchTextsModel(null);

        $this->assertInstanceOf(OmekaSearchTextsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 3078;
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
        $expected = "American";
        $model = $this->model;
        $model->setRecordType($expected);

        $this->assertEquals($expected, $model->getRecordType());
    }

    public function testGetRecordId(): void
    {
        $this->assertEquals($this->dto->recordId, $this->model->getRecordId());
    }

    public function testSetRecordId(): void
    {
        $expected = 777;
        $model = $this->model;
        $model->setRecordId($expected);

        $this->assertEquals($expected, $model->getRecordId());
    }

    public function testGetPublic(): void
    {
        $this->assertEquals($this->dto->public, $this->model->getPublic());
    }

    public function testSetPublic(): void
    {
        $expected = 8496;
        $model = $this->model;
        $model->setPublic($expected);

        $this->assertEquals($expected, $model->getPublic());
    }

    public function testGetTitle(): void
    {
        $this->assertEquals($this->dto->title, $this->model->getTitle());
    }

    public function testSetTitle(): void
    {
        $expected = "Often man let a education join blue small. Walk feel none decision least cultural degree decide.";
        $model = $this->model;
        $model->setTitle($expected);

        $this->assertEquals($expected, $model->getTitle());
    }

    public function testGetText(): void
    {
        $this->assertEquals($this->dto->text, $this->model->getText());
    }

    public function testSetText(): void
    {
        $expected = "Subject direction feel yourself lay so image. Pay quality gas. Democratic ready them still.";
        $model = $this->model;
        $model->setText($expected);

        $this->assertEquals($expected, $model->getText());
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