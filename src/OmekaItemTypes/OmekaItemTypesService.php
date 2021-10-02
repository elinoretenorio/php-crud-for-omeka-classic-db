<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypes;

class OmekaItemTypesService implements IOmekaItemTypesService
{
    private IOmekaItemTypesRepository $repository;

    public function __construct(IOmekaItemTypesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaItemTypesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaItemTypesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaItemTypesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaItemTypesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaItemTypesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaItemTypesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaItemTypesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaItemTypesDto($row);

        return new OmekaItemTypesModel($dto);
    }
}