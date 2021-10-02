<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaSearchTexts;

use PHPUnit\Framework\TestCase;
use OmekaClassic\Database\DatabaseException;
use OmekaClassic\OmekaSearchTexts\{ OmekaSearchTextsDto, IOmekaSearchTextsRepository, OmekaSearchTextsRepository };

class OmekaSearchTextsRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private OmekaSearchTextsDto $dto;
    private IOmekaSearchTextsRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("OmekaClassic\Database\IDatabase");
        $this->result = $this->createMock("OmekaClassic\Database\IDatabaseResult");
        $this->input = [
            "id" => 9945,
            "record_type" => "study",
            "record_id" => 2576,
            "public" => 3727,
            "title" => "Official police increase include. Amount rather decision picture. Huge language billion herself fear.",
            "text" => "Century day society quality unit news. Whole result single old discussion place.",
        ];
        $this->dto = new OmekaSearchTextsDto($this->input);
        $this->repository = new OmekaSearchTextsRepository($this->db);
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
        $expected = 9721;

        $sql = "INSERT INTO `omeka_search_texts` (`record_type`, `record_id`, `public`, `title`, `text`)
                VALUES (?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->recordType,
                $this->dto->recordId,
                $this->dto->public,
                $this->dto->title,
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
        $expected = 4810;

        $sql = "UPDATE `omeka_search_texts` SET `record_type` = ?, `record_id` = ?, `public` = ?, `title` = ?, `text` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->recordType,
                $this->dto->recordId,
                $this->dto->public,
                $this->dto->title,
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
        $id = 9350;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 5225;

        $sql = "SELECT `id`, `record_type`, `record_id`, `public`, `title`, `text`
                FROM `omeka_search_texts` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `record_type`, `record_id`, `public`, `title`, `text`
                FROM `omeka_search_texts`";

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
        $id = 1557;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 4819;
        $expected = 3942;

        $sql = "DELETE FROM `omeka_search_texts` WHERE `id` = ?";

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