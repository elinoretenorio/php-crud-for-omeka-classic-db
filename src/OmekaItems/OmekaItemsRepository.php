<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItems;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaItemsRepository implements IOmekaItemsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaItemsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_items` (`item_type_id`, `collection_id`, `featured`, `public`, `modified`, `added`, `owner_id`)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->itemTypeId,
                $dto->collectionId,
                $dto->featured,
                $dto->public,
                $dto->modified,
                $dto->added,
                $dto->ownerId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaItemsDto $dto): int
    {
        $sql = "UPDATE `omeka_items` SET `item_type_id` = ?, `collection_id` = ?, `featured` = ?, `public` = ?, `modified` = ?, `added` = ?, `owner_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->itemTypeId,
                $dto->collectionId,
                $dto->featured,
                $dto->public,
                $dto->modified,
                $dto->added,
                $dto->ownerId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaItemsDto
    {
        $sql = "SELECT `id`, `item_type_id`, `collection_id`, `featured`, `public`, `modified`, `added`, `owner_id`
                FROM `omeka_items` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaItemsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `item_type_id`, `collection_id`, `featured`, `public`, `modified`, `added`, `owner_id`
                FROM `omeka_items`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaItemsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_items` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}