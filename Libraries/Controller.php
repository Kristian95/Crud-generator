<?php

require_once(__DIR__ . '/CrudAbstract.php');

class Controller extends CrudAbstract
{
    protected $class = 'classModel';
    protected $namespace = 'namespaceModel';
    private $viewPath = 'viewPath';
    private $crudName = 'crudName';
    private $viewName = 'viewName';

    /**
     * @return $this
     */
    public function process(): self
    {
        $this->createDir();
        $stub = $this->getStub();
        $class = $this->getClass();
        $viewPath = $this->getViewPath();
        $crudName = $this->getCrudName();
        $viewName = $this->getViewName();
        $namespace = $this->getNamespace();

        return $this->replaceNamespace($stub, $namespace)
            ->replaceViewPath($stub, $viewPath)
            ->replaceCrudName($stub, $crudName)
            ->replaceViewName($stub, $viewName)
            ->replaceClass($stub, $class);
    }

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/../stubs/controller.stub';
    }

    /**
     * @param $stub
     * @param $viewPath
     * @return $this
     */
    protected function replaceViewPath(&$stub, $viewPath): self
    {
        $stub = str_replace('{{viewPath}}', $viewPath, $stub);

        return $this;
    }

    /**
     * @param $stub
     * @param $namespace
     * @return $this
     */
    protected function replaceCrudName(&$stub, $namespace): self
    {
        $stub = str_replace('{{crudName}}', $namespace, $stub);

        return $this;
    }

    /**
     * @param $stub
     * @param $viewName
     * @return $this
     */
    protected function replaceViewName(&$stub, $viewName): self
    {
        $stub = str_replace('{{viewName}}', $viewName, $stub);

        return $this;
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
