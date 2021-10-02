<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsers;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaUsersRepository implements IOmekaUsersRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaUsersDto $dto): int
    {
        $sql = "INSERT INTO `omeka_users` (`username`, `name`, `email`, `password`, `salt`, `active`, `role`)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->username,
                $dto->name,
                $dto->email,
                $dto->password,
                $dto->salt,
                $dto->active,
                $dto->role
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaUsersDto $dto): int
    {
        $sql = "UPDATE `omeka_users` SET `username` = ?, `name` = ?, `email` = ?, `password` = ?, `salt` = ?, `active` = ?, `role` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->username,
                $dto->name,
                $dto->email,
                $dto->password,
                $dto->salt,
                $dto->active,
                $dto->role,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaUsersDto
    {
        $sql = "SELECT `id`, `username`, `name`, `email`, `password`, `salt`, `active`, `role`
                FROM `omeka_users` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaUsersDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `username`, `name`, `email`, `password`, `salt`, `active`, `role`
                FROM `omeka_users`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaUsersDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_users` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}