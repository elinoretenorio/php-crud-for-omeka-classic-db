<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementSets;

interface IOmekaElementSetsRepository
{
    public function insert(OmekaElementSetsDto $dto): int;

    public function update(OmekaElementSetsDto $dto): int;

    public function get(int $id): ?OmekaElementSetsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}