<?php

namespace Main;

require_once 'src/SearchFiles.php';

use src\SearchFiles\SearchFiles;

$object = new SearchFiles("",".ixt");

print_r($object->searchFile());
