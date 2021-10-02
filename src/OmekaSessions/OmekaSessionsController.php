<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSessions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Laminas\Diactoros\Response\JsonResponse;

class OmekaSessionsController 
{
    const ERROR_INVALID_INPUT = "Invalid input";

    private IOmekaSessionsService $service;

    public function __construct(IOmekaSessionsService $service)
    {
        $this->service = $service;        
    }

    public function insert(RequestInterface $request, array $args): ResponseInterface
    {
        $data = json_decode($request->getBody()->getContents(), true);
        if (empty($data)) {
            $data = $request->getParsedBody();
        }

        /** @var OmekaSessionsModel $model */
        $model = $this->service->createModel($data);

        $result = $this->service->insert($model);

        return new JsonResponse(["result" => $result]);
    }

    public function update(RequestInterface $request, array $args): ResponseInterface
    {
        $sessionId = (int) ($args["session_id"] ?? 0);
        if ($sessionId <= 0) {
            return new JsonResponse(["result" => $sessionId, "message" => self::ERROR_INVALID_INPUT]);
        }

        $data = json_decode($request->getBody()->getContents(), true);
        if (empty($data)) {
            $data = $request->getParsedBody();
        }

        /** @var OmekaSessionsModel $model */
        $model = $this->service->createModel($data);
        $model->setSessionId($sessionId);

        $result = $this->service->update($model);

        return new JsonResponse(["result" => $result]);
    }

    public function get(RequestInterface $request, array $args): ResponseInterface
    {
        $sessionId = (int) ($args["session_id"] ?? 0);
        if ($sessionId <= 0) {
            return new JsonResponse(["result" => $sessionId, "message" => self::ERROR_INVALID_INPUT]);
        }

        /** @var OmekaSessionsModel $model */
        $model = $this->service->get($sessionId);

        return new JsonResponse(["result" => $model->jsonSerialize()]);
    }

    public function getAll(RequestInterface $request, array $args): ResponseInterface
    {
        $models = $this->service->getAll();

        $result = [];

        /** @var OmekaSessionsModel $model */
        foreach ($models as $model) {
            $result[] = $model->jsonSerialize();
        }

        return new JsonResponse(["result" => $result]);
    }

    public function delete(RequestInterface $request, array $args): ResponseInterface
    {
        $sessionId = (int) ($args["session_id"] ?? 0);
        if ($sessionId <= 0) {
            return new JsonResponse(["result" => $sessionId, "message" => self::ERROR_INVALID_INPUT]);
        }

        $result = $this->service->delete($sessionId);

        return new JsonResponse(["result" => $result]);
    }
}