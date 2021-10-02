<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementTexts;

interface IOmekaElementTextsService
{
    public function insert(OmekaElementTextsModel $model): int;

    public function update(OmekaElementTextsModel $model): int;

    public function get(int $id): ?OmekaElementTextsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OmekaElementTextsModel;
}