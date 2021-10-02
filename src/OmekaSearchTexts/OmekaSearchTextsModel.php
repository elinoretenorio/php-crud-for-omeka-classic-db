<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSearchTexts;

use JsonSerializable;

class OmekaSearchTextsModel implements JsonSerializable
{
    private int $id;
    private string $recordType;
    private int $recordId;
    private int $public;
    private string $title;
    private string $text;

    public function __construct(OmekaSearchTextsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->recordType = $dto->recordType;
        $this->recordId = $dto->recordId;
        $this->public = $dto->public;
        $this->title = $dto->title;
        $this->text = $dto->text;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getRecordType(): string
    {
        return $this->recordType;
    }

    public function setRecordType(string $recordType): void
    {
        $this->recordType = $recordType;
    }

    public function getRecordId(): int
    {
        return $this->recordId;
    }

    public function setRecordId(int $recordId): void
    {
        $this->recordId = $recordId;
    }

    public function getPublic(): int
    {
        return $this->public;
    }

    public function setPublic(int $public): void
    {
        $this->public = $public;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function toDto(): OmekaSearchTextsDto
    {
        $dto = new OmekaSearchTextsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->recordType = $this->recordType ?? "";
        $dto->recordId = (int) ($this->recordId ?? 0);
        $dto->public = (int) ($this->public ?? 0);
        $dto->title = $this->title ?? "";
        $dto->text = $this->text ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "record_type" => $this->recordType,
            "record_id" => $this->recordId,
            "public" => $this->public,
            "title" => $this->title,
            "text" => $this->text,
        ];
    }
}