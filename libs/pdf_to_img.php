<?php


function _create_preview_images($file_name) {

    // Strip document extension
    $file_name = basename($file_name, '.pdf');

    // Convert this document
    // Each page to single image
    $img = new imagick('../files/'.$file_name.'.pdf[0]');

    // Set background color and flatten
    // Prevents black background on objects with transparency
    $img->setImageBackgroundColor('white');
    $img = $img->flattenImages();

    // Set image resolution
    $img->setResolution(300,300);

    // Compress Image Quality
    $img->setImageCompressionQuality(100);

    // Set image format
    $img->setImageFormat('jpeg');

    // Write Images to temp 'upload' folder     
    $img->writeImage('../files/'.$file_name.'-0.jpg');

    $img->destroy();
}

$file_name = 'stadi';

_create_preview_images($file_name);