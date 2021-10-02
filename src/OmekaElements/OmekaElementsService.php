<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElements;

class OmekaElementsService implements IOmekaElementsService
{
    private IOmekaElementsRepository $repository;

    public function __construct(IOmekaElementsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaElementsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaElementsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaElementsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaElementsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaElementsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaElementsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaElementsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaElementsDto($row);

        return new OmekaElementsModel($dto);
    }
}