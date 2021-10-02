<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSessions;

class OmekaSessionsDto 
{
    public int $sessionId;
    public string $id;
    public int $modified;
    public int $lifetime;
    public string $data;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->sessionId = (int) ($row["session_id"] ?? 0);
        $this->id = $row["id"] ?? "";
        $this->modified = (int) ($row["modified"] ?? 0);
        $this->lifetime = (int) ($row["lifetime"] ?? 0);
        $this->data = $row["data"] ?? "";
    }
}