<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaItems;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaItems\{ OmekaItemsDto, OmekaItemsModel };

class OmekaItemsModelTest extends TestCase
{
    private array $input;
    private OmekaItemsDto $dto;
    private OmekaItemsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 300,
            "item_type_id" => 8675,
            "collection_id" => 2975,
            "featured" => 8746,
            "public" => 189,
            "modified" => "2021-10-09 00:03:30",
            "added" => "2021-09-28 18:06:43",
            "owner_id" => 2399,
        ];
        $this->dto = new OmekaItemsDto($this->input);
        $this->model = new OmekaItemsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaItemsModel(null);

        $this->assertInstanceOf(OmekaItemsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 2004;
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
        $expected = 388;
        $model = $this->model;
        $model->setItemTypeId($expected);

        $this->assertEquals($expected, $model->getItemTypeId());
    }

    public function testGetCollectionId(): void
    {
        $this->assertEquals($this->dto->collectionId, $this->model->getCollectionId());
    }

    public function testSetCollectionId(): void
    {
        $expected = 4247;
        $model = $this->model;
        $model->setCollectionId($expected);

        $this->assertEquals($expected, $model->getCollectionId());
    }

    public function testGetFeatured(): void
    {
        $this->assertEquals($this->dto->featured, $this->model->getFeatured());
    }

    public function testSetFeatured(): void
    {
        $expected = 8524;
        $model = $this->model;
        $model->setFeatured($expected);

        $this->assertEquals($expected, $model->getFeatured());
    }

    public function testGetPublic(): void
    {
        $this->assertEquals($this->dto->public, $this->model->getPublic());
    }

    public function testSetPublic(): void
    {
        $expected = 1651;
        $model = $this->model;
        $model->setPublic($expected);

        $this->assertEquals($expected, $model->getPublic());
    }

    public function testGetModified(): void
    {
        $this->assertEquals($this->dto->modified, $this->model->getModified());
    }

    public function testSetModified(): void
    {
        $expected = "2021-09-23 13:59:28";
        $model = $this->model;
        $model->setModified($expected);

        $this->assertEquals($expected, $model->getModified());
    }

    public function testGetAdded(): void
    {
        $this->assertEquals($this->dto->added, $this->model->getAdded());
    }

    public function testSetAdded(): void
    {
        $expected = "2021-10-13 10:34:15";
        $model = $this->model;
        $model->setAdded($expected);

        $this->assertEquals($expected, $model->getAdded());
    }

    public function testGetOwnerId(): void
    {
        $this->assertEquals($this->dto->ownerId, $this->model->getOwnerId());
    }

    public function testSetOwnerId(): void
    {
        $expected = 5467;
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