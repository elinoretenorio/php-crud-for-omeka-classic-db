<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaOptions;

class OmekaOptionsService implements IOmekaOptionsService
{
    private IOmekaOptionsRepository $repository;

    public function __construct(IOmekaOptionsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaOptionsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaOptionsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaOptionsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaOptionsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaOptionsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaOptionsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaOptionsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaOptionsDto($row);

        return new OmekaOptionsModel($dto);
    }
}