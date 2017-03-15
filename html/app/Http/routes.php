<?php

get('/login', ['as' => 'login', 'uses' => 'SteamController@login']);
get('/', ['as' => 'index', 'uses' => 'GameController@currentGame']);
get('/about', ['as' => 'about', 'uses' => 'PagesController@about']);
get('/support', ['as' => 'support', 'uses' => 'PagesController@support']);
get('/shop', ['as' => 'shop', 'uses' => 'PagesController@shop']);
get('/top', ['as' => 'top', 'uses' => 'PagesController@top']);
get('/game/{game}', ['as' => 'game', 'uses' => 'PagesController@game']);
get('/donate', 'DonateController@unitpayDonate');
post('ajax', ['as' => 'ajax', 'uses' => 'AjaxController@parseAction']);
get('/chat', ['as' => 'chat', 'uses' => 'ChatController@getchat']);

Route::group(['middleware' => 'auth'], function () {
	post('/add_message', ['as' => 'chat', 'uses' => 'ChatController@add_message']);
    get('/deposit', ['as' => 'deposit', 'uses' => 'GameController@deposit']);
	get('/deposit2', ['as' => 'deposit2', 'uses' => 'GameController@deposit2']);
    get('/profile', ['as' => 'profile', 'uses' => 'PagesController@profile']);
    get('/settings', ['as' => 'settings', 'uses' => 'PagesController@settings']);
    post('/settings/save', ['as' => 'settings.update', 'uses' => 'SteamController@updateSettings']);
    post('/chat', ['as' => 'chat', 'uses' => 'ChatController@chatMessage']);
    get('/myhistory', ['as' => 'myhistory', 'uses' => 'PagesController@myhistory']);
    get('/myinventory', ['as' => 'myinventory', 'uses' => 'PagesController@myinventory']);
    post('/myinventory', ['as' => 'myinventory', 'uses' => 'PagesController@myinventory']);
    get('/history', ['as' => 'history', 'uses' => 'PagesController@history']);
    get('/logout', ['as' => 'logout', 'uses' => 'SteamController@logout']);
    post('/addTicket', ['as' => 'add.ticket', 'uses' => 'GameController@addTicket']);
    post('/getBalance', ['as' => 'get.balance', 'uses' => 'GameController@getBalance']);
});


Route::group(['prefix' => 'api'/*, 'middleware' => 'secretKey'*/], function () {
    //get('/newBet', 'GameController@newBet');
    get('/checkOffer', 'GameController@checkOffer');
    get('/newBet', 'GameController@newBet');
    post('/setGameStatus', 'GameController@setGameStatus');
    post('/setPrizeStatus', 'GameController@setPrizeStatus');
    post('/getCurrentGame', 'GameController@getCurrentGame');
    post('/getWinners', 'GameController@getWinners');
    post('/getPreviousWinner', 'GameController@getPreviousWinner');
    post('/newGame28si21lsdkj2FIXED', 'GameController@newGame');
});

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);