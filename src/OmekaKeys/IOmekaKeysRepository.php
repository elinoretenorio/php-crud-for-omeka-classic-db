<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaKeys;

interface IOmekaKeysRepository
{
    public function insert(OmekaKeysDto $dto): int;

    public function update(OmekaKeysDto $dto): int;

    public function get(int $id): ?OmekaKeysDto;

    public function getAll(): array;

    public function delete(int $id): int;
}