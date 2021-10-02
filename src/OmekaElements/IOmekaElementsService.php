<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElements;

interface IOmekaElementsService
{
    public function insert(OmekaElementsModel $model): int;

    public function update(OmekaElementsModel $model): int;

    public function get(int $id): ?OmekaElementsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaElementsModel;
}