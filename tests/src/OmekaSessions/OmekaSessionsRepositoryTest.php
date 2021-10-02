<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaSessions;

use PHPUnit\Framework\TestCase;
use OmekaClassic\Database\DatabaseException;
use OmekaClassic\OmekaSessions\{ OmekaSessionsDto, IOmekaSessionsRepository, OmekaSessionsRepository };

class OmekaSessionsRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private OmekaSessionsDto $dto;
    private IOmekaSessionsRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("OmekaClassic\Database\IDatabase");
        $this->result = $this->createMock("OmekaClassic\Database\IDatabaseResult");
        $this->input = [
            "session_id" => 3586,
            "id" => "population",
            "modified" => 6103,
            "lifetime" => 8607,
            "data" => "All everyone enjoy number light seven stop attack.",
        ];
        $this->dto = new OmekaSessionsDto($this->input);
        $this->repository = new OmekaSessionsRepository($this->db);
    }

    protected function tearDown(): void
    {
        unset($this->db);
        unset($this->result);
        unset($this->input);
        unset($this->dto);
        unset($this->repository);
    }

    public function testInsert_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testInsert_ReturnsId(): void
    {
        $expected = 5835;

        $sql = "INSERT INTO `omeka_sessions` (`id`, `modified`, `lifetime`, `data`)
                VALUES (?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->id,
                $this->dto->modified,
                $this->dto->lifetime,
                $this->dto->data
            ]);
        $this->db->expects($this->once())
            ->method("lastInsertId")
            ->willReturn($expected);

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsRowCount(): void
    {
        $expected = 868;

        $sql = "UPDATE `omeka_sessions` SET `id` = ?, `modified` = ?, `lifetime` = ?, `data` = ?
                WHERE `session_id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->id,
                $this->dto->modified,
                $this->dto->lifetime,
                $this->dto->data,
                $this->dto->sessionId
            ]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testGet_ReturnsEmptyOnException(): void
    {
        $sessionId = 6365;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($sessionId);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $sessionId = 647;

        $sql = "SELECT `session_id`, `id`, `modified`, `lifetime`, `data`
                FROM `omeka_sessions` WHERE `session_id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$sessionId]);
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->get($sessionId);
        $this->assertEquals($this->dto, $actual);
    }

    public function testGetAll_ReturnsEmptyOnException(): void
    {
        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->getAll();
        $this->assertEmpty($actual);
    }

    public function testGetAll_ReturnsDtos(): void
    {
        $sql = "SELECT `session_id`, `id`, `modified`, `lifetime`, `data`
                FROM `omeka_sessions`";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute");
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->getAll();
        $this->assertEquals([$this->dto], $actual);
    }

    public function testDelete_ReturnsFailedOnException(): void
    {
        $sessionId = 824;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($sessionId);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $sessionId = 5433;
        $expected = 8841;

        $sql = "DELETE FROM `omeka_sessions` WHERE `session_id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$sessionId]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->delete($sessionId);
        $this->assertEquals($expected, $actual);
    }
}