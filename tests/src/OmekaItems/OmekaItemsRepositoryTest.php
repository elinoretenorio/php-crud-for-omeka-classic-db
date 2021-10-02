<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaItems;

use PHPUnit\Framework\TestCase;
use OmekaClassic\Database\DatabaseException;
use OmekaClassic\OmekaItems\{ OmekaItemsDto, IOmekaItemsRepository, OmekaItemsRepository };

class OmekaItemsRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private OmekaItemsDto $dto;
    private IOmekaItemsRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("OmekaClassic\Database\IDatabase");
        $this->result = $this->createMock("OmekaClassic\Database\IDatabaseResult");
        $this->input = [
            "id" => 8088,
            "item_type_id" => 9843,
            "collection_id" => 5188,
            "featured" => 1996,
            "public" => 9606,
            "modified" => "2021-09-30 19:33:31",
            "added" => "2021-09-30 00:21:31",
            "owner_id" => 1042,
        ];
        $this->dto = new OmekaItemsDto($this->input);
        $this->repository = new OmekaItemsRepository($this->db);
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
        $expected = 9400;

        $sql = "INSERT INTO `omeka_items` (`item_type_id`, `collection_id`, `featured`, `public`, `modified`, `added`, `owner_id`)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->itemTypeId,
                $this->dto->collectionId,
                $this->dto->featured,
                $this->dto->public,
                $this->dto->modified,
                $this->dto->added,
                $this->dto->ownerId
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
        $expected = 2413;

        $sql = "UPDATE `omeka_items` SET `item_type_id` = ?, `collection_id` = ?, `featured` = ?, `public` = ?, `modified` = ?, `added` = ?, `owner_id` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->itemTypeId,
                $this->dto->collectionId,
                $this->dto->featured,
                $this->dto->public,
                $this->dto->modified,
                $this->dto->added,
                $this->dto->ownerId,
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
        $id = 2616;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 9790;

        $sql = "SELECT `id`, `item_type_id`, `collection_id`, `featured`, `public`, `modified`, `added`, `owner_id`
                FROM `omeka_items` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `item_type_id`, `collection_id`, `featured`, `public`, `modified`, `added`, `owner_id`
                FROM `omeka_items`";

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
        $id = 3289;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 8970;
        $expected = 517;

        $sql = "DELETE FROM `omeka_items` WHERE `id` = ?";

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