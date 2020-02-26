<?php

abstract class CrudAbstract
{
    abstract public function getStub();
    abstract public function process();

    /**
     * @param $stub
     * @param $namespace
     * @return $this
     */
    public function replaceNamespace(&$stub, $namespace)
    {
        $stub = str_replace('{{modelNamespace}}', $namespace, $stub);

        return $this;
    }

    /**
     * @param $stub
     * @param $class
     * @return $this
     */
    public function replaceClass(&$stub, $class)
    {
        $stub = str_replace('{{DummyClass}}', $class, $stub);

        return $this;
    }
}
