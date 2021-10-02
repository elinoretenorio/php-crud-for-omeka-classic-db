<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElements;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaElementsRepository implements IOmekaElementsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaElementsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_elements` (`element_set_id`, `order`, `name`, `description`, `comment`)
                VALUES (?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->elementSetId,
                $dto->order,
                $dto->name,
                $dto->description,
                $dto->comment
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaElementsDto $dto): int
    {
        $sql = "UPDATE `omeka_elements` SET `element_set_id` = ?, `order` = ?, `name` = ?, `description` = ?, `comment` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->elementSetId,
                $dto->order,
                $dto->name,
                $dto->description,
                $dto->comment,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaElementsDto
    {
        $sql = "SELECT `id`, `element_set_id`, `order`, `name`, `description`, `comment`
                FROM `omeka_elements` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaElementsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `element_set_id`, `order`, `name`, `description`, `comment`
                FROM `omeka_elements`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaElementsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_elements` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}