<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypes;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaItemTypesRepository implements IOmekaItemTypesRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaItemTypesDto $dto): int
    {
        $sql = "INSERT INTO `omeka_item_types` (`name`, `description`)
                VALUES (?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->description
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaItemTypesDto $dto): int
    {
        $sql = "UPDATE `omeka_item_types` SET `name` = ?, `description` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->description,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaItemTypesDto
    {
        $sql = "SELECT `id`, `name`, `description`
                FROM `omeka_item_types` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaItemTypesDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `name`, `description`
                FROM `omeka_item_types`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaItemTypesDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_item_types` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}