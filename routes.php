<?php

    Route::resource('book', 'BookController');
    Route::resource('author', 'AuthorController');
    Route::resource('publisher', 'PublisherController');

    Route::get('/', function () {return view('home');});

    Route::dispatch();
?>
