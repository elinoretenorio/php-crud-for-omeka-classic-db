<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElements;

interface IOmekaElementsRepository
{
    public function insert(OmekaElementsDto $dto): int;

    public function update(OmekaElementsDto $dto): int;

    public function get(int $id): ?OmekaElementsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}