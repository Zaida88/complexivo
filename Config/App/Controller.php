<?php

class Controller
{
    public function __construct()
    {
        $this ->views = new Views();
        $this ->loadModel();
    }
    public function loadModel()
    {
        $model = get_class($this)."Model";
        $ruta = "Models/".$model. ".php";

        if(file_exists($ruta)){
            require_once $ruta;
            $this-> model = new $model();
        }
    }
}