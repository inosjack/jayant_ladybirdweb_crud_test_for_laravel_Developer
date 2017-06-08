<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("login");
});

/**
 * Admin Login
 */
Route::group(["namespace" => "Admin","prefix" => "admin","middleware" => "web"], function()
{
    Route::get("/", ["as" => "admin.login", "uses" => "AdminLoginController@index"]);
    Route::post("/login", ["as" => "admin.login_check", "uses" => "AdminLoginController@ajaxLogin"]);
    Route::get("logout", ["as" => "admin.logout", "uses" => "AdminLoginController@logout"]);
});


// Admin Panel After Login
Route::group(["namespace" => "Admin", "middleware" => ["auth.admin","web"], "prefix" => "admin"], function() {
    //region Dashboard Routes
    Route::resource("dashboard", "AdminDashboardController",["as"=>"admin"]);
    //endregion
    //region Profile Routes
    Route::resource("profile", "AdminProfileSettingController");
    //endregion

    //region Assets Routes

//    Route::get("assets/{id}/lend", ["as" => "admin.assets.lend.show", "uses" => "AssetLendingHistoriesController@show_lend"]);
//    Route::post("assets/lend", ["as" => "admin.assets.lend", "uses" => "AssetLendingHistoriesController@lend"]);
//
//    Route::get("assets/return/{id}", ["as" => "admin.assets.return.show", "uses" => "AssetLendingHistoriesController@show_return"]);
//    Route::post("assets/return/{id}", ["as" => "admin.assets.return", "uses" => "AssetLendingHistoriesController@return"]);

    Route::get("assets/ajax", ["as" => "admin.assets.ajax", "uses" => "AssetsController@ajax_assets"]);
    Route::resource("assets", "AssetsController", ["as" => "admin", "except" => [""]]);
    //endregion

    //region Employee Routes
    Route::get("employees/ajax", ["as" => "admin.employees.ajax", "uses" => "EmployeeController@ajax_employees"]);
    Route::resource("employees", "EmployeeController", ["as" => "admin", "except" => [""]]);
    //endregion

});