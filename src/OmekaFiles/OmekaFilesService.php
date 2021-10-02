<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaFiles;

class OmekaFilesService implements IOmekaFilesService
{
    private IOmekaFilesRepository $repository;

    public function __construct(IOmekaFilesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaFilesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaFilesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaFilesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaFilesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaFilesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaFilesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaFilesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaFilesDto($row);

        return new OmekaFilesModel($dto);
    }
}