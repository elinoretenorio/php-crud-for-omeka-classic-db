<?php

declare(strict_types=1);

$router->get("/omeka-collections", "OmekaClassic\OmekaCollections\OmekaCollectionsController::getAll");
$router->post("/omeka-collections", "OmekaClassic\OmekaCollections\OmekaCollectionsController::insert");
$router->group("/omeka-collections", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaCollections\OmekaCollectionsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaCollections\OmekaCollectionsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaCollections\OmekaCollectionsController::delete");
});

$router->get("/omeka-element-sets", "OmekaClassic\OmekaElementSets\OmekaElementSetsController::getAll");
$router->post("/omeka-element-sets", "OmekaClassic\OmekaElementSets\OmekaElementSetsController::insert");
$router->group("/omeka-element-sets", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaElementSets\OmekaElementSetsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaElementSets\OmekaElementSetsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaElementSets\OmekaElementSetsController::delete");
});

$router->get("/omeka-element-texts", "OmekaClassic\OmekaElementTexts\OmekaElementTextsController::getAll");
$router->post("/omeka-element-texts", "OmekaClassic\OmekaElementTexts\OmekaElementTextsController::insert");
$router->group("/omeka-element-texts", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaElementTexts\OmekaElementTextsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaElementTexts\OmekaElementTextsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaElementTexts\OmekaElementTextsController::delete");
});

$router->get("/omeka-elements", "OmekaClassic\OmekaElements\OmekaElementsController::getAll");
$router->post("/omeka-elements", "OmekaClassic\OmekaElements\OmekaElementsController::insert");
$router->group("/omeka-elements", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaElements\OmekaElementsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaElements\OmekaElementsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaElements\OmekaElementsController::delete");
});

$router->get("/omeka-files", "OmekaClassic\OmekaFiles\OmekaFilesController::getAll");
$router->post("/omeka-files", "OmekaClassic\OmekaFiles\OmekaFilesController::insert");
$router->group("/omeka-files", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaFiles\OmekaFilesController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaFiles\OmekaFilesController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaFiles\OmekaFilesController::delete");
});

$router->get("/omeka-item-types", "OmekaClassic\OmekaItemTypes\OmekaItemTypesController::getAll");
$router->post("/omeka-item-types", "OmekaClassic\OmekaItemTypes\OmekaItemTypesController::insert");
$router->group("/omeka-item-types", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaItemTypes\OmekaItemTypesController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaItemTypes\OmekaItemTypesController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaItemTypes\OmekaItemTypesController::delete");
});

$router->get("/omeka-item-types-elements", "OmekaClassic\OmekaItemTypesElements\OmekaItemTypesElementsController::getAll");
$router->post("/omeka-item-types-elements", "OmekaClassic\OmekaItemTypesElements\OmekaItemTypesElementsController::insert");
$router->group("/omeka-item-types-elements", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaItemTypesElements\OmekaItemTypesElementsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaItemTypesElements\OmekaItemTypesElementsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaItemTypesElements\OmekaItemTypesElementsController::delete");
});

$router->get("/omeka-items", "OmekaClassic\OmekaItems\OmekaItemsController::getAll");
$router->post("/omeka-items", "OmekaClassic\OmekaItems\OmekaItemsController::insert");
$router->group("/omeka-items", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaItems\OmekaItemsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaItems\OmekaItemsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaItems\OmekaItemsController::delete");
});

$router->get("/omeka-keys", "OmekaClassic\OmekaKeys\OmekaKeysController::getAll");
$router->post("/omeka-keys", "OmekaClassic\OmekaKeys\OmekaKeysController::insert");
$router->group("/omeka-keys", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaKeys\OmekaKeysController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaKeys\OmekaKeysController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaKeys\OmekaKeysController::delete");
});

$router->get("/omeka-options", "OmekaClassic\OmekaOptions\OmekaOptionsController::getAll");
$router->post("/omeka-options", "OmekaClassic\OmekaOptions\OmekaOptionsController::insert");
$router->group("/omeka-options", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaOptions\OmekaOptionsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaOptions\OmekaOptionsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaOptions\OmekaOptionsController::delete");
});

