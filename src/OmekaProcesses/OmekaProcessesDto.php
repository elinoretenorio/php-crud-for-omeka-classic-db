<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaProcesses;

class OmekaProcessesDto 
{
    public int $id;
    public string $class;
    public int $userId;
    public int $pid;
    public string $status;
    public string $args;
    public string $started;
    public string $stopped;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->class = $row["class"] ?? "";
        $this->userId = (int) ($row["user_id"] ?? 0);
        $this->pid = (int) ($row["pid"] ?? 0);
        $this->status = $row["status"] ?? "";
        $this->args = $row["args"] ?? "";
        $this->started = $row["started"] ?? "";
        $this->stopped = $row["stopped"] ?? "";
    }
}