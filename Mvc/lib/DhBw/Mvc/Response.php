<?php

namespace DhBw\Mvc;

use DhBw\Util\Type\ArrayCollection;
use DhBw\Util\Type\TypeHint;

class Response
{

    /**
     * @var \DhBw\Util\Type\ArrayCollection
     */
    protected $headers;
    /**
     * @var string
     */
    protected $body;


    public function __construct()
    {
        $this->headers = new ArrayCollection();
    }


    /**
     * @return ArrayCollection
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        TypeHint::exceptionIfArgumentIsNotString($body);
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

}