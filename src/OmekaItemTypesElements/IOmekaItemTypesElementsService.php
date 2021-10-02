<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypesElements;

interface IOmekaItemTypesElementsService
{
    public function insert(OmekaItemTypesElementsModel $model): int;

    public function update(OmekaItemTypesElementsModel $model): int;

    public function get(int $id): ?OmekaItemTypesElementsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaItemTypesElementsModel;
}