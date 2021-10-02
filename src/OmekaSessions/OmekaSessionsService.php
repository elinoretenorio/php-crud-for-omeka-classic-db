<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSessions;

class OmekaSessionsService implements IOmekaSessionsService
{
    private IOmekaSessionsRepository $repository;

    public function __construct(IOmekaSessionsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OmekaSessionsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OmekaSessionsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $sessionId): ?OmekaSessionsModel
    {
        $dto = $this->repository->get($sessionId);
        if ($dto === null) {
            return null;
        }

        return new OmekaSessionsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OmekaSessionsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OmekaSessionsModel($dto);
        }

        return $result;
    }

    public function delete(int $sessionId): int
    {
        return $this->repository->delete($sessionId);
    }

    public function createModel(array $row): ?OmekaSessionsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OmekaSessionsDto($row);

        return new OmekaSessionsModel($dto);
    }
}