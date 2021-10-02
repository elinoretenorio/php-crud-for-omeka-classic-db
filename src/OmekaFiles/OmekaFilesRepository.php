<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaFiles;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaFilesRepository implements IOmekaFilesRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaFilesDto $dto): int
    {
        $sql = "INSERT INTO `omeka_files` (`item_id`, `order`, `size`, `has_derivative_image`, `authentication`, `mime_type`, `type_os`, `filename`, `original_filename`, `modified`, `added`, `stored`, `metadata`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->itemId,
                $dto->order,
                $dto->size,
                $dto->hasDerivativeImage,
                $dto->authentication,
                $dto->mimeType,
                $dto->typeOs,
                $dto->filename,
                $dto->originalFilename,
                $dto->modified,
                $dto->added,
                $dto->stored,
                $dto->metadata
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaFilesDto $dto): int
    {
        $sql = "UPDATE `omeka_files` SET `item_id` = ?, `order` = ?, `size` = ?, `has_derivative_image` = ?, `authentication` = ?, `mime_type` = ?, `type_os` = ?, `filename` = ?, `original_filename` = ?, `modified` = ?, `added` = ?, `stored` = ?, `metadata` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->itemId,
                $dto->order,
                $dto->size,
                $dto->hasDerivativeImage,
                $dto->authentication,
                $dto->mimeType,
                $dto->typeOs,
                $dto->filename,
                $dto->originalFilename,
                $dto->modified,
                $dto->added,
                $dto->stored,
                $dto->metadata,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaFilesDto
    {
        $sql = "SELECT `id`, `item_id`, `order`, `size`, `has_derivative_image`, `authentication`, `mime_type`, `type_os`, `filename`, `original_filename`, `modified`, `added`, `stored`, `metadata`
                FROM `omeka_files` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaFilesDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `item_id`, `order`, `size`, `has_derivative_image`, `authentication`, `mime_type`, `type_os`, `filename`, `original_filename`, `modified`, `added`, `stored`, `metadata`
                FROM `omeka_files`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaFilesDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_files` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}