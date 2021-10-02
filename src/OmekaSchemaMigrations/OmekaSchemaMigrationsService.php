<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSchemaMigrations;

class OmekaSchemaMigrationsService implements IOmekaSchemaMigrationsService
{
    private IOmekaSchemaMigrationsRepository $repository;

    public function __construct(IOmekaSchemaMigrationsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaSchemaMigrationsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaSchemaMigrationsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaSchemaMigrationsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaSchemaMigrationsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaSchemaMigrationsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaSchemaMigrationsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaSchemaMigrationsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaSchemaMigrationsDto($row);

        return new OmekaSchemaMigrationsModel($dto);
    }
}