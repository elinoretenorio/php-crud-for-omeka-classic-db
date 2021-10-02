<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaPlugins;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaPluginsRepository implements IOmekaPluginsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaPluginsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_plugins` (`name`, `active`, `version`)
                VALUES (?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->active,
                $dto->version
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaPluginsDto $dto): int
    {
        $sql = "UPDATE `omeka_plugins` SET `name` = ?, `active` = ?, `version` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->active,
                $dto->version,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaPluginsDto
    {
        $sql = "SELECT `id`, `name`, `active`, `version`
                FROM `omeka_plugins` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaPluginsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `name`, `active`, `version`
                FROM `omeka_plugins`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaPluginsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_plugins` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}