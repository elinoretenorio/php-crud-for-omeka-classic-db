<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaCollections;

interface IOmekaCollectionsService
{
    public function insert(OmekaCollectionsModel $model): int;

    public function update(OmekaCollectionsModel $model): int;

    public function get(int $id): ?OmekaCollectionsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaCollectionsModel;
}