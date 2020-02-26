<?php

require_once(__DIR__ . '/CrudAbstract.php');

class Controller extends CrudAbstract
{
    protected $class = 'classController';
    protected $namespace = 'namespaceController';
    private $viewPath = 'viewPath';
    private $crudName = 'crudName';
    private $viewName = 'viewName';
    private $fileName = 'Controller/Controller.php';

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
        $stub = $this->replaceNamespace($stub, $this->getNamespace());
        $stub = $this->replaceViewPath($stub, $this->getViewPath());
        $stub = $this->replaceCrudName($stub, $this->getCrudName());
        $stub = $this->replaceViewName($stub, $this->getViewName());
        $stub = $this->replaceClass($stub, $this->getClass());

        $file = fopen($this->fileName, 'w') or die('Cannot open file:  '. $this->fileName);
        file_put_contents($this->fileName, $stub);
    }

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return file_get_contents(__DIR__ . '/../stubs/controller.stub');
    }

    /**
     * @param $stub
     * @param $viewPath
     * @return string
     */
    protected function replaceViewPath(&$stub, $viewPath): string
    {
        return str_replace('{{viewPath}}', $viewPath, $stub);
    }

    /**
     * @param $stub
     * @param $namespace
     * @return string
     */
    protected function replaceCrudName(&$stub, $namespace): string
    {
        return str_replace('{{crudName}}', $namespace, $stub);
    }

    /**
     * @param $stub
     * @param $viewName
     * @return string
     */
    protected function replaceViewName(&$stub, $viewName): string
    {
        return str_replace('{{viewName}}', $viewName, $stub);
    }

    /**
     * @return string
     */
    private function getViewPath(): string
    {
        return $this->viewPath;
    }

    /**
     * @return string
     */
    private function getCrudName(): string
    {
        return $this->crudName;
    }

    /**
     * @return string
     */
    private function getViewName(): string
    {
        return $this->viewName;
    }
}
