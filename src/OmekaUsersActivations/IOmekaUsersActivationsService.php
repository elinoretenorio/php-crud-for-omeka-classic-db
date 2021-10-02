<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsersActivations;

interface IOmekaUsersActivationsService
{
    public function insert(OmekaUsersActivationsModel $model): int;

    public function update(OmekaUsersActivationsModel $model): int;

    public function get(int $id): ?OmekaUsersActivationsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaUsersActivationsModel;
}