<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSchemaMigrations;

interface IOmekaSchemaMigrationsRepository
{
    public function insert(OmekaSchemaMigrationsDto $dto): int;

    public function update(OmekaSchemaMigrationsDto $dto): int;

    public function get(int $id): ?OmekaSchemaMigrationsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}