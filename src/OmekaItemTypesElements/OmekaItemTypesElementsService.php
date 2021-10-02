<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypesElements;

class OmekaItemTypesElementsService implements IOmekaItemTypesElementsService
{
    private IOmekaItemTypesElementsRepository $repository;

    public function __construct(IOmekaItemTypesElementsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaItemTypesElementsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaItemTypesElementsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaItemTypesElementsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaItemTypesElementsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaItemTypesElementsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaItemTypesElementsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaItemTypesElementsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaItemTypesElementsDto($row);

        return new OmekaItemTypesElementsModel($dto);
    }
}