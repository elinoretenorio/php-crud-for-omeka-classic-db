<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementTexts;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaElementTextsRepository implements IOmekaElementTextsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaElementTextsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_element_texts` (`record_id`, `record_type`, `element_id`, `html`, `text`)
                VALUES (?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->recordId,
                $dto->recordType,
                $dto->elementId,
                $dto->html,
                $dto->text
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaElementTextsDto $dto): int
    {
        $sql = "UPDATE `omeka_element_texts` SET `record_id` = ?, `record_type` = ?, `element_id` = ?, `html` = ?, `text` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->recordId,
                $dto->recordType,
                $dto->elementId,
                $dto->html,
                $dto->text,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaElementTextsDto
    {
        $sql = "SELECT `id`, `record_id`, `record_type`, `element_id`, `html`, `text`
                FROM `omeka_element_texts` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaElementTextsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `record_id`, `record_type`, `element_id`, `html`, `text`
                FROM `omeka_element_texts`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaElementTextsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_element_texts` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}