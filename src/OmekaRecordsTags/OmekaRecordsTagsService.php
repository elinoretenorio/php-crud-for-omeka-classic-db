<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaRecordsTags;

class OmekaRecordsTagsService implements IOmekaRecordsTagsService
{
    private IOmekaRecordsTagsRepository $repository;

    public function __construct(IOmekaRecordsTagsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaRecordsTagsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaRecordsTagsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OmekaRecordsTagsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OmekaRecordsTagsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaRecordsTagsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaRecordsTagsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OmekaRecordsTagsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaRecordsTagsDto($row);

        return new OmekaRecordsTagsModel($dto);
    }
}