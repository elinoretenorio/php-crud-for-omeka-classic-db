<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItems;

interface IOmekaItemsService
{
    public function insert(OmekaItemsModel $model): int;

    public function update(OmekaItemsModel $model): int;

    public function get(int $id): ?OmekaItemsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaItemsModel;
}