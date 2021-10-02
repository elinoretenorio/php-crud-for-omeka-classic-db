<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsers;

interface IOmekaUsersRepository
{
    public function insert(OmekaUsersDto $dto): int;

    public function update(OmekaUsersDto $dto): int;

    public function get(int $id): ?OmekaUsersDto;

    public function getAll(): array;

    public function delete(int $id): int;
}