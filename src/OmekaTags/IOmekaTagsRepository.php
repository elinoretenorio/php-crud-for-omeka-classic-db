<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaTags;

interface IOmekaTagsRepository
{
    public function insert(OmekaTagsDto $dto): int;

    public function update(OmekaTagsDto $dto): int;

    public function get(int $id): ?OmekaTagsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}