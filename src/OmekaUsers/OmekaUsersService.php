<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsers;

class OmekaUsersService implements IOmekaUsersService
{
    private IOmekaUsersRepository $repository;

    public function __construct(IOmekaUsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaUsersModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaUsersModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaUsersModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaUsersModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaUsersDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaUsersModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaUsersModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaUsersDto($row);

        return new OmekaUsersModel($dto);
    }
}