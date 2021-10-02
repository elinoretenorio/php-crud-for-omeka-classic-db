<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypes;

interface IOmekaItemTypesService
{
    public function insert(OmekaItemTypesModel $model): int;

    public function update(OmekaItemTypesModel $model): int;

    public function get(int $id): ?OmekaItemTypesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaItemTypesModel;
}