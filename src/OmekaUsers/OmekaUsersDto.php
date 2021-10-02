<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsers;

class OmekaUsersDto 
{
    public int $id;
    public string $username;
    public string $name;
    public string $email;
    public string $password;
    public string $salt;
    public int $active;
    public string $role;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->username = $row["username"] ?? "";
        $this->name = $row["name"] ?? "";
        $this->email = $row["email"] ?? "";
        $this->password = $row["password"] ?? "";
        $this->salt = $row["salt"] ?? "";
        $this->active = (int) ($row["active"] ?? 0);
        $this->role = $row["role"] ?? "";
    }
}