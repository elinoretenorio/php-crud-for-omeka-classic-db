<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaOptions;

interface IOmekaOptionsRepository
{
    public function insert(OmekaOptionsDto $dto): int;

    public function update(OmekaOptionsDto $dto): int;

    public function get(int $id): ?OmekaOptionsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}