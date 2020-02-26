<?php

require_once(__DIR__ . '/CrudAbstract.php');

class Controller extends CrudAbstract
{
    private $class = 'classModel';
    private $namespace = 'namespaceModel';
    private $viewPath = 'viewPath';
    private $crudName = 'crudName';
    private $viewName = 'viewName';

    /**
     * @return string
     */
    public function getStub(): string
    {
        return __DIR__ . '/../stubs/controller.stub';
    }

    /**
     * @return $this
     */
    public function process(): self
    {
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
