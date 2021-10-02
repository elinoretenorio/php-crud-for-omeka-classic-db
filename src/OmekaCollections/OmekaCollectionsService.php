<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaCollections;

class OmekaCollectionsService implements IOmekaCollectionsService
{
    private IOmekaCollectionsRepository $repository;

    public function __construct(IOmekaCollectionsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaCollectionsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaCollectionsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaCollectionsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaCollectionsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaCollectionsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaCollectionsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaCollectionsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaCollectionsDto($row);

        return new OmekaCollectionsModel($dto);
    }
}