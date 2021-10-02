<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaRecordsTags;

use OmekaClassic\Database\IDatabase;
use OmekaClassic\Database\DatabaseException;

class OmekaRecordsTagsRepository implements IOmekaRecordsTagsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OmekaRecordsTagsDto $dto): int
    {
        $sql = "INSERT INTO `omeka_records_tags` (`record_id`, `record_type`, `tag_id`, `time`)
                VALUES (?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->recordId,
                $dto->recordType,
                $dto->tagId,
                $dto->time
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OmekaRecordsTagsDto $dto): int
    {
        $sql = "UPDATE `omeka_records_tags` SET `record_id` = ?, `record_type` = ?, `tag_id` = ?, `time` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->recordId,
                $dto->recordType,
                $dto->tagId,
                $dto->time,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OmekaRecordsTagsDto
    {
        $sql = "SELECT `id`, `record_id`, `record_type`, `tag_id`, `time`
                FROM `omeka_records_tags` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OmekaRecordsTagsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `record_id`, `record_type`, `tag_id`, `time`
                FROM `omeka_records_tags`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OmekaRecordsTagsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `omeka_records_tags` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}