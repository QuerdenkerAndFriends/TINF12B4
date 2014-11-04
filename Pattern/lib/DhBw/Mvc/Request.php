<?php

namespace DhBw\Mvc;

use DhBw\Util\Type\ArrayCollection;
use DhBw\Util\Type\TypeHint;

class Request
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var \DhBw\Util\Type\ArrayCollection
     */
    protected $getParameter;
    /**
     * @var \DhBw\Util\Type\ArrayCollection
     */
    protected $postParameter;


    public function __construct()
    {
        $this->getParameter = new ArrayCollection();
        $this->postParameter = new ArrayCollection();
    }

    /**
     * @return Request
     */
    public static function instanceFromGlobals()
    {
        $request = new Request();
        $request->setUrl($_SERVER['REQUEST_URI']);
        $request->getGetParameter()->initFromArray($_GET);
        $request->getPostParameter()->initFromArray($_POST);

        return $request;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        TypeHint::exceptionIfArgumentIsNotString($url);

        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return ArrayCollection
     */
    public function getGetParameter()
    {
        return $this->getParameter;
    }

    /**
     * @return ArrayCollection
     */
    public function getPostParameter()
    {
        return $this->postParameter;
    }


}