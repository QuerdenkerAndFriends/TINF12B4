<?php

namespace DhBw\Util\Type;

use DhBw\Util\Type\String\StringTrim;

class Url
{

    protected $scheme = '';
    protected $user = '';
    protected $password = '';
    protected $host = '';
    protected $port = '';
    protected $path = '';
    protected $getParameters;
    protected $fragment = '';

    public function __construct()
    {
        $this->getParameters = new ArrayCollection();
    }

    /**
     * @param string $fragment
     */
    public function setFragment($fragment)
    {
        TypeHint::exceptionIfArgumentIsNotString($fragment);
        $this->fragment = $fragment;
    }

    /**
     * @return string
     */
    public function getFragment()
    {
        return $this->fragment;
    }

    /**
     * @param array $getParameters
     */
    public function setGetParameters(array $getParameters)
    {
        $this->getParameters->initFromArray($getParameters);
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function addGetParameter($key, $value)
    {
        TypeHint::exceptionIfArgumentIsNotString($key);
        TypeHint::exceptionIfArgumentIsNotString($value);
        $this->getParameters->add($key, $value);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function hasGetParameter($key)
    {
        return $this->getParameters->has($key);
    }

    /**
     * @param string $key
     * @return mixed
     * @throws \RuntimeException
     */
    public function getGetParameter($key)
    {
        if(!$this->hasGetParameter($key)) {
            throw new \RuntimeException("Key not set $key");
        }
        return $this->getParameters->get($key);
    }

    /**
     * @return array
     */
    public function getGetParameters()
    {
        return $this->getParameters->toArray();
    }

    /**
     * @param string $hostname
     */
    public function setHost($hostname)
    {
        TypeHint::exceptionIfArgumentIsNotString($hostname);
        $this->host = $hostname;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param $port
     */
    public function setPort($port)
    {
        TypeHint::exceptionIfArgumentIsNotInteger($port);
        $this->port = $port;
    }

    /**
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        TypeHint::exceptionIfArgumentIsNotString($password);
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        TypeHint::exceptionIfArgumentIsNotString($path);
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getPathCleaned()
    {
        $path = $this->path;
        $path = StringTrim::trimLeftByFirstFoundString($path, '.php');
        $path = StringTrim::trimLeftChars($path, '/');

        return $path;
    }

    /**
     * @param string $scheme
     */
    public function setScheme($scheme)
    {
        TypeHint::exceptionIfArgumentIsNotString($scheme);
        $this->scheme = $scheme;
    }

    /**
     * @return string
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        TypeHint::exceptionIfArgumentIsNotString($user);
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

}