<?php

namespace Main;

function findFileNames(string $dirPath, array $validExtensions = ['ixt'])
{
    $filesNames = scandir($dirPath);

    $correctFilesNames = array_filter($filesNames, function($file) use ($validExtensions) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $fileName = pathinfo($file, PATHINFO_FILENAME);
            return in_array($extension, $validExtensions) && preg_match("/[a-zA-Z0-9]/", $fileName);
    });

    return array_values($correctFilesNames);
}

print_r(findFileNames('datafiles/', ['ixt']));