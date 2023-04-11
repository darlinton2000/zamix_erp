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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Site inicial
Route::get('/', 'Site\SiteController@index')->name('home');

// Rotas de autenticacao criadas pelo AdminLTE2
Auth::routes();

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function(){
    // Painel Administrativo
    Route::get('admin', 'AdminController@index')->name('admin.home');

    // Perfil
    Route::get('meu-perfil', 'ProfileController@index')->name('profile');
    Route::post('atualizar-perfil', 'ProfileController@update')->name('profile.update');
    
    // Produtos
    Route::get('produtos', 'ProductController@index')->name('products');
    Route::get('novo-produto', 'ProductController@create')->name('products.create');
    Route::post('novo-produto', 'ProductController@store')->name('products.store');
    Route::get('editar-produto/{id}', 'ProductController@edit')->name('products.edit');
    Route::post('editar-produto/{id}', 'ProductController@update')->name('products.update');
    Route::post('deletar-produto/{id}', 'ProductController@destroy')->name('products.destroy');

    // Produtos Compostos
    Route::get('produtos-compostos', 'CompositeProductController@index')->name('composite');

    // Usuarios
    Route::get('usuarios', 'UserController@index')->name('users');
    Route::get('novo-usuario', 'UserController@create')->name('users.create');
    Route::post('novo-usuario', 'UserController@store')->name('users.store');
    Route::get('editar-usuario/{id}', 'UserController@edit')->name('users.edit');
    Route::post('editar-usuario/{id}', 'UserController@update')->name('users.update');
    Route::post('deletar-usuario/{id}', 'UserController@destroy')->name('users.destroy');

    // Requisicoes
    Route::get('requisicoes', 'RequisitionController@index')->name('requisitions');
    Route::get('nova-requisicao', 'RequisitionController@create')->name('requisitions.create');
    Route::post('nova-requisicao', 'RequisitionController@store')->name('requisitions.store');
    Route::get('editar-requisicao/{id}', 'RequisitionController@edit')->name('requisitions.edit');
    Route::post('editar-requisicao/{id}', 'RequisitionController@update')->name('requisitions.update');
    Route::post('deletar-requisicao/{id}', 'RequisitionController@destroy')->name('requisitions.destroy');

    // Estoque
    Route::get('estoque', 'StockController@index')->name('stocks');

    // Relatorios
    Route::get('entrada-estoque', 'ReportController@entryStock')->name('reports.entry.stock');
    Route::post('buscar-entrada-estoque', 'ReportController@searchEntryStock')->name('search.entry.stock');
    Route::get('saida-estoque', 'ReportController@exitStock')->name('reports.exit.stock');
    Route::post('buscar-saida-estoque', 'ReportController@searchExitStock')->name('search.exit.stock');
});




