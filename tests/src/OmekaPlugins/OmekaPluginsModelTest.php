<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaPlugins;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaPlugins\{ OmekaPluginsDto, OmekaPluginsModel };

class OmekaPluginsModelTest extends TestCase
{
    private array $input;
    private OmekaPluginsDto $dto;
    private OmekaPluginsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 318,
            "name" => "choice",
            "active" => 243,
            "version" => "foreign",
        ];
        $this->dto = new OmekaPluginsDto($this->input);
        $this->model = new OmekaPluginsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaPluginsModel(null);

        $this->assertInstanceOf(OmekaPluginsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 5785;
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
        $expected = "not";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
    }

    public function testGetActive(): void
    {
        $this->assertEquals($this->dto->active, $this->model->getActive());
    }

    public function testSetActive(): void
    {
        $expected = 9286;
        $model = $this->model;
        $model->setActive($expected);

        $this->assertEquals($expected, $model->getActive());
    }

    public function testGetVersion(): void
    {
        $this->assertEquals($this->dto->version, $this->model->getVersion());
    }

    public function testSetVersion(): void
    {
        $expected = "matter";
        $model = $this->model;
        $model->setVersion($expected);

        $this->assertEquals($expected, $model->getVersion());
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