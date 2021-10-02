<?php

declare(strict_types=1);

namespace OmekaClassic\Tests\OmekaFiles;

use PHPUnit\Framework\TestCase;
use OmekaClassic\OmekaFiles\{ OmekaFilesDto, OmekaFilesModel };

class OmekaFilesModelTest extends TestCase
{
    private array $input;
    private OmekaFilesDto $dto;
    private OmekaFilesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 3411,
            "item_id" => 8510,
            "order" => 4840,
            "size" => 6322,
            "has_derivative_image" => 1519,
            "authentication" => "interesting",
            "mime_type" => "identify",
            "type_os" => "record",
            "filename" => "Morning high foreign break trip. Agent state candidate blood order news social. Among call program.",
            "original_filename" => "Probably through skill process. Kitchen near hope.",
            "modified" => "2021-09-23 01:41:41",
            "added" => "2021-09-26 23:13:48",
            "stored" => 4859,
            "metadata" => "Cultural material argue receive indicate. Ever possible eight all nearly answer.",
        ];
        $this->dto = new OmekaFilesDto($this->input);
        $this->model = new OmekaFilesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OmekaFilesModel(null);

        $this->assertInstanceOf(OmekaFilesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 8476;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetItemId(): void
    {
        $this->assertEquals($this->dto->itemId, $this->model->getItemId());
    }

    public function testSetItemId(): void
    {
        $expected = 1982;
        $model = $this->model;
        $model->setItemId($expected);

        $this->assertEquals($expected, $model->getItemId());
    }

    public function testGetOrder(): void
    {
        $this->assertEquals($this->dto->order, $this->model->getOrder());
    }

    public function testSetOrder(): void
    {
        $expected = 7261;
        $model = $this->model;
        $model->setOrder($expected);

        $this->assertEquals($expected, $model->getOrder());
    }

    public function testGetSize(): void
    {
        $this->assertEquals($this->dto->size, $this->model->getSize());
    }

    public function testSetSize(): void
    {
        $expected = 4189;
        $model = $this->model;
        $model->setSize($expected);

        $this->assertEquals($expected, $model->getSize());
    }

    public function testGetHasDerivativeImage(): void
    {
        $this->assertEquals($this->dto->hasDerivativeImage, $this->model->getHasDerivativeImage());
    }

    public function testSetHasDerivativeImage(): void
    {
        $expected = 4000;
        $model = $this->model;
        $model->setHasDerivativeImage($expected);

        $this->assertEquals($expected, $model->getHasDerivativeImage());
    }

    public function testGetAuthentication(): void
    {
        $this->assertEquals($this->dto->authentication, $this->model->getAuthentication());
    }

    public function testSetAuthentication(): void
    {
        $expected = "close";
        $model = $this->model;
        $model->setAuthentication($expected);

        $this->assertEquals($expected, $model->getAuthentication());
    }

    public function testGetMimeType(): void
    {
        $this->assertEquals($this->dto->mimeType, $this->model->getMimeType());
    }

    public function testSetMimeType(): void
    {
        $expected = "good";
        $model = $this->model;
        $model->setMimeType($expected);

        $this->assertEquals($expected, $model->getMimeType());
    }

    public function testGetTypeOs(): void
    {
        $this->assertEquals($this->dto->typeOs, $this->model->getTypeOs());
    }

    public function testSetTypeOs(): void
    {
        $expected = "half";
        $model = $this->model;
        $model->setTypeOs($expected);

        $this->assertEquals($expected, $model->getTypeOs());
    }

    public function testGetFilename(): void
    {
        $this->assertEquals($this->dto->filename, $this->model->getFilename());
    }

    public function testSetFilename(): void
    {
        $expected = "Seven energy sense than measure. Rock newspaper interview already test open stock. East economic because quite yourself.";
        $model = $this->model;
        $model->setFilename($expected);

        $this->assertEquals($expected, $model->getFilename());
    }

    public function testGetOriginalFilename(): void
    {
        $this->assertEquals($this->dto->originalFilename, $this->model->getOriginalFilename());
    }

    public function testSetOriginalFilename(): void
    {
        $expected = "Show use message no development last. Generation what style president nothing TV. Reflect recently five us maintain number.";
        $model = $this->model;
        $model->setOriginalFilename($expected);

        $this->assertEquals($expected, $model->getOriginalFilename());
    }

    public function testGetModified(): void
    {
        $this->assertEquals($this->dto->modified, $this->model->getModified());
    }

    public function testSetModified(): void
    {
        $expected = "2021-10-12 14:53:55";
        $model = $this->model;
        $model->setModified($expected);

        $this->assertEquals($expected, $model->getModified());
    }

    public function testGetAdded(): void
    {
        $this->assertEquals($this->dto->added, $this->model->getAdded());
    }

    public function testSetAdded(): void
    {
        $expected = "2021-10-06 14:39:01";
        $model = $this->model;
        $model->setAdded($expected);

        $this->assertEquals($expected, $model->getAdded());
    }

    public function testGetStored(): void
    {
        $this->assertEquals($this->dto->stored, $this->model->getStored());
    }

    public function testSetStored(): void
    {
        $expected = 3451;
        $model = $this->model;
        $model->setStored($expected);

        $this->assertEquals($expected, $model->getStored());
    }

    public function testGetMetadata(): void
    {
        $this->assertEquals($this->dto->metadata, $this->model->getMetadata());
    }

    public function testSetMetadata(): void
    {
        $expected = "Toward without practice police member could. Property little prepare major brother.";
        $model = $this->model;
        $model->setMetadata($expected);

        $this->assertEquals($expected, $model->getMetadata());
    }

    public function testToDto(): void
    {
        $this->assertEquals($this->dto, $this->model->toDto());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->input, $this->model->jsonSerialize());
    }
}