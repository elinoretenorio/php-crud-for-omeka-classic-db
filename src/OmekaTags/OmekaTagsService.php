<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaTags;

class OmekaTagsService implements IOmekaTagsService
{
    private IOmekaTagsRepository $repository;

    public function __construct(IOmekaTagsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaTagsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaTagsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaTagsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaTagsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaTagsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaTagsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaTagsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaTagsDto($row);

        return new OmekaTagsModel($dto);
    }
}