$router->get("/omeka-plugins", "OmekaClassic\OmekaPlugins\OmekaPluginsController::getAll");
$router->post("/omeka-plugins", "OmekaClassic\OmekaPlugins\OmekaPluginsController::insert");
$router->group("/omeka-plugins", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaPlugins\OmekaPluginsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaPlugins\OmekaPluginsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaPlugins\OmekaPluginsController::delete");
});

$router->get("/omeka-processes", "OmekaClassic\OmekaProcesses\OmekaProcessesController::getAll");
$router->post("/omeka-processes", "OmekaClassic\OmekaProcesses\OmekaProcessesController::insert");
$router->group("/omeka-processes", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaProcesses\OmekaProcessesController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaProcesses\OmekaProcessesController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaProcesses\OmekaProcessesController::delete");
});

$router->get("/omeka-records-tags", "OmekaClassic\OmekaRecordsTags\OmekaRecordsTagsController::getAll");
$router->post("/omeka-records-tags", "OmekaClassic\OmekaRecordsTags\OmekaRecordsTagsController::insert");
$router->group("/omeka-records-tags", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaRecordsTags\OmekaRecordsTagsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaRecordsTags\OmekaRecordsTagsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaRecordsTags\OmekaRecordsTagsController::delete");
});

$router->get("/omeka-schema-migrations", "OmekaClassic\OmekaSchemaMigrations\OmekaSchemaMigrationsController::getAll");
$router->post("/omeka-schema-migrations", "OmekaClassic\OmekaSchemaMigrations\OmekaSchemaMigrationsController::insert");
$router->group("/omeka-schema-migrations", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaSchemaMigrations\OmekaSchemaMigrationsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaSchemaMigrations\OmekaSchemaMigrationsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaSchemaMigrations\OmekaSchemaMigrationsController::delete");
});

$router->get("/omeka-search-texts", "OmekaClassic\OmekaSearchTexts\OmekaSearchTextsController::getAll");
$router->post("/omeka-search-texts", "OmekaClassic\OmekaSearchTexts\OmekaSearchTextsController::insert");
$router->group("/omeka-search-texts", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaSearchTexts\OmekaSearchTextsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaSearchTexts\OmekaSearchTextsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaSearchTexts\OmekaSearchTextsController::delete");
});

$router->get("/omeka-sessions", "OmekaClassic\OmekaSessions\OmekaSessionsController::getAll");
$router->post("/omeka-sessions", "OmekaClassic\OmekaSessions\OmekaSessionsController::insert");
$router->group("/omeka-sessions", function ($router) {
    $router->get("/{session_id:number}", "OmekaClassic\OmekaSessions\OmekaSessionsController::get");
    $router->post("/{session_id:number}", "OmekaClassic\OmekaSessions\OmekaSessionsController::update");
    $router->delete("/{session_id:number}", "OmekaClassic\OmekaSessions\OmekaSessionsController::delete");
});

$router->get("/omeka-tags", "OmekaClassic\OmekaTags\OmekaTagsController::getAll");
$router->post("/omeka-tags", "OmekaClassic\OmekaTags\OmekaTagsController::insert");
$router->group("/omeka-tags", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaTags\OmekaTagsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaTags\OmekaTagsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaTags\OmekaTagsController::delete");
});

$router->get("/omeka-users", "OmekaClassic\OmekaUsers\OmekaUsersController::getAll");
$router->post("/omeka-users", "OmekaClassic\OmekaUsers\OmekaUsersController::insert");
$router->group("/omeka-users", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaUsers\OmekaUsersController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaUsers\OmekaUsersController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaUsers\OmekaUsersController::delete");
});

$router->get("/omeka-users-activations", "OmekaClassic\OmekaUsersActivations\OmekaUsersActivationsController::getAll");
$router->post("/omeka-users-activations", "OmekaClassic\OmekaUsersActivations\OmekaUsersActivationsController::insert");
$router->group("/omeka-users-activations", function ($router) {
    $router->get("/{id:number}", "OmekaClassic\OmekaUsersActivations\OmekaUsersActivationsController::get");
    $router->post("/{id:number}", "OmekaClassic\OmekaUsersActivations\OmekaUsersActivationsController::update");
    $router->delete("/{id:number}", "OmekaClassic\OmekaUsersActivations\OmekaUsersActivationsController::delete");
});

