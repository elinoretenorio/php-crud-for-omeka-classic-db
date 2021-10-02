<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSearchTexts;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaSearchTextsRepository implements IOmekaSearchTextsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaSearchTextsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_search_texts` (`record_type`, `record_id`, `public`, `title`, `text`)
                VALUES (?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->recordType,
                $dto->recordId,
                $dto->public,
                $dto->title,
                $dto->text
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaSearchTextsDto $dto): int
    {
        $sql = "UPDATE `omeka_search_texts` SET `record_type` = ?, `record_id` = ?, `public` = ?, `title` = ?, `text` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->recordType,
                $dto->recordId,
                $dto->public,
                $dto->title,
                $dto->text,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaSearchTextsDto
    {
        $sql = "SELECT `id`, `record_type`, `record_id`, `public`, `title`, `text`
                FROM `omeka_search_texts` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaSearchTextsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `record_type`, `record_id`, `public`, `title`, `text`
                FROM `omeka_search_texts`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaSearchTextsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_search_texts` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}