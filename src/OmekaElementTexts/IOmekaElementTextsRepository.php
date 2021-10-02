<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementTexts;

interface IOmekaElementTextsRepository
{
    public function insert(OmekaElementTextsDto $dto): int;

    public function update(OmekaElementTextsDto $dto): int;

    public function get(int $id): ?OmekaElementTextsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}