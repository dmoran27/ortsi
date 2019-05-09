<?php

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
    Route::apiResource('rules', 'RulesController', ['only' => ['index']]);
    Route::apiResource('clientes', 'ClientesController');
    Route::apiResource('perifericos', 'PerifericosController');
    Route::apiResource('caracteristicas', 'CaracteristicasController');
    Route::apiResource('equipos', 'EquiposController');
    Route::apiResource('tipos', 'TiposController');
    Route::apiResource('softwares', 'SoftwaresController');
    Route::apiResource('dependencias', 'DependenciasController');
    Route::apiResource('edificios', 'EdificiosController');
    Route::apiResource('tickets', 'TicketsController');
    Route::apiResource('roles', 'RolesController');
    Route::apiResource('users', 'UsersController');

    Route::get('reports', 'ReportsController@index')->name('reports.index');
    Route::get('user-actions', 'UserActionsController@index')->name('user-actions.index');
});
