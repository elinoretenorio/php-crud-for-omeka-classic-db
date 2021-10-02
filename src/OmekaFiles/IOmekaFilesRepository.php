<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaFiles;

interface IOmekaFilesRepository
{
    public function insert(OmekaFilesDto $dto): int;

    public function update(OmekaFilesDto $dto): int;

    public function get(int $id): ?OmekaFilesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}