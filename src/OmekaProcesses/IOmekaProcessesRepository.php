<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaProcesses;

interface IOmekaProcessesRepository
{
    public function insert(OmekaProcessesDto $dto): int;

    public function update(OmekaProcessesDto $dto): int;

    public function get(int $id): ?OmekaProcessesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}