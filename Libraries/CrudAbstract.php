<?php

abstract class CrudAbstract
{
    abstract public function process(): void;
    abstract protected function getStub();
    abstract protected function createFile($stub): void;

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
     * @return string
     */
    protected function replaceNamespace(&$stub, $namespace): string
    {
        return str_replace('{{DummyNamespace}}', $namespace, $stub);
    }

    /**
     * @param $stub
     * @param $class
     * @return string
     */
    protected function replaceClass(&$stub, $class): string
    {
        return str_replace('{{DummyClass}}', $class, $stub);
    }

    /**
     * @return string
     */
    protected function getClass(): string
    {
        return $this->class;
    }

    /**
     * @return string
     */
    protected function getNamespace(): string
    {
        return $this->namespace;
    }
}
