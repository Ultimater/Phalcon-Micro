<?php

class MicroCollection extends \Phalcon\Mvc\Micro\Collection
{
    public function setName($name)
    {
        $this->_handlers[count($this->_handlers)-1][3] = $name;
        return $this;
    }
    public function via($methods)
    {
        $this->_handlers[count($this->_handlers)-1][0] = $methods;
        return $this;
    }
}
