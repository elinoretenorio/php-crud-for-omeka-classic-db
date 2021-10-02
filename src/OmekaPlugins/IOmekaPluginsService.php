<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaPlugins;

interface IOmekaPluginsService
{
    public function insert(OmekaPluginsModel $model): int;

    public function update(OmekaPluginsModel $model): int;

    public function get(int $id): ?OmekaPluginsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaPluginsModel;
}