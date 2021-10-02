<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaKeys;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaKeys\{ OmekaKeysDto, OmekaKeysModel };

class OmekaKeysModelTest extends TestCase
{
    private array $input;
    private OmekaKeysDto $dto;
    private OmekaKeysModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 569,
            "user_id" => 4749,
            "label" => "treatment",
            "key" => "however",
            "ip" => "Item allow cultural every go statement.",
            "accessed" => "2021-09-21 22:34:15",
        ];
        $this->dto = new OmekaKeysDto($this->input);
        $this->model = new OmekaKeysModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaKeysModel(null);

        $this->assertInstanceOf(OmekaKeysModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 5751;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetUserId(): void
    {
        $this->assertEquals($this->dto->userId, $this->model->getUserId());
    }

    public function testSetUserId(): void
    {
        $expected = 4604;
        $model = $this->model;
        $model->setUserId($expected);

        $this->assertEquals($expected, $model->getUserId());
    }

    public function testGetLabel(): void
    {
        $this->assertEquals($this->dto->label, $this->model->getLabel());
    }

    public function testSetLabel(): void
    {
        $expected = "follow";
        $model = $this->model;
        $model->setLabel($expected);

        $this->assertEquals($expected, $model->getLabel());
    }

    public function testGetKey(): void
    {
        $this->assertEquals($this->dto->key, $this->model->getKey());
    }

    public function testSetKey(): void
    {
        $expected = "government";
        $model = $this->model;
        $model->setKey($expected);

        $this->assertEquals($expected, $model->getKey());
    }

    public function testGetIp(): void
    {
        $this->assertEquals($this->dto->ip, $this->model->getIp());
    }

    public function testSetIp(): void
    {
        $expected = "Around south foreign chair.";
        $model = $this->model;
        $model->setIp($expected);

        $this->assertEquals($expected, $model->getIp());
    }

    public function testGetAccessed(): void
    {
        $this->assertEquals($this->dto->accessed, $this->model->getAccessed());
    }

    public function testSetAccessed(): void
    {
        $expected = "2021-09-17 01:56:38";
        $model = $this->model;
        $model->setAccessed($expected);

        $this->assertEquals($expected, $model->getAccessed());
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