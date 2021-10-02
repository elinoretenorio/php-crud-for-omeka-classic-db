<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementSets;

interface IOmekaElementSetsService
{
    public function insert(OmekaElementSetsModel $model): int;

    public function update(OmekaElementSetsModel $model): int;

    public function get(int $id): ?OmekaElementSetsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaElementSetsModel;
}