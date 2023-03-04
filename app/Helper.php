<?php

// function to upload file in storage and return file name
function moveImage($image_name, $path){
    $i = randomImageName().'.'.$image_name->getClientOriginalExtension();
    $d = public_path($path);
    $imagePath = $d."/".$i;
    $image_name->move($d, $i);

    return $i;
}

// function to create random image name
function randomImageName(){
    return time().randomString(2).randomString(2).randomString(2);
}

// function to generate random string
function randomString($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}