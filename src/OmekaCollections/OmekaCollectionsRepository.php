<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaCollections;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaCollectionsRepository implements IOmekaCollectionsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaCollectionsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_collections` (`public`, `featured`, `added`, `modified`, `owner_id`)
                VALUES (?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->public,
                $dto->featured,
                $dto->added,
                $dto->modified,
                $dto->ownerId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaCollectionsDto $dto): int
    {
        $sql = "UPDATE `omeka_collections` SET `public` = ?, `featured` = ?, `added` = ?, `modified` = ?, `owner_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->public,
                $dto->featured,
                $dto->added,
                $dto->modified,
                $dto->ownerId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaCollectionsDto
    {
        $sql = "SELECT `id`, `public`, `featured`, `added`, `modified`, `owner_id`
                FROM `omeka_collections` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaCollectionsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `public`, `featured`, `added`, `modified`, `owner_id`
                FROM `omeka_collections`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaCollectionsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_collections` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}