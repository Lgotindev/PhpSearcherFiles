<?php

namespace Main;

function searchFile(string $path = "datafiles/", string $findFile = ".ixt")
{
    $fileList = [];
    if ($currentDir = opendir($path)) {
        while ($file = readdir($currentDir)) {
            if (strpos($file, $findFile) === strlen($file) - strlen($findFile)) {
                $fileList[] = $file;
            }
        }
        closedir($currentDir);
        asort($fileList, SORT_STRING);
    }
    return $fileList;
}

print_r(searchFile());


