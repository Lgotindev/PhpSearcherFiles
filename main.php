<?php

namespace Main;

function findFile(string $dirPath = "datafiles/", string $findFile = ".ixt")
{
    $result = [];
    $fileList = [];
    if ($currentDir = opendir($dirPath)) {
        while ($file = readdir($currentDir)) {
            if (strpos($file, $findFile) === strlen($file) - strlen($findFile)) {
                $fileList[] = $file;
            }
        }
    }
    closedir($currentDir);
    asort($fileList, SORT_STRING);
    foreach ($fileList as $word) {
        $fullName = explode('.', $word);
        if ((preg_match("/[a-zA-Z0-9]/", $fullName[0]))) {
            $result[] = $fullName[0] . "{$findFile}";
        }
    }
    return $result;
}

print_r(findFile());


