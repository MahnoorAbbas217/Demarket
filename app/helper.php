<?php

use Illuminate\Support\Facades\Auth;

function loginUser(){
    return Auth::user();
}

function loginUserIdSlug(){
    $data['userid'] = Auth::user()->id;
    $data['storeSlug'] = Auth::user()->store_slug;

    return $data;
}

function activePublication(){
    return ;
}
