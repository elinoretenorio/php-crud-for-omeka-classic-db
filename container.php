<?php

declare(strict_types=1);

// Core

$container->add("Pdo", PDO::class)
    ->addArgument("mysql:dbname={$_ENV["DB_NAME"]};host={$_ENV["DB_HOST"]}")
    ->addArgument($_ENV["DB_USER"])
    ->addArgument($_ENV["DB_PASS"])
    ->addArgument([]);
$container->add("Database", OmekaClassic\Database\PdoDatabase::class)
    ->addArgument("Pdo");

// OmekaCollections

$container->add("OmekaCollectionsRepository", OmekaClassic\OmekaCollections\OmekaCollectionsRepository::class)
    ->addArgument("Database");
$container->add("OmekaCollectionsService", OmekaClassic\OmekaCollections\OmekaCollectionsService::class)
    ->addArgument("OmekaCollectionsRepository");
$container->add(OmekaClassic\OmekaCollections\OmekaCollectionsController::class)
    ->addArgument("OmekaCollectionsService");

// OmekaElementSets

$container->add("OmekaElementSetsRepository", OmekaClassic\OmekaElementSets\OmekaElementSetsRepository::class)
    ->addArgument("Database");
$container->add("OmekaElementSetsService", OmekaClassic\OmekaElementSets\OmekaElementSetsService::class)
    ->addArgument("OmekaElementSetsRepository");
$container->add(OmekaClassic\OmekaElementSets\OmekaElementSetsController::class)
    ->addArgument("OmekaElementSetsService");

// OmekaElementTexts

$container->add("OmekaElementTextsRepository", OmekaClassic\OmekaElementTexts\OmekaElementTextsRepository::class)
    ->addArgument("Database");
$container->add("OmekaElementTextsService", OmekaClassic\OmekaElementTexts\OmekaElementTextsService::class)
    ->addArgument("OmekaElementTextsRepository");
$container->add(OmekaClassic\OmekaElementTexts\OmekaElementTextsController::class)
    ->addArgument("OmekaElementTextsService");

// OmekaElements

$container->add("OmekaElementsRepository", OmekaClassic\OmekaElements\OmekaElementsRepository::class)
    ->addArgument("Database");
$container->add("OmekaElementsService", OmekaClassic\OmekaElements\OmekaElementsService::class)
    ->addArgument("OmekaElementsRepository");
$container->add(OmekaClassic\OmekaElements\OmekaElementsController::class)
    ->addArgument("OmekaElementsService");

// OmekaFiles

$container->add("OmekaFilesRepository", OmekaClassic\OmekaFiles\OmekaFilesRepository::class)
    ->addArgument("Database");
$container->add("OmekaFilesService", OmekaClassic\OmekaFiles\OmekaFilesService::class)
    ->addArgument("OmekaFilesRepository");
$container->add(OmekaClassic\OmekaFiles\OmekaFilesController::class)
    ->addArgument("OmekaFilesService");

// OmekaItemTypes

$container->add("OmekaItemTypesRepository", OmekaClassic\OmekaItemTypes\OmekaItemTypesRepository::class)
    ->addArgument("Database");
$container->add("OmekaItemTypesService", OmekaClassic\OmekaItemTypes\OmekaItemTypesService::class)
    ->addArgument("OmekaItemTypesRepository");
$container->add(OmekaClassic\OmekaItemTypes\OmekaItemTypesController::class)
    ->addArgument("OmekaItemTypesService");

// OmekaItemTypesElements

$container->add("OmekaItemTypesElementsRepository", OmekaClassic\OmekaItemTypesElements\OmekaItemTypesElementsRepository::class)
    ->addArgument("Database");
$container->add("OmekaItemTypesElementsService", OmekaClassic\OmekaItemTypesElements\OmekaItemTypesElementsService::class)
    ->addArgument("OmekaItemTypesElementsRepository");
$container->add(OmekaClassic\OmekaItemTypesElements\OmekaItemTypesElementsController::class)
    ->addArgument("OmekaItemTypesElementsService");

// OmekaItems

$container->add("OmekaItemsRepository", OmekaClassic\OmekaItems\OmekaItemsRepository::class)
    ->addArgument("Database");
$container->add("OmekaItemsService", OmekaClassic\OmekaItems\OmekaItemsService::class)
    ->addArgument("OmekaItemsRepository");
$container->add(OmekaClassic\OmekaItems\OmekaItemsController::class)
    ->addArgument("OmekaItemsService");

// OmekaKeys

$container->add("OmekaKeysRepository", OmekaClassic\OmekaKeys\OmekaKeysRepository::class)
    ->addArgument("Database");
$container->add("OmekaKeysService", OmekaClassic\OmekaKeys\OmekaKeysService::class)
    ->addArgument("OmekaKeysRepository");
$container->add(OmekaClassic\OmekaKeys\OmekaKeysController::class)
    ->addArgument("OmekaKeysService");

// OmekaOptions

