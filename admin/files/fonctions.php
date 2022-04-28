<?php


/**
 * @param array $Picture contient la superblobale $_FILe
 * @param string $path contient le chemin ou sera televerse le fichier
 * @param int $maxsize  poids maxsize autorise du fichier
 * 
 * 
 * 
 * @return array
 */




function uploadPicture(array $picture, string $path, int $maxsize = 1): array
{



    $maxsize *= 1048576;

    $typeMime = [
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'jpeg' => 'image/jpeg'
    ];
    $ext = pathinfo(strtolower($picture['name']), PATHINFO_EXTENSION);

    if (array_key_exists($ext, $typeMime) && in_array($picture['type'], $typeMime)) {

        if ($picture['size'] <= $maxsize) {

            $newName = md5(time()) . ".$ext";

            move_uploaded_file(
                $picture['tmp_name'],
                "$path/$newName"
            );

            return ['filename' => $newName];
        } else {
            return ['error' => "Le poids de l'image est trop lourd"];
        }
    } else {
        return ['error' => "Ce fichier n'est pas autorise"];
    }
}
