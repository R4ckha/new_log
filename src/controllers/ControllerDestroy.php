<?php

class ControllerDestroy
{   
    private $destroy;
    public function __construct()
    {
        $this->destroy = new SessionDestroy();
        $this->destroy->kill();
    }
}
