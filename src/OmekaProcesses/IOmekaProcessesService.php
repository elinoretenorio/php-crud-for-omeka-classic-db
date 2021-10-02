<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaProcesses;

interface IOmekaProcessesService
{
    public function insert(OmekaProcessesModel $model): int;

    public function update(OmekaProcessesModel $model): int;

    public function get(int $id): ?OmekaProcessesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaProcessesModel;
}