<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaUsers;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaUsers\{ OmekaUsersDto, OmekaUsersModel };

class OmekaUsersModelTest extends TestCase
{
    private array $input;
    private OmekaUsersDto $dto;
    private OmekaUsersModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 9944,
            "username" => "happen",
            "name" => "Challenge rather picture music able practice. Spend boy check case first.",
            "email" => "daytracy@example.org",
            "password" => "blue",
            "salt" => "manager",
            "active" => 1644,
            "role" => "inside",
        ];
        $this->dto = new OmekaUsersDto($this->input);
        $this->model = new OmekaUsersModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaUsersModel(null);

        $this->assertInstanceOf(OmekaUsersModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 7985;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetUsername(): void
    {
        $this->assertEquals($this->dto->username, $this->model->getUsername());
    }

    public function testSetUsername(): void
    {
        $expected = "later";
        $model = $this->model;
        $model->setUsername($expected);

        $this->assertEquals($expected, $model->getUsername());
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->dto->name, $this->model->getName());
    }

    public function testSetName(): void
    {
        $expected = "Wide project hit large war official. Trial physical music paper. Voice huge put situation. Management question interview news hard Mr.";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
    }

    public function testGetEmail(): void
    {
        $this->assertEquals($this->dto->email, $this->model->getEmail());
    }

    public function testSetEmail(): void
    {
        $expected = "andrew41@example.org";
        $model = $this->model;
        $model->setEmail($expected);

        $this->assertEquals($expected, $model->getEmail());
    }

    public function testGetPassword(): void
    {
        $this->assertEquals($this->dto->password, $this->model->getPassword());
    }

    public function testSetPassword(): void
    {
        $expected = "treatment";
        $model = $this->model;
        $model->setPassword($expected);

        $this->assertEquals($expected, $model->getPassword());
    }

    public function testGetSalt(): void
    {
        $this->assertEquals($this->dto->salt, $this->model->getSalt());
    }

    public function testSetSalt(): void
    {
        $expected = "herself";
        $model = $this->model;
        $model->setSalt($expected);

        $this->assertEquals($expected, $model->getSalt());
    }

    public function testGetActive(): void
    {
        $this->assertEquals($this->dto->active, $this->model->getActive());
    }

    public function testSetActive(): void
    {
        $expected = 4652;
        $model = $this->model;
        $model->setActive($expected);

        $this->assertEquals($expected, $model->getActive());
    }

    public function testGetRole(): void
    {
        $this->assertEquals($this->dto->role, $this->model->getRole());
    }

    public function testSetRole(): void
    {
        $expected = "paper";
        $model = $this->model;
        $model->setRole($expected);

        $this->assertEquals($expected, $model->getRole());
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