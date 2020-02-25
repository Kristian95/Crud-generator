<?php

include __DIR__ . '/../Interfaces/CrudInterface.php';
include __DIR__ . '/../Libraries/Controller.php';
include __DIR__ . '/../Libraries/Model.php';

class CrudFactory implements CrudInterface
{
    private static $availableTypes = [
        'Model'      => Model::class,
        'Controller' => Controller::class,
    ];

    public function create(string $type)
    {
        if (! $this->isTypeAvailable($type)) {
            throw new Exception("The type: {$type} is not available!");
        }

        $crudClass = $this->getClass($type);
        if (! class_exists($crudClass)) {
            throw new Exception("The class: {$crudClass} is not found!");
        }

        return new $crudClass();
    }

    private function isTypeAvailable(string $type)
    {
        return array_key_exists($type, self::$availableTypes);
    }

    private function getClass(string $type)
    {
        return self::$availableTypes[$type];
    }
}
