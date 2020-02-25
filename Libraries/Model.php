<?php

include __DIR__ . 'CrudAbstract.php';

class Model extends CrudAbstract
{
    /**
     * @return string
     */
	public function getStub()
    {
        return  __DIR__ . '/../stubs/model.stub';
    }

    public function process()
    {

    }
}
