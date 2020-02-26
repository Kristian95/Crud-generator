<?php

require_once(__DIR__ . '/CrudAbstract.php');

class Model extends CrudAbstract
{
    /**
     * @return string
     */
    public function getStub()
    {
        return __DIR__ . '/../stubs/model.stub';
    }

    public function process()
    {

    }

    /**
     * Replace the table for the given stub.
     *
     * @param string $stub
     * @param string $table
     * @return $this
     */
    protected function replaceTable(&$stub, $table)
    {
        $stub = str_replace('{{table}}', $table, $stub);

        return $this;
    }
}
