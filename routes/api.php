<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.', 'middleware' => 'api.key'], function () {
    Route::get('', function (){
        return response()->json(['status' => true]);
    });

    Route::resource('account', 'AccountListController');

});