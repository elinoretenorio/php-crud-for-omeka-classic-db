<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementSets;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaElementSetsRepository implements IOmekaElementSetsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaElementSetsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_element_sets` (`record_type`, `name`, `description`)
                VALUES (?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->recordType,
                $dto->name,
                $dto->description
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaElementSetsDto $dto): int
    {
        $sql = "UPDATE `omeka_element_sets` SET `record_type` = ?, `name` = ?, `description` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->recordType,
                $dto->name,
                $dto->description,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaElementSetsDto
    {
        $sql = "SELECT `id`, `record_type`, `name`, `description`
                FROM `omeka_element_sets` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaElementSetsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `record_type`, `name`, `description`
                FROM `omeka_element_sets`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaElementSetsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_element_sets` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}