<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSessions;

interface IOmekaSessionsRepository
{
    public function insert(OmekaSessionsDto $dto): int;

    public function update(OmekaSessionsDto $dto): int;

    public function get(int $sessionId): ?OmekaSessionsDto;

    public function getAll(): array;

    public function delete(int $sessionId): int;
}