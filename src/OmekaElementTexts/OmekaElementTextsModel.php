<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementTexts;

use JsonSerializable;

class OmekaElementTextsModel implements JsonSerializable
{
    private int $id;
    private int $recordId;
    private string $recordType;
    private int $elementId;
    private int $html;
    private string $text;

    public function __construct(OmekaElementTextsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->recordId = $dto->recordId;
        $this->recordType = $dto->recordType;
        $this->elementId = $dto->elementId;
        $this->html = $dto->html;
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

    public function getElementId(): int
    {
        return $this->elementId;
    }

    public function setElementId(int $elementId): void
    {
        $this->elementId = $elementId;
    }

    public function getHtml(): int
    {
        return $this->html;
    }

    public function setHtml(int $html): void
    {
        $this->html = $html;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function toDto(): OmekaElementTextsDto
    {
        $dto = new OmekaElementTextsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->recordId = (int) ($this->recordId ?? 0);
        $dto->recordType = $this->recordType ?? "";
        $dto->elementId = (int) ($this->elementId ?? 0);
        $dto->html = (int) ($this->html ?? 0);
        $dto->text = $this->text ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "record_id" => $this->recordId,
            "record_type" => $this->recordType,
            "element_id" => $this->elementId,
            "html" => $this->html,
            "text" => $this->text,
        ];
    }
}