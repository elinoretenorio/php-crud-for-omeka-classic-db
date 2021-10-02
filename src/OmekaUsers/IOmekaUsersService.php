<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsers;

interface IOmekaUsersService
{
    public function insert(OmekaUsersModel $model): int;

    public function update(OmekaUsersModel $model): int;

    public function get(int $id): ?OmekaUsersModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaUsersModel;
}