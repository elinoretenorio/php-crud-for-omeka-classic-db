<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaUsers;

use JsonSerializable;

class OmekaUsersModel implements JsonSerializable
{
    private int $id;
    private string $username;
    private string $name;
    private string $email;
    private string $password;
    private string $salt;
    private int $active;
    private string $role;

    public function __construct(OmekaUsersDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->username = $dto->username;
        $this->name = $dto->name;
        $this->email = $dto->email;
        $this->password = $dto->password;
        $this->salt = $dto->salt;
        $this->active = $dto->active;
        $this->role = $dto->role;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getSalt(): string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): void
    {
        $this->salt = $salt;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function setActive(int $active): void
    {
        $this->active = $active;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function toDto(): OmekaUsersDto
    {
        $dto = new OmekaUsersDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->username = $this->username ?? "";
        $dto->name = $this->name ?? "";
        $dto->email = $this->email ?? "";
        $dto->password = $this->password ?? "";
        $dto->salt = $this->salt ?? "";
        $dto->active = (int) ($this->active ?? 0);
        $dto->role = $this->role ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "username" => $this->username,
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "salt" => $this->salt,
            "active" => $this->active,
            "role" => $this->role,
        ];
    }
}