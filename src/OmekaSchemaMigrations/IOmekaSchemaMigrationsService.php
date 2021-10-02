<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSchemaMigrations;

interface IOmekaSchemaMigrationsService
{
    public function insert(OmekaSchemaMigrationsModel $model): int;

    public function update(OmekaSchemaMigrationsModel $model): int;

    public function get(int $id): ?OmekaSchemaMigrationsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaSchemaMigrationsModel;
}