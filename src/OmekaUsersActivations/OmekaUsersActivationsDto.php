<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsersActivations;

class OmekaUsersActivationsDto 
{
    public int $id;
    public int $userId;
    public string $url;
    public string $added;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->userId = (int) ($row["user_id"] ?? 0);
        $this->url = $row["url"] ?? "";
        $this->added = $row["added"] ?? "";
    }
}