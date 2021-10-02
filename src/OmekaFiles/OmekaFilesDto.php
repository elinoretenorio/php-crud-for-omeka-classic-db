<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaFiles;

class OmekaFilesDto 
{
    public int $id;
    public int $itemId;
    public int $order;
    public int $size;
    public int $hasDerivativeImage;
    public string $authentication;
    public string $mimeType;
    public string $typeOs;
    public string $filename;
    public string $originalFilename;
    public string $modified;
    public string $added;
    public int $stored;
    public string $metadata;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->itemId = (int) ($row["item_id"] ?? 0);
        $this->order = (int) ($row["order"] ?? 0);
        $this->size = (int) ($row["size"] ?? 0);
        $this->hasDerivativeImage = (int) ($row["has_derivative_image"] ?? 0);
        $this->authentication = $row["authentication"] ?? "";
        $this->mimeType = $row["mime_type"] ?? "";
        $this->typeOs = $row["type_os"] ?? "";
        $this->filename = $row["filename"] ?? "";
        $this->originalFilename = $row["original_filename"] ?? "";
        $this->modified = $row["modified"] ?? "";
        $this->added = $row["added"] ?? "";
        $this->stored = (int) ($row["stored"] ?? 0);
        $this->metadata = $row["metadata"] ?? "";
    }
}