<?php

include 'Factories/CrudFactory.php';

if (!function_exists('readline')) {
    function readline($question) {
        $fh = fopen('php://stdin', 'r');
        $userInput = trim(fgets($fh));
        fclose($fh);

        return $userInput;
    }
}

$type = readline('Which type you want to create? ');
$crudFactory = (new CrudFactory())->create($type);
