<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsersActivations;

interface IOmekaUsersActivationsRepository
{
    public function insert(OmekaUsersActivationsDto $dto): int;

    public function update(OmekaUsersActivationsDto $dto): int;

    public function get(int $id): ?OmekaUsersActivationsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}