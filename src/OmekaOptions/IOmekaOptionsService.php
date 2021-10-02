<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaOptions;

interface IOmekaOptionsService
{
    public function insert(OmekaOptionsModel $model): int;

    public function update(OmekaOptionsModel $model): int;

    public function get(int $id): ?OmekaOptionsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaOptionsModel;
}