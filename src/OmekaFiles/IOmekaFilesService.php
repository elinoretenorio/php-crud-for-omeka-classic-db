<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaFiles;

interface IOmekaFilesService
{
    public function insert(OmekaFilesModel $model): int;

    public function update(OmekaFilesModel $model): int;

    public function get(int $id): ?OmekaFilesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaFilesModel;
}