<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElements;

use JsonSerializable;

class OmekaElementsModel implements JsonSerializable
{
    private int $id;
    private int $elementSetId;
    private int $order;
    private string $name;
    private string $description;
    private string $comment;

    public function __construct(OmekaElementsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->elementSetId = $dto->elementSetId;
        $this->order = $dto->order;
        $this->name = $dto->name;
        $this->description = $dto->description;
        $this->comment = $dto->comment;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getElementSetId(): int
    {
        return $this->elementSetId;
    }

    public function setElementSetId(int $elementSetId): void
    {
        $this->elementSetId = $elementSetId;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function toDto(): OmekaElementsDto
    {
        $dto = new OmekaElementsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->elementSetId = (int) ($this->elementSetId ?? 0);
        $dto->order = (int) ($this->order ?? 0);
        $dto->name = $this->name ?? "";
        $dto->description = $this->description ?? "";
        $dto->comment = $this->comment ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "element_set_id" => $this->elementSetId,
            "order" => $this->order,
            "name" => $this->name,
            "description" => $this->description,
            "comment" => $this->comment,
        ];
    }
}