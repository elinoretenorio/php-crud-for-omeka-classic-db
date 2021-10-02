<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsersActivations;

use JsonSerializable;

class OmekaUsersActivationsModel implements JsonSerializable
{
    private int $id;
    private int $userId;
    private string $url;
    private string $added;

    public function __construct(OmekaUsersActivationsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->userId = $dto->userId;
        $this->url = $dto->url;
        $this->added = $dto->added;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getAdded(): string
    {
        return $this->added;
    }

    public function setAdded(string $added): void
    {
        $this->added = $added;
    }

    public function toDto(): OmekaUsersActivationsDto
    {
        $dto = new OmekaUsersActivationsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->userId = (int) ($this->userId ?? 0);
        $dto->url = $this->url ?? "";
        $dto->added = $this->added ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "user_id" => $this->userId,
            "url" => $this->url,
            "added" => $this->added,
        ];
    }
}