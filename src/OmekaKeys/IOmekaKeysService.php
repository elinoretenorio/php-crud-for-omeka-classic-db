<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaKeys;

interface IOmekaKeysService
{
    public function insert(OmekaKeysModel $model): int;

    public function update(OmekaKeysModel $model): int;

    public function get(int $id): ?OmekaKeysModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaKeysModel;
}