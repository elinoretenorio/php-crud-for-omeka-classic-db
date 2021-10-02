<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSchemaMigrations;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaSchemaMigrationsRepository implements IOmekaSchemaMigrationsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaSchemaMigrationsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_schema_migrations` (`version`)
                VALUES (?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->version
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaSchemaMigrationsDto $dto): int
    {
        $sql = "UPDATE `omeka_schema_migrations` SET `version` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->version,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaSchemaMigrationsDto
    {
        $sql = "SELECT `id`, `version`
                FROM `omeka_schema_migrations` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaSchemaMigrationsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `version`
                FROM `omeka_schema_migrations`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaSchemaMigrationsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_schema_migrations` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}