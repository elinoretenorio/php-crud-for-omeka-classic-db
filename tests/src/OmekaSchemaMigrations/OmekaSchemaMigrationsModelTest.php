<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaSchemaMigrations;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaSchemaMigrations\{ OmekaSchemaMigrationsDto, OmekaSchemaMigrationsModel };

class OmekaSchemaMigrationsModelTest extends TestCase
{
    private array $input;
    private OmekaSchemaMigrationsDto $dto;
    private OmekaSchemaMigrationsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6707,
            "version" => "whom",
        ];
        $this->dto = new OmekaSchemaMigrationsDto($this->input);
        $this->model = new OmekaSchemaMigrationsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaSchemaMigrationsModel(null);

        $this->assertInstanceOf(OmekaSchemaMigrationsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 6711;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetVersion(): void
    {
        $this->assertEquals($this->dto->version, $this->model->getVersion());
    }

    public function testSetVersion(): void
    {
        $expected = "natural";
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