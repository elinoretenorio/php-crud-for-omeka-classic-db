<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaProcesses;

class OmekaProcessesService implements IOmekaProcessesService
{
    private IOmekaProcessesRepository $repository;

    public function __construct(IOmekaProcessesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaProcessesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaProcessesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaProcessesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaProcessesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaProcessesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaProcessesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaProcessesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaProcessesDto($row);

        return new OmekaProcessesModel($dto);
    }
}