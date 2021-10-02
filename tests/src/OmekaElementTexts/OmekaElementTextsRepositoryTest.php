<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaElementTexts;

use PHPUnit\Framework\TestCase;
use OmekaClassic\Database\DatabaseException;
use OmekaClassic\OmekaElementTexts\{ OmekaElementTextsDto, IOmekaElementTextsRepository, OmekaElementTextsRepository };

class OmekaElementTextsRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private OmekaElementTextsDto $dto;
    private IOmekaElementTextsRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("OmekaClassic\Database\IDatabase");
        $this->result = $this->createMock("OmekaClassic\Database\IDatabaseResult");
        $this->input = [
            "id" => 9779,
            "record_id" => 197,
            "record_type" => "floor",
            "element_id" => 3362,
            "html" => 2891,
            "text" => "Small produce they training large still four.",
        ];
        $this->dto = new OmekaElementTextsDto($this->input);
        $this->repository = new OmekaElementTextsRepository($this->db);
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
        $expected = 5940;

        $sql = "INSERT INTO `omeka_element_texts` (`record_id`, `record_type`, `element_id`, `html`, `text`)
                VALUES (?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->recordId,
                $this->dto->recordType,
                $this->dto->elementId,
                $this->dto->html,
                $this->dto->text
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
        $expected = 8072;

        $sql = "UPDATE `omeka_element_texts` SET `record_id` = ?, `record_type` = ?, `element_id` = ?, `html` = ?, `text` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->recordId,
                $this->dto->recordType,
                $this->dto->elementId,
                $this->dto->html,
                $this->dto->text,
                $this->dto->id
            ]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testGet_ReturnsEmptyOnException(): void
    {
        $id = 5159;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 3172;

        $sql = "SELECT `id`, `record_id`, `record_type`, `element_id`, `html`, `text`
                FROM `omeka_element_texts` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->get($id);
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
        $sql = "SELECT `id`, `record_id`, `record_type`, `element_id`, `html`, `text`
                FROM `omeka_element_texts`";

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
        $id = 8117;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 4789;
        $expected = 940;

        $sql = "DELETE FROM `omeka_element_texts` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }
}