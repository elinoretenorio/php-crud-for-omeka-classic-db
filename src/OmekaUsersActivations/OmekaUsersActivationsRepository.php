<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsersActivations;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaUsersActivationsRepository implements IOmekaUsersActivationsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaUsersActivationsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_users_activations` (`user_id`, `url`, `added`)
                VALUES (?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->userId,
                $dto->url,
                $dto->added
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaUsersActivationsDto $dto): int
    {
        $sql = "UPDATE `omeka_users_activations` SET `user_id` = ?, `url` = ?, `added` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->userId,
                $dto->url,
                $dto->added,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaUsersActivationsDto
    {
        $sql = "SELECT `id`, `user_id`, `url`, `added`
                FROM `omeka_users_activations` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaUsersActivationsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `user_id`, `url`, `added`
                FROM `omeka_users_activations`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaUsersActivationsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_users_activations` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}