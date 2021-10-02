<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementSets;

class OmekaElementSetsService implements IOmekaElementSetsService
{
    private IOmekaElementSetsRepository $repository;

    public function __construct(IOmekaElementSetsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaElementSetsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaElementSetsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaElementSetsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaElementSetsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaElementSetsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaElementSetsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaElementSetsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaElementSetsDto($row);

        return new OmekaElementSetsModel($dto);
    }
}