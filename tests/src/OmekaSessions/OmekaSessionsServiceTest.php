<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaSessions;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaSessions\{ OmekaSessionsDto, OmekaSessionsModel, IOmekaSessionsService, OmekaSessionsService };

class OmekaSessionsServiceTest extends TestCase
{
    private $repository;
    private array $input;
    private OmekaSessionsDto $dto;
    private OmekaSessionsModel $model;
    private IOmekaSessionsService $service;

    protected function setUp(): void
    {
        $this->repository = $this->createMock("OmekaClassic\OmekaSessions\IOmekaSessionsRepository");
        $this->input = [
            "session_id" => 2342,
            "id" => "rule",
            "modified" => 1934,
            "lifetime" => 3709,
            "data" => "Art under speech lawyer improve green.",
        ];
        $this->dto = new OmekaSessionsDto($this->input);
        $this->model = new OmekaSessionsModel($this->dto);
        $this->service = new OmekaSessionsService($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->repository);
        unset($this->input);
        unset($this->dto);
        unset($this->model);
        unset($this->service);
    }

    public function testInsert_ReturnsId(): void
    {
        $expected = 7898;

        $this->repository->expects($this->once())
            ->method("insert")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->insert($this->model);
        $this->assertEquals($expected, $actual);
    }

    public function testInsert_ReturnsEmpty(): void
    {
        $expected = 0;

        $this->repository->expects($this->once())
            ->method("insert")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->insert($this->model);
        $this->assertEmpty($actual);
    }

    public function testUpdate_ReturnsRowCount(): void
    {
        $expected = 7215;

        $this->repository->expects($this->once())
            ->method("update")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->update($this->model);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsEmpty(): void
    {
        $expected = 0;

        $this->repository->expects($this->once())
            ->method("update")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->update($this->model);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsNull(): void
    {
        $sessionId = 5711;

        $this->repository->expects($this->once())
            ->method("get")
            ->with($sessionId)
            ->willReturn(null);

        $actual = $this->service->get($sessionId);
        $this->assertNull($actual);
    }

    public function testGet_ReturnsModel(): void
    {
        $sessionId = 2209;

        $this->repository->expects($this->once())
            ->method("get")
            ->with($sessionId)
            ->willReturn($this->dto);

        $actual = $this->service->get($sessionId);
        $this->assertEquals($this->model, $actual);
    }

    public function testGetAll_ReturnsEmpty(): void
    {
        $this->repository->expects($this->once())
            ->method("getAll")
            ->willReturn([]);

        $actual = $this->service->getAll();
        $this->assertEmpty($actual);
    }

    public function testGetAll_ReturnsModels(): void
    {
        $this->repository->expects($this->once())
            ->method("getAll")
            ->willReturn([$this->dto]);

        $actual = $this->service->getAll();
        $this->assertEquals([$this->model], $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $sessionId = 7321;
        $expected = 2080;

        $this->repository->expects($this->once())
            ->method("delete")
            ->with($sessionId)
            ->willReturn($expected);

        $actual = $this->service->delete($sessionId);
        $this->assertEquals($expected, $actual);
    }

    public function testCreateModel_ReturnsNullIfEmpty(): void
    {
        $actual = $this->service->createModel([]);
        $this->assertNull($actual);
    }

    public function testCreateModel_ReturnsModel(): void
    {
        $actual = $this->service->createModel($this->input);
        $this->assertEquals($this->model, $actual);
    }
}