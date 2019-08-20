<?php

namespace Main;

function findFiles(string $dirPath = "datafiles/", array $findFile = ["ixt"])
{
    $fileList = [];
    $allFile = scandir($dirPath);
    foreach($allFile as $item) {
        $exp = explode('.', $item);
        if (count($exp) > 1) {
            if (in_array($exp[1], $findFile)) {
                $fileList[] = $item;
            }
        }
    }
    asort($fileList, SORT_STRING);

    $result = [];
    foreach ($fileList as $word) {
        $exp = explode('.', $word);
        if ((preg_match("/[a-zA-Z0-9]/", $exp[0]))) {
            $result[] = $exp[0] . "." . $exp[1];
        }
    }
    return $result;
}

print_r(findFiles());

/*

$fileList = array_filter(, function($findFile, $file) {
    $Expansion = explode('.', $file);
    return in_array($Expansion[1], $findFile);
});
*/

