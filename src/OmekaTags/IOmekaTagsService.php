<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaTags;

interface IOmekaTagsService
{
    public function insert(OmekaTagsModel $model): int;

    public function update(OmekaTagsModel $model): int;

    public function get(int $id): ?OmekaTagsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaTagsModel;
}