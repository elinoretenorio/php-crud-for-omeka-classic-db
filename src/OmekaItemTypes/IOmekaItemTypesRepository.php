<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypes;

interface IOmekaItemTypesRepository
{
    public function insert(OmekaItemTypesDto $dto): int;

    public function update(OmekaItemTypesDto $dto): int;

    public function get(int $id): ?OmekaItemTypesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}