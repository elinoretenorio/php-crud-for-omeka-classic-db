<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaItemTypesElements;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaItemTypesElements\{ OmekaItemTypesElementsDto, OmekaItemTypesElementsModel };

class OmekaItemTypesElementsModelTest extends TestCase
{
    private array $input;
    private OmekaItemTypesElementsDto $dto;
    private OmekaItemTypesElementsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 794,
            "item_type_id" => 5622,
            "element_id" => 2626,
            "order" => 5063,
        ];
        $this->dto = new OmekaItemTypesElementsDto($this->input);
        $this->model = new OmekaItemTypesElementsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaItemTypesElementsModel(null);

        $this->assertInstanceOf(OmekaItemTypesElementsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 7142;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetItemTypeId(): void
    {
        $this->assertEquals($this->dto->itemTypeId, $this->model->getItemTypeId());
    }

    public function testSetItemTypeId(): void
    {
        $expected = 8946;
        $model = $this->model;
        $model->setItemTypeId($expected);

        $this->assertEquals($expected, $model->getItemTypeId());
    }

    public function testGetElementId(): void
    {
        $this->assertEquals($this->dto->elementId, $this->model->getElementId());
    }

    public function testSetElementId(): void
    {
        $expected = 6161;
        $model = $this->model;
        $model->setElementId($expected);

        $this->assertEquals($expected, $model->getElementId());
    }

    public function testGetOrder(): void
    {
        $this->assertEquals($this->dto->order, $this->model->getOrder());
    }

    public function testSetOrder(): void
    {
        $expected = 5684;
        $model = $this->model;
        $model->setOrder($expected);

        $this->assertEquals($expected, $model->getOrder());
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