<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaCollections;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaCollections\{ OmekaCollectionsDto, OmekaCollectionsModel };

class OmekaCollectionsModelTest extends TestCase
{
    private array $input;
    private OmekaCollectionsDto $dto;
    private OmekaCollectionsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 9218,
            "public" => 1730,
            "featured" => 4695,
            "added" => "2021-09-22 04:03:16",
            "modified" => "2021-10-09 23:12:48",
            "owner_id" => 8895,
        ];
        $this->dto = new OmekaCollectionsDto($this->input);
        $this->model = new OmekaCollectionsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaCollectionsModel(null);

        $this->assertInstanceOf(OmekaCollectionsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 9283;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetPublic(): void
    {
        $this->assertEquals($this->dto->public, $this->model->getPublic());
    }

    public function testSetPublic(): void
    {
        $expected = 7659;
        $model = $this->model;
        $model->setPublic($expected);

        $this->assertEquals($expected, $model->getPublic());
    }

    public function testGetFeatured(): void
    {
        $this->assertEquals($this->dto->featured, $this->model->getFeatured());
    }

    public function testSetFeatured(): void
    {
        $expected = 5579;
        $model = $this->model;
        $model->setFeatured($expected);

        $this->assertEquals($expected, $model->getFeatured());
    }

    public function testGetAdded(): void
    {
        $this->assertEquals($this->dto->added, $this->model->getAdded());
    }

    public function testSetAdded(): void
    {
        $expected = "2021-10-07 10:58:11";
        $model = $this->model;
        $model->setAdded($expected);

        $this->assertEquals($expected, $model->getAdded());
    }

    public function testGetModified(): void
    {
        $this->assertEquals($this->dto->modified, $this->model->getModified());
    }

    public function testSetModified(): void
    {
        $expected = "2021-09-18 02:31:44";
        $model = $this->model;
        $model->setModified($expected);

        $this->assertEquals($expected, $model->getModified());
    }

    public function testGetOwnerId(): void
    {
        $this->assertEquals($this->dto->ownerId, $this->model->getOwnerId());
    }

    public function testSetOwnerId(): void
    {
        $expected = 8460;
        $model = $this->model;
        $model->setOwnerId($expected);

        $this->assertEquals($expected, $model->getOwnerId());
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