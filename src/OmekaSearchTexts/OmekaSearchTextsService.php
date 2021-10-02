<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSearchTexts;

class OmekaSearchTextsService implements IOmekaSearchTextsService
{
    private IOmekaSearchTextsRepository $repository;

    public function __construct(IOmekaSearchTextsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaSearchTextsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaSearchTextsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaSearchTextsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaSearchTextsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaSearchTextsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaSearchTextsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaSearchTextsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaSearchTextsDto($row);

        return new OmekaSearchTextsModel($dto);
    }
}