<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypesElements;

interface IOmekaItemTypesElementsRepository
{
    public function insert(OmekaItemTypesElementsDto $dto): int;

    public function update(OmekaItemTypesElementsDto $dto): int;

    public function get(int $id): ?OmekaItemTypesElementsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}