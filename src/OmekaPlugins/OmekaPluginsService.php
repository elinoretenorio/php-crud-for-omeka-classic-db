<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaPlugins;

class OmekaPluginsService implements IOmekaPluginsService
{
    private IOmekaPluginsRepository $repository;

    public function __construct(IOmekaPluginsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaPluginsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaPluginsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaPluginsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaPluginsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaPluginsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaPluginsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaPluginsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaPluginsDto($row);

        return new OmekaPluginsModel($dto);
    }
}