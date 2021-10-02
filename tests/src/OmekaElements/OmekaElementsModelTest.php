<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaElements;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaElements\{ OmekaElementsDto, OmekaElementsModel };

class OmekaElementsModelTest extends TestCase
{
    private array $input;
    private OmekaElementsDto $dto;
    private OmekaElementsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 5232,
            "element_set_id" => 6344,
            "order" => 9100,
            "name" => "although",
            "description" => "Left system someone foot street parent. Choose source because season.",
            "comment" => "Test will cause contain development day garden. Enter throughout budget middle. Office look eye participant send. Conference yeah face day crime.",
        ];
        $this->dto = new OmekaElementsDto($this->input);
        $this->model = new OmekaElementsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaElementsModel(null);

        $this->assertInstanceOf(OmekaElementsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 3854;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetElementSetId(): void
    {
        $this->assertEquals($this->dto->elementSetId, $this->model->getElementSetId());
    }

    public function testSetElementSetId(): void
    {
        $expected = 3236;
        $model = $this->model;
        $model->setElementSetId($expected);

        $this->assertEquals($expected, $model->getElementSetId());
    }

    public function testGetOrder(): void
    {
        $this->assertEquals($this->dto->order, $this->model->getOrder());
    }

    public function testSetOrder(): void
    {
        $expected = 6712;
        $model = $this->model;
        $model->setOrder($expected);

        $this->assertEquals($expected, $model->getOrder());
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->dto->name, $this->model->getName());
    }

    public function testSetName(): void
    {
        $expected = "fast";
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
        $expected = "Week policy two process that. These certain carry ok speak.";
        $model = $this->model;
        $model->setDescription($expected);

        $this->assertEquals($expected, $model->getDescription());
    }

    public function testGetComment(): void
    {
        $this->assertEquals($this->dto->comment, $this->model->getComment());
    }

    public function testSetComment(): void
    {
        $expected = "Ground work evidence agree popular. Few TV single kitchen. Base notice animal soldier.";
        $model = $this->model;
        $model->setComment($expected);

        $this->assertEquals($expected, $model->getComment());
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