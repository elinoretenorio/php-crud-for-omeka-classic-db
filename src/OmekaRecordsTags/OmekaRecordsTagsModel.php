<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaRecordsTags;

use JsonSerializable;

class OmekaRecordsTagsModel implements JsonSerializable
{
    private int $id;
    private int $recordId;
    private string $recordType;
    private int $tagId;
    private string $time;

    public function __construct(OmekaRecordsTagsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->recordId = $dto->recordId;
        $this->recordType = $dto->recordType;
        $this->tagId = $dto->tagId;
        $this->time = $dto->time;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getRecordId(): int
    {
        return $this->recordId;
    }

    public function setRecordId(int $recordId): void
    {
        $this->recordId = $recordId;
    }

    public function getRecordType(): string
    {
        return $this->recordType;
    }

    public function setRecordType(string $recordType): void
    {
        $this->recordType = $recordType;
    }

    public function getTagId(): int
    {
        return $this->tagId;
    }

    public function setTagId(int $tagId): void
    {
        $this->tagId = $tagId;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    public function toDto(): OmekaRecordsTagsDto
    {
        $dto = new OmekaRecordsTagsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->recordId = (int) ($this->recordId ?? 0);
        $dto->recordType = $this->recordType ?? "";
        $dto->tagId = (int) ($this->tagId ?? 0);
        $dto->time = $this->time ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "record_id" => $this->recordId,
            "record_type" => $this->recordType,
            "tag_id" => $this->tagId,
            "time" => $this->time,
        ];
    }
}