<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSessions;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaSessionsRepository implements IOmekaSessionsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaSessionsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_sessions` (`id`, `modified`, `lifetime`, `data`)
                VALUES (?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->id,
                $dto->modified,
                $dto->lifetime,
                $dto->data
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaSessionsDto $dto): int
    {
        $sql = "UPDATE `omeka_sessions` SET `id` = ?, `modified` = ?, `lifetime` = ?, `data` = ?
                WHERE `session_id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->id,
                $dto->modified,
                $dto->lifetime,
                $dto->data,
                $dto->sessionId
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $sessionId): ?OmekaSessionsDto
    {
        $sql = "SELECT `session_id`, `id`, `modified`, `lifetime`, `data`
                FROM `omeka_sessions` WHERE `session_id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$sessionId]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaSessionsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `session_id`, `id`, `modified`, `lifetime`, `data`
                FROM `omeka_sessions`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaSessionsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $sessionId): int
    {
        $sql = "DELETE FROM `omeka_sessions` WHERE `session_id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$sessionId]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}