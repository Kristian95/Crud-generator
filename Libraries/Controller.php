<?php

include __DIR__ . 'CrudAbstract.php';

class Controller extends CrudAbstract
{
    public function getStub()
    {
        return  __DIR__ . '/../stubs/controller.stub';
    }
}