$container->add("OmekaOptionsRepository", OmekaClassic\OmekaOptions\OmekaOptionsRepository::class)
    ->addArgument("Database");
$container->add("OmekaOptionsService", OmekaClassic\OmekaOptions\OmekaOptionsService::class)
    ->addArgument("OmekaOptionsRepository");
$container->add(OmekaClassic\OmekaOptions\OmekaOptionsController::class)
    ->addArgument("OmekaOptionsService");

// OmekaPlugins

$container->add("OmekaPluginsRepository", OmekaClassic\OmekaPlugins\OmekaPluginsRepository::class)
    ->addArgument("Database");
$container->add("OmekaPluginsService", OmekaClassic\OmekaPlugins\OmekaPluginsService::class)
    ->addArgument("OmekaPluginsRepository");
$container->add(OmekaClassic\OmekaPlugins\OmekaPluginsController::class)
    ->addArgument("OmekaPluginsService");

// OmekaProcesses

$container->add("OmekaProcessesRepository", OmekaClassic\OmekaProcesses\OmekaProcessesRepository::class)
    ->addArgument("Database");
$container->add("OmekaProcessesService", OmekaClassic\OmekaProcesses\OmekaProcessesService::class)
    ->addArgument("OmekaProcessesRepository");
$container->add(OmekaClassic\OmekaProcesses\OmekaProcessesController::class)
    ->addArgument("OmekaProcessesService");

// OmekaRecordsTags

$container->add("OmekaRecordsTagsRepository", OmekaClassic\OmekaRecordsTags\OmekaRecordsTagsRepository::class)
    ->addArgument("Database");
$container->add("OmekaRecordsTagsService", OmekaClassic\OmekaRecordsTags\OmekaRecordsTagsService::class)
    ->addArgument("OmekaRecordsTagsRepository");
$container->add(OmekaClassic\OmekaRecordsTags\OmekaRecordsTagsController::class)
    ->addArgument("OmekaRecordsTagsService");

// OmekaSchemaMigrations

$container->add("OmekaSchemaMigrationsRepository", OmekaClassic\OmekaSchemaMigrations\OmekaSchemaMigrationsRepository::class)
    ->addArgument("Database");
$container->add("OmekaSchemaMigrationsService", OmekaClassic\OmekaSchemaMigrations\OmekaSchemaMigrationsService::class)
    ->addArgument("OmekaSchemaMigrationsRepository");
$container->add(OmekaClassic\OmekaSchemaMigrations\OmekaSchemaMigrationsController::class)
    ->addArgument("OmekaSchemaMigrationsService");

// OmekaSearchTexts

$container->add("OmekaSearchTextsRepository", OmekaClassic\OmekaSearchTexts\OmekaSearchTextsRepository::class)
    ->addArgument("Database");
$container->add("OmekaSearchTextsService", OmekaClassic\OmekaSearchTexts\OmekaSearchTextsService::class)
    ->addArgument("OmekaSearchTextsRepository");
$container->add(OmekaClassic\OmekaSearchTexts\OmekaSearchTextsController::class)
    ->addArgument("OmekaSearchTextsService");

// OmekaSessions

$container->add("OmekaSessionsRepository", OmekaClassic\OmekaSessions\OmekaSessionsRepository::class)
    ->addArgument("Database");
$container->add("OmekaSessionsService", OmekaClassic\OmekaSessions\OmekaSessionsService::class)
    ->addArgument("OmekaSessionsRepository");
$container->add(OmekaClassic\OmekaSessions\OmekaSessionsController::class)
    ->addArgument("OmekaSessionsService");

// OmekaTags

$container->add("OmekaTagsRepository", OmekaClassic\OmekaTags\OmekaTagsRepository::class)
    ->addArgument("Database");
$container->add("OmekaTagsService", OmekaClassic\OmekaTags\OmekaTagsService::class)
    ->addArgument("OmekaTagsRepository");
$container->add(OmekaClassic\OmekaTags\OmekaTagsController::class)
    ->addArgument("OmekaTagsService");

// OmekaUsers

$container->add("OmekaUsersRepository", OmekaClassic\OmekaUsers\OmekaUsersRepository::class)
    ->addArgument("Database");
$container->add("OmekaUsersService", OmekaClassic\OmekaUsers\OmekaUsersService::class)
    ->addArgument("OmekaUsersRepository");
$container->add(OmekaClassic\OmekaUsers\OmekaUsersController::class)
    ->addArgument("OmekaUsersService");

// OmekaUsersActivations

$container->add("OmekaUsersActivationsRepository", OmekaClassic\OmekaUsersActivations\OmekaUsersActivationsRepository::class)
    ->addArgument("Database");
$container->add("OmekaUsersActivationsService", OmekaClassic\OmekaUsersActivations\OmekaUsersActivationsService::class)
    ->addArgument("OmekaUsersActivationsRepository");
$container->add(OmekaClassic\OmekaUsersActivations\OmekaUsersActivationsController::class)
    ->addArgument("OmekaUsersActivationsService");

