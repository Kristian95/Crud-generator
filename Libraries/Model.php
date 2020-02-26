<?php

require_once(__DIR__ . '/CrudAbstract.php');

class Model extends CrudAbstract
{
    protected $class = 'classModel';
    protected $namespace = 'namespaceModel';
    private $table = 'table_name';

    /**
     * @return string
     */
    public function process()
    {
        $this->createDir();
        $stub = $this->getStub();
        $stub = $this->createFileContent($stub);

        return $stub;
    }

    /**
     * @param $stub
     * @return string
     */
    protected function createFileContent($stub)
    {
        $stub = $this->replaceTable($stub, $this->getTable());
        $stub = $this->replaceNamespace($stub, $this->getNamespace());
        $stub = $this->replaceClass($stub, $this->getClass());

        return $stub;
    }

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return file_get_contents(__DIR__ . '/../stubs/model.stub');
    }

    /**
     * Replace the table for the given stub.
     *
     * @param string $stub
     * @param string $table
     * @return string
     */
    protected function replaceTable(&$stub, $table): string
    {
        return str_replace('{{table}}', $table, $stub);
    }

    /**
     * @return string
     */
    private function getTable(): string
    {
        return $this->table;
    }
}
