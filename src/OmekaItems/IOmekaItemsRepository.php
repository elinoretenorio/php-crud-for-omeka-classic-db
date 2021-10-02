<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItems;

interface IOmekaItemsRepository
{
    public function insert(OmekaItemsDto $dto): int;

    public function update(OmekaItemsDto $dto): int;

    public function get(int $id): ?OmekaItemsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}