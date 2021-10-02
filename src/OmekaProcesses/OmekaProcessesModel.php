<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaProcesses;

use JsonSerializable;

class OmekaProcessesModel implements JsonSerializable
{
    private int $id;
    private string $class;
    private int $userId;
    private int $pid;
    private string $status;
    private string $args;
    private string $started;
    private string $stopped;

    public function __construct(OmekaProcessesDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->class = $dto->class;
        $this->userId = $dto->userId;
        $this->pid = $dto->pid;
        $this->status = $dto->status;
        $this->args = $dto->args;
        $this->started = $dto->started;
        $this->stopped = $dto->stopped;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function setClass(string $class): void
    {
        $this->class = $class;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getPid(): int
    {
        return $this->pid;
    }

    public function setPid(int $pid): void
    {
        $this->pid = $pid;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getArgs(): string
    {
        return $this->args;
    }

    public function setArgs(string $args): void
    {
        $this->args = $args;
    }

    public function getStarted(): string
    {
        return $this->started;
    }

    public function setStarted(string $started): void
    {
        $this->started = $started;
    }

    public function getStopped(): string
    {
        return $this->stopped;
    }

    public function setStopped(string $stopped): void
    {
        $this->stopped = $stopped;
    }

    public function toDto(): OmekaProcessesDto
    {
        $dto = new OmekaProcessesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->class = $this->class ?? "";
        $dto->userId = (int) ($this->userId ?? 0);
        $dto->pid = (int) ($this->pid ?? 0);
        $dto->status = $this->status ?? "";
        $dto->args = $this->args ?? "";
        $dto->started = $this->started ?? "";
        $dto->stopped = $this->stopped ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "class" => $this->class,
            "user_id" => $this->userId,
            "pid" => $this->pid,
            "status" => $this->status,
            "args" => $this->args,
            "started" => $this->started,
            "stopped" => $this->stopped,
        ];
    }
}