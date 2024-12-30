<?php

use Illuminate\Support\Facades\Route;


Route::get('/flash', function (\Illuminate\Http\Request $request) {
    session()->now('kalit', 'qiymat');

    echo session()->get('kalit') . '<br>';
    echo session()->get('kalit') . '<br>';
});


Route::get('/ikkinchi-sorov', function (\Illuminate\Http\Request $request) {
    echo session()->get('kalit') . '<br>';
    echo session()->get('kalit') . '<br>';
});



Route::get('/uchinchi-sorov', function (\Illuminate\Http\Request $request) {
    echo session()->get('kalit') . '<br>';
    echo session()->get('kalit') . '<br>';
});
