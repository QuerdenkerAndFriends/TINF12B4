<?php

namespace DhBw\Util\Parser;

use DhBw\Util\Type\String\StringToArray;
use DhBw\Util\Type\TypeHint;
use DhBw\Util\Type\Url;

class UrlParser
{

    /**
     * @param string $url
     *
     * @return Url
     *
     * @throws \InvalidArgumentException
     */
    public function parse($url)
    {
        TypeHint::exceptionIfArgumentIsNotString($url);

        $parsedUrl = new Url();
        $parsedUrl->setScheme($this->parseScheme($url));
        $parsedUrl->setUser($this->parseUser($url));
        $parsedUrl->setPassword($this->parsePassword($url));
        $parsedUrl->setHost($this->parseHost($url));
        $parsedUrl->setPort($this->parsePort($url));
        $parsedUrl->setPath($this->parsePath($url));
        $parsedUrl->setGetParameters($this->parseQuery($url));
        $parsedUrl->setFragment($this->parseFragment($url));

        return $parsedUrl;
    }

    protected function parseScheme($url)
    {
        $scheme = (string)parse_url($url, PHP_URL_SCHEME);

        return $this->chooseValueOrDefault($scheme, '');
    }

    protected function parseUser($url)
    {
        $user = (string)parse_url($url, PHP_URL_USER);

        return $this->chooseValueOrDefault($user, '');
    }

    protected function parsePassword($url)
    {
        $password = (string)parse_url($url, PHP_URL_PASS);

        return $this->chooseValueOrDefault($password, '');
    }

    protected function parseHost($url)
    {
        $host = (string)parse_url($url, PHP_URL_HOST);

        return $this->chooseValueOrDefault($host, '');
    }

    protected function parsePort($url)
    {
        $port = (int)parse_url($url, PHP_URL_PORT);

        return $this->chooseValueOrDefault($port, null);
    }

    protected function parsePath($url)
    {
        $path = (string)parse_url($url, PHP_URL_PATH);

        return $this->chooseValueOrDefault($path, '');
    }

    protected function parseQuery($url)
    {
        $query = (string)parse_url($url, PHP_URL_QUERY);

        return $this->queryToArray($query);
    }

    protected function parseFragment($url)
    {
        $fragment = (string)parse_url($url, PHP_URL_FRAGMENT);

        return $this->chooseValueOrDefault($fragment, '');
    }

    /**
     * @param string $value
     * @param mixed $default
     *
     * @return mixed
     */
    protected function chooseValueOrDefault($value, $default)
    {
        return ($value !== false) ? $value : $default;
    }

    /**
     * @param string $query
     *
     * @return array
     */
    protected function queryToArray($query)
    {
        TypeHint::exceptionIfArgumentIsNotString($query);

        if (strlen($query) === 0) {
            return array();
        }

        $slashedQuery  = str_replace(array('&', '='), '/', $query);
        $getParameters = StringToArray::toKeyValueArrayByDelimiter($slashedQuery, '/');

        return $getParameters;
    }

}