<?php

require_once(__DIR__ . '/../Interfaces/CrudFactoryInterface.php');
require_once(__DIR__ . '/../Libraries/Controller.php');
require_once(__DIR__ . '/../Libraries/Model.php');
require_once(__DIR__ . '/../Exceptions/CrudFactoryException.php');

/**
 * Class CrudFactory
 */
class CrudFactory implements CrudFactoryInterface
{
    /**
     * @var array
     */
    private static $availableTypes = [
        'Model'      => Model::class,
        'Controller' => Controller::class,
    ];

    /**
     * @param string $type
     * @return mixed
     * @throws Exception
     */
    public function create(string $type)
    {
        if (! $this->isTypeAvailable($type)) {
            throw new CrudFactoryException("The type: {$type} is not available!");
        }

        $crudClass = $this->getClass($type);
        if (! class_exists($crudClass)) {
            throw new CrudFactoryException("The class: {$crudClass} is not found!");
        }

        return new $crudClass();
    }

    /**
     * @param string $type
     * @return bool
     */
    private function isTypeAvailable(string $type): bool
    {
        return array_key_exists($type, self::$availableTypes);
    }

    /**
     * @param string $type
     * @return mixed
     */
    private function getClass(string $type)
    {
        return self::$availableTypes[$type];
    }
}
