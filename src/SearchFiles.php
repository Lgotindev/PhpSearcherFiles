<?php

namespace src\SearchFiles;

class SearchFiles
{
    private $path;
    private $file;

    public function __construct(string $path = "", string $file = ".ixt")
    {
        $this->path = $path;
        $this->file = $file;
    }

    public function searchFile()
    {
        $fileList = [];
        if ($currentDir = opendir($this->path)) {
            while ($file = readdir($currentDir)) {
                if (strpos($file, $this->file) === strlen($file) - strlen($this->file)) {
                    $fileList[] = $file;
                }
            }
            closedir($currentDir);
            asort($fileList, SORT_STRING);
        }
        return $fileList;
    }
}
