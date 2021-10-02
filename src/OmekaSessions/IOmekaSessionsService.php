<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSessions;

interface IOmekaSessionsService
{
    public function insert(OmekaSessionsModel $model): int;

    public function update(OmekaSessionsModel $model): int;

    public function get(int $sessionId): ?OmekaSessionsModel;

    public function getAll(): array;

    public function delete(int $sessionId): int;

    public function createModel(array $row): ?OmekaSessionsModel;
}