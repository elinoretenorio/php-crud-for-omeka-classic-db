<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaElementTexts;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaElementTexts\{ OmekaElementTextsDto, OmekaElementTextsModel };

class OmekaElementTextsModelTest extends TestCase
{
    private array $input;
    private OmekaElementTextsDto $dto;
    private OmekaElementTextsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 5633,
            "record_id" => 8199,
            "record_type" => "check",
            "element_id" => 6735,
            "html" => 3592,
            "text" => "Evidence cut find interview check. This certainly force lose tough. Tend son lawyer doctor.",
        ];
        $this->dto = new OmekaElementTextsDto($this->input);
        $this->model = new OmekaElementTextsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaElementTextsModel(null);

        $this->assertInstanceOf(OmekaElementTextsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 5162;
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
        $expected = 4392;
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
        $expected = "spend";
        $model = $this->model;
        $model->setRecordType($expected);

        $this->assertEquals($expected, $model->getRecordType());
    }

    public function testGetElementId(): void
    {
        $this->assertEquals($this->dto->elementId, $this->model->getElementId());
    }

    public function testSetElementId(): void
    {
        $expected = 4733;
        $model = $this->model;
        $model->setElementId($expected);

        $this->assertEquals($expected, $model->getElementId());
    }

    public function testGetHtml(): void
    {
        $this->assertEquals($this->dto->html, $this->model->getHtml());
    }

    public function testSetHtml(): void
    {
        $expected = 2361;
        $model = $this->model;
        $model->setHtml($expected);

        $this->assertEquals($expected, $model->getHtml());
    }

    public function testGetText(): void
    {
        $this->assertEquals($this->dto->text, $this->model->getText());
    }

    public function testSetText(): void
    {
        $expected = "Every along child no really three case major. Common address blue space draw economic serve later. Capital example listen method. Attention college home she speak network.";
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