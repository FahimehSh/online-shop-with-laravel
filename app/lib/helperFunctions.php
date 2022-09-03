<?php

use App\Models\File;

function uploadFiles($object, $image, $path)
{
    $file_name = time() . '.' . $image->getClientOriginalName();
    $image->storeAs($path, $file_name);
    $file = new File();
    $file->name = $file_name;
    $file->path = $path;
    $object->files()->save($file);
}
