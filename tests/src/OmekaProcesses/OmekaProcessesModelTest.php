<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaProcesses;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaProcesses\{ OmekaProcessesDto, OmekaProcessesModel };

class OmekaProcessesModelTest extends TestCase
{
    private array $input;
    private OmekaProcessesDto $dto;
    private OmekaProcessesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 4882,
            "class" => "pretty",
            "user_id" => 2128,
            "pid" => 910,
            "status" => "Speech and language therapist",
            "args" => "Recent listen will couple catch player house. Five piece business result effort structure peace. Set compare argue machine.",
            "started" => "2021-10-10 12:47:38",
            "stopped" => "2021-10-04 22:45:59",
        ];
        $this->dto = new OmekaProcessesDto($this->input);
        $this->model = new OmekaProcessesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaProcessesModel(null);

        $this->assertInstanceOf(OmekaProcessesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 8828;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetClass(): void
    {
        $this->assertEquals($this->dto->class, $this->model->getClass());
    }

    public function testSetClass(): void
    {
        $expected = "job";
        $model = $this->model;
        $model->setClass($expected);

        $this->assertEquals($expected, $model->getClass());
    }

    public function testGetUserId(): void
    {
        $this->assertEquals($this->dto->userId, $this->model->getUserId());
    }

    public function testSetUserId(): void
    {
        $expected = 7908;
        $model = $this->model;
        $model->setUserId($expected);

        $this->assertEquals($expected, $model->getUserId());
    }

    public function testGetPid(): void
    {
        $this->assertEquals($this->dto->pid, $this->model->getPid());
    }

    public function testSetPid(): void
    {
        $expected = 3806;
        $model = $this->model;
        $model->setPid($expected);

        $this->assertEquals($expected, $model->getPid());
    }

    public function testGetStatus(): void
    {
        $this->assertEquals($this->dto->status, $this->model->getStatus());
    }

    public function testSetStatus(): void
    {
        $expected = "Hotel manager";
        $model = $this->model;
        $model->setStatus($expected);

        $this->assertEquals($expected, $model->getStatus());
    }

    public function testGetArgs(): void
    {
        $this->assertEquals($this->dto->args, $this->model->getArgs());
    }

    public function testSetArgs(): void
    {
        $expected = "Week whether audience even response family. Concern make leader moment fear decade remember.";
        $model = $this->model;
        $model->setArgs($expected);

        $this->assertEquals($expected, $model->getArgs());
    }

    public function testGetStarted(): void
    {
        $this->assertEquals($this->dto->started, $this->model->getStarted());
    }

    public function testSetStarted(): void
    {
        $expected = "2021-09-28 05:40:31";
        $model = $this->model;
        $model->setStarted($expected);

        $this->assertEquals($expected, $model->getStarted());
    }

    public function testGetStopped(): void
    {
        $this->assertEquals($this->dto->stopped, $this->model->getStopped());
    }

    public function testSetStopped(): void
    {
        $expected = "2021-10-06 21:10:34";
        $model = $this->model;
        $model->setStopped($expected);

        $this->assertEquals($expected, $model->getStopped());
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