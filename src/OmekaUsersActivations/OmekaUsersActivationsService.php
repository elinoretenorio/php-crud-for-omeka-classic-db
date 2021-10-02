<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsersActivations;

class OmekaUsersActivationsService implements IOmekaUsersActivationsService
{
    private IOmekaUsersActivationsRepository $repository;

    public function __construct(IOmekaUsersActivationsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaUsersActivationsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaUsersActivationsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaUsersActivationsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaUsersActivationsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaUsersActivationsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaUsersActivationsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaUsersActivationsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaUsersActivationsDto($row);

        return new OmekaUsersActivationsModel($dto);
    }
}