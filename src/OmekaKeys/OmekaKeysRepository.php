<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaKeys;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaKeysRepository implements IOmekaKeysRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaKeysDto $dto): int
    {
        $sql = "INSERT INTO `omeka_keys` (`user_id`, `label`, `key`, `ip`, `accessed`)
                VALUES (?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->userId,
                $dto->label,
                $dto->key,
                $dto->ip,
                $dto->accessed
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaKeysDto $dto): int
    {
        $sql = "UPDATE `omeka_keys` SET `user_id` = ?, `label` = ?, `key` = ?, `ip` = ?, `accessed` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->userId,
                $dto->label,
                $dto->key,
                $dto->ip,
                $dto->accessed,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaKeysDto
    {
        $sql = "SELECT `id`, `user_id`, `label`, `key`, `ip`, `accessed`
                FROM `omeka_keys` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaKeysDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `user_id`, `label`, `key`, `ip`, `accessed`
                FROM `omeka_keys`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaKeysDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_keys` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}