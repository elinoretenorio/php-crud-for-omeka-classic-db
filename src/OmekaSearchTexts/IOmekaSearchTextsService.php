<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSearchTexts;

interface IOmekaSearchTextsService
{
    public function insert(OmekaSearchTextsModel $model): int;

    public function update(OmekaSearchTextsModel $model): int;

    public function get(int $id): ?OmekaSearchTextsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaSearchTextsModel;
}