<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaRecordsTags;

interface IOmekaRecordsTagsRepository
{
    public function insert(OmekaRecordsTagsDto $dto): int;

    public function update(OmekaRecordsTagsDto $dto): int;

    public function get(int $id): ?OmekaRecordsTagsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}