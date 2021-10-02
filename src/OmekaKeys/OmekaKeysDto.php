<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaKeys;

class OmekaKeysDto 
{
    public int $id;
    public int $userId;
    public string $label;
    public string $key;
    public string $ip;
    public string $accessed;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->userId = (int) ($row["user_id"] ?? 0);
        $this->label = $row["label"] ?? "";
        $this->key = $row["key"] ?? "";
        $this->ip = $row["ip"] ?? "";
        $this->accessed = $row["accessed"] ?? "";
    }
}