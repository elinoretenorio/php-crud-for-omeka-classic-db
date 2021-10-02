<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaRecordsTags;

interface IOmekaRecordsTagsService
{
    public function insert(OmekaRecordsTagsModel $model): int;

    public function update(OmekaRecordsTagsModel $model): int;

    public function get(int $id): ?OmekaRecordsTagsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaRecordsTagsModel;
}