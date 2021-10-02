<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaProcesses;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaProcessesRepository implements IOmekaProcessesRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaProcessesDto $dto): int
    {
        $sql = "INSERT INTO `omeka_processes` (`class`, `user_id`, `pid`, `status`, `args`, `started`, `stopped`)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->class,
                $dto->userId,
                $dto->pid,
                $dto->status,
                $dto->args,
                $dto->started,
                $dto->stopped
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaProcessesDto $dto): int
    {
        $sql = "UPDATE `omeka_processes` SET `class` = ?, `user_id` = ?, `pid` = ?, `status` = ?, `args` = ?, `started` = ?, `stopped` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->class,
                $dto->userId,
                $dto->pid,
                $dto->status,
                $dto->args,
                $dto->started,
                $dto->stopped,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaProcessesDto
    {
        $sql = "SELECT `id`, `class`, `user_id`, `pid`, `status`, `args`, `started`, `stopped`
                FROM `omeka_processes` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaProcessesDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `class`, `user_id`, `pid`, `status`, `args`, `started`, `stopped`
                FROM `omeka_processes`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaProcessesDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_processes` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}