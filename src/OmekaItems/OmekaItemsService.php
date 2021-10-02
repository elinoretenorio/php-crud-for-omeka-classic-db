<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItems;

class OmekaItemsService implements IOmekaItemsService
{
    private IOmekaItemsRepository $repository;

    public function __construct(IOmekaItemsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaItemsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaItemsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaItemsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaItemsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaItemsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaItemsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaItemsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaItemsDto($row);

        return new OmekaItemsModel($dto);
    }
}