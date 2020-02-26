<?php

require_once(__DIR__ . '/CrudAbstract.php');

class Model extends CrudAbstract
{
    private $table = 'table_name';
    private $class = 'classModel';
    private $namespace = 'namespaceModel';

    /**
     * @return Model
     */
    public function process(): self
    {
        $this->createDir();
        $stub = $this->getStub();
        $table = $this->getTable();
        $class = $this->getClass();
        $namespace = $this->getNamespace();

        return $this->replaceTable($stub, $table)
            ->replaceNamespace($stub, $namespace)
            ->replaceClass($stub, $class);
    }

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/../stubs/model.stub';
    }

    /**
     * Replace the table for the given stub.
     *
     * @param string $stub
     * @param string $table
     * @return $this
     */
    protected function replaceTable(&$stub, $table): self
    {
        $stub = str_replace('{{table}}', $table, $stub);

        return $this;
    }

    /**
     * @return string
     */
    private function getTable(): string
    {
        return $this->table;
    }

    /**
     * @return string
     */
    private function getClass(): string
    {
        return $this->class;
    }

    /**
     * @return string
     */
    private function getNamespace(): string
    {
        return $this->namespace;
    }
}
