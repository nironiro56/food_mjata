<?php
namespace Seonity\Base;

class BaseArrayObject
{
    private $arItem;

    public function __construct(array $arItem)
    {
        $this->arItem = $arItem;
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function get($name)
    {
        if (isset($this->arItem[$name])) {
            return $this->arItem[$name];
        } else {
            return null;
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function set($name, $value)
    {
        $this->arItem[$name] = $value;
    }
}