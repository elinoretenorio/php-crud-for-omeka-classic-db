<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaCollections;

interface IOmekaCollectionsRepository
{
    public function insert(OmekaCollectionsDto $dto): int;

    public function update(OmekaCollectionsDto $dto): int;

    public function get(int $id): ?OmekaCollectionsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}