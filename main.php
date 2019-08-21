<?php

namespace Main;

function findFiles(string $dirPath = "datafiles/", array $validExtensions = ["ixt"])
{
    $filesNames = scandir($dirPath);

    $fileList = array_filter($filesNames, function($file) use ($validExtensions) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $fileName = pathinfo($file, PATHINFO_FILENAME);
            return in_array($extension, $validExtensions) && preg_match("/[a-zA-Z0-9]/", $fileName);
    });

    return array_values($fileList);
}

print_r(findFiles());