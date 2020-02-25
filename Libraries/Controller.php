<?php

include __DIR__ . 'CrudAbstract.php';

class Controller extends CrudAbstract
{
    /**
     * @return string
     */
    public function getStub()
    {
        return  __DIR__ . '/../stubs/controller.stub';
    }

    public function process()
    {

    }
}
