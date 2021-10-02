<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypesElements;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaItemTypesElementsRepository implements IOmekaItemTypesElementsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaItemTypesElementsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_item_types_elements` (`item_type_id`, `element_id`, `order`)
                VALUES (?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->itemTypeId,
                $dto->elementId,
                $dto->order
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaItemTypesElementsDto $dto): int
    {
        $sql = "UPDATE `omeka_item_types_elements` SET `item_type_id` = ?, `element_id` = ?, `order` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->itemTypeId,
                $dto->elementId,
                $dto->order,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaItemTypesElementsDto
    {
        $sql = "SELECT `id`, `item_type_id`, `element_id`, `order`
                FROM `omeka_item_types_elements` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaItemTypesElementsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `item_type_id`, `element_id`, `order`
                FROM `omeka_item_types_elements`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaItemTypesElementsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_item_types_elements` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}