<?php

include __DIR__ . 'CrudAbstract.php';

class Model extends CrudAbstract
{
	public function getStub()
    {
        return  __DIR__ . '/../stubs/model.stub';
    }
}
