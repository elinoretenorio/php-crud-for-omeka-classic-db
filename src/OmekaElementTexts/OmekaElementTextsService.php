<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementTexts;

class OmekaElementTextsService implements IOmekaElementTextsService
{
    private IOmekaElementTextsRepository $repository;

    public function __construct(IOmekaElementTextsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaElementTextsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaElementTextsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaElementTextsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaElementTextsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaElementTextsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaElementTextsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaElementTextsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaElementTextsDto($row);

        return new OmekaElementTextsModel($dto);
    }
}