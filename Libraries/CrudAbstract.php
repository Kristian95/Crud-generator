<?php

abstract class CrudAbstract
{
    abstract public function process();
    abstract protected function getStub();

    /**
     * Create dir if not exists
     */
    protected function createDir(): void
    {
        $className = get_class($this);

        if (!is_dir($className)) {
            mkdir($className);
        }
    }
    /**
     * @param $stub
     * @param $namespace
     * @return $this
     */
    protected function replaceNamespace(&$stub, $namespace)
    {
        $stub = str_replace('{{modelNamespace}}', $namespace, $stub);

        return $this;
    }

    /**
     * @param $stub
     * @param $class
     * @return $this
     */
    protected function replaceClass(&$stub, $class)
    {
        $stub = str_replace('{{DummyClass}}', $class, $stub);

        return $this;
    }
}
