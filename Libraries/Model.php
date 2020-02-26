<?php

require_once(__DIR__ . '/CrudAbstract.php');

class Model extends CrudAbstract
{
    protected $class = 'classModel';
    protected $namespace = 'namespaceModel';
    private $table = 'table_name';
    private $fileName = 'Model/Model.php';

    /**
     * @return void
     */
    public function process(): void
    {
        $this->createDir();
        $stub = $this->getStub();
        $this->createFile($stub);
    }

    /**
     * @param $stub
     * @return void
     */
    protected function createFile($stub): void
    {
        $stub = $this->replaceTable($stub, $this->getTable());
        $stub = $this->replaceNamespace($stub, $this->getNamespace());
        $stub = $this->replaceClass($stub, $this->getClass());

        fopen($this->fileName, 'w') or die('Cannot open file:  '. $this->fileName);
        file_put_contents($this->fileName, $stub);
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
