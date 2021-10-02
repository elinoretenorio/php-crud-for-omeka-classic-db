<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaUsersActivations;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaUsersActivations\{ OmekaUsersActivationsDto, OmekaUsersActivationsModel };

class OmekaUsersActivationsModelTest extends TestCase
{
    private array $input;
    private OmekaUsersActivationsDto $dto;
    private OmekaUsersActivationsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 1622,
            "user_id" => 8671,
            "url" => "argue",
            "added" => "2021-09-28 09:32:43",
        ];
        $this->dto = new OmekaUsersActivationsDto($this->input);
        $this->model = new OmekaUsersActivationsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaUsersActivationsModel(null);

        $this->assertInstanceOf(OmekaUsersActivationsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 233;
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
        $expected = 975;
        $model = $this->model;
        $model->setUserId($expected);

        $this->assertEquals($expected, $model->getUserId());
    }

    public function testGetUrl(): void
    {
        $this->assertEquals($this->dto->url, $this->model->getUrl());
    }

    public function testSetUrl(): void
    {
        $expected = "course";
        $model = $this->model;
        $model->setUrl($expected);

        $this->assertEquals($expected, $model->getUrl());
    }

    public function testGetAdded(): void
    {
        $this->assertEquals($this->dto->added, $this->model->getAdded());
    }

    public function testSetAdded(): void
    {
        $expected = "2021-10-09 15:35:39";
        $model = $this->model;
        $model->setAdded($expected);

        $this->assertEquals($expected, $model->getAdded());
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