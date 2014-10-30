<?php

namespace DhBw\Util;

use DhBw\Util\Type\TypeHint;

require_once dirname(__FILE__) . '/Type/TypeHint.php';


class ClassLoader
{

    protected $namespace;
    protected $includePath;
    protected $namespaceSeparator = '\\';

    /**
     * @param string $namespace
     */
    public function __construct($namespace)
    {
        TypeHint::exceptionIfArgumentIsNotString($namespace);
        $this->namespace = $namespace;
    }

    /**
     * @param string $separator The separator to use.
     */
    public function setNamespaceSeparator($separator)
    {
        TypeHint::exceptionIfArgumentIsNotString($separator);
        $this->namespaceSeparator = $separator;
    }

    /**
     * @return string
     */
    public function getNamespaceSeparator()
    {
        return $this->namespaceSeparator;
    }

    /**
     * @param string $includePath The include path to use
     */
    public function setIncludePath($includePath)
    {
        TypeHint::exceptionIfArgumentIsNotString($includePath);
        $includePath       = rtrim($includePath, '/');
        $this->includePath = $includePath;
    }

    /**
     * @return bool
     */
    public function isSetIncludepath()
    {
        $isSet = $this->includePath !== null;

        return $isSet;
    }

    /**
     * @return string
     * @throws \DomainException
     */
    public function getIncludePath()
    {
        if (!$this->isSetIncludepath()) {
            throw new \DomainException('Include path is not set');
        }

        return $this->includePath;
    }

    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    /**
     * @param string $className The class name to load
     *
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function loadClass($className)
    {
        TypeHint::exceptionIfArgumentIsNotString($className);

        if ($this->isResponsibleToLoad($className)) {

            $fileName = $this->calculateFileName($className);
            $this->requireFile($fileName);
        }
    }

    /**
     * @param string $className
     *
     * @return bool
     */
    public function isResponsibleToLoad($className)
    {
        TypeHint::exceptionIfArgumentIsNotString($className);

        $namespaceWithSeparator      = $this->namespace . $this->namespaceSeparator;
        $lengthOfRegisteredNamespace = strlen($namespaceWithSeparator);
        $givenNamespace              = substr($className, 0, $lengthOfRegisteredNamespace);

        $isRegisteredNamespace = $namespaceWithSeparator === $givenNamespace;

        return $isRegisteredNamespace;
    }

    /**
     * @param string $className
     *
     * @return string
     */
    public function calculateFileName($className)
    {
        $fileName                     = '';
        $lastNamespacePositionOfClass = strripos($className, $this->namespaceSeparator);

        if (false !== $lastNamespacePositionOfClass) {
            $namespaceOfGivenClass = substr($className, 0, $lastNamespacePositionOfClass);
            $className             = substr($className, $lastNamespacePositionOfClass + 1);
            $fileName              = str_replace($this->namespaceSeparator, '/', $namespaceOfGivenClass) . '/';
        }

        $fileName .= str_replace('_', '/', $className) . '.php';


        if ($this->isSetIncludepath()) {
            $fileName = $this->getIncludePath() . '/' . $fileName;
        }

        return $fileName;
    }

    /**
     * @param string $fileNames
     *
     * @throws \RuntimeException
     */
    protected function requireFile($fileNames)
    {
        if (!file_exists($fileNames)) {
            throw new \RuntimeException('File not found: ' . $fileNames);
        }

        require $fileNames;
    }

}