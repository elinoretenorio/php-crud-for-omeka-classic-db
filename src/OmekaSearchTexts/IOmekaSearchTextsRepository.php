<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSearchTexts;

interface IOmekaSearchTextsRepository
{
    public function insert(OmekaSearchTextsDto $dto): int;

    public function update(OmekaSearchTextsDto $dto): int;

    public function get(int $id): ?OmekaSearchTextsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}