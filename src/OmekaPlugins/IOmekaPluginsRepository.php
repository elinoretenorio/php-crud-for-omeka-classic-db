<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaPlugins;

interface IOmekaPluginsRepository
{
    public function insert(OmekaPluginsDto $dto): int;

    public function update(OmekaPluginsDto $dto): int;

    public function get(int $id): ?OmekaPluginsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}