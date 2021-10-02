<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaFiles;

use PHPUnit\Framework\TestCase;
use OmekaClassic\Database\DatabaseException;
use OmekaClassic\OmekaFiles\{ OmekaFilesDto, IOmekaFilesRepository, OmekaFilesRepository };

class OmekaFilesRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private OmekaFilesDto $dto;
    private IOmekaFilesRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("OmekaClassic\Database\IDatabase");
        $this->result = $this->createMock("OmekaClassic\Database\IDatabaseResult");
        $this->input = [
            "id" => 8836,
            "item_id" => 3081,
            "order" => 4768,
            "size" => 6062,
            "has_derivative_image" => 729,
            "authentication" => "anyone",
            "mime_type" => "six",
            "type_os" => "deep",
            "filename" => "Sell deal policy reflect finish agency. Radio radio oil PM then. Cover nothing several face pull example ball.",
            "original_filename" => "True suddenly design this education strong evidence sound. Model phone might although structure industry arm.",
            "modified" => "2021-10-04 09:48:13",
            "added" => "2021-09-30 09:57:55",
            "stored" => 3417,
            "metadata" => "Phone fight American north manage. Suffer center leave increase painting event. Describe now region huge full serious.",
        ];
        $this->dto = new OmekaFilesDto($this->input);
        $this->repository = new OmekaFilesRepository($this->db);
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
        $expected = 7142;

        $sql = "INSERT INTO `omeka_files` (`item_id`, `order`, `size`, `has_derivative_image`, `authentication`, `mime_type`, `type_os`, `filename`, `original_filename`, `modified`, `added`, `stored`, `metadata`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->itemId,
                $this->dto->order,
                $this->dto->size,
                $this->dto->hasDerivativeImage,
                $this->dto->authentication,
                $this->dto->mimeType,
                $this->dto->typeOs,
                $this->dto->filename,
                $this->dto->originalFilename,
                $this->dto->modified,
                $this->dto->added,
                $this->dto->stored,
                $this->dto->metadata
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
        $expected = 9766;

        $sql = "UPDATE `omeka_files` SET `item_id` = ?, `order` = ?, `size` = ?, `has_derivative_image` = ?, `authentication` = ?, `mime_type` = ?, `type_os` = ?, `filename` = ?, `original_filename` = ?, `modified` = ?, `added` = ?, `stored` = ?, `metadata` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->itemId,
                $this->dto->order,
                $this->dto->size,
                $this->dto->hasDerivativeImage,
                $this->dto->authentication,
                $this->dto->mimeType,
                $this->dto->typeOs,
                $this->dto->filename,
                $this->dto->originalFilename,
                $this->dto->modified,
                $this->dto->added,
                $this->dto->stored,
                $this->dto->metadata,
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
        $id = 2102;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 2255;

        $sql = "SELECT `id`, `item_id`, `order`, `size`, `has_derivative_image`, `authentication`, `mime_type`, `type_os`, `filename`, `original_filename`, `modified`, `added`, `stored`, `metadata`
                FROM `omeka_files` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `item_id`, `order`, `size`, `has_derivative_image`, `authentication`, `mime_type`, `type_os`, `filename`, `original_filename`, `modified`, `added`, `stored`, `metadata`
                FROM `omeka_files`";

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
        $id = 506;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 1242;
        $expected = 1354;

        $sql = "DELETE FROM `omeka_files` WHERE `id` = ?";

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