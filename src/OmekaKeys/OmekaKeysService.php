<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaKeys;

class OmekaKeysService implements IOmekaKeysService
{
    private IOmekaKeysRepository $repository;

    public function __construct(IOmekaKeysRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaKeysModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaKeysModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaKeysModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaKeysModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaKeysDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaKeysModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaKeysModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaKeysDto($row);

        return new OmekaKeysModel($dto);
    }
}