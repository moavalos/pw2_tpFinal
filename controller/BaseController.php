<?php
abstract class BaseController
{
    protected $model;
    protected $presenter;

    public function __construct($model, $presenter)
    {
        $this->model = $model;
        $this->presenter = $presenter;
    }

    protected function startSession()
    {
        session_start();
    }

    protected function checkSession()
    {
        if (!isset($_SESSION["username"])) {
            header("location: login");
            exit();
        }
    }

    protected function getUsername()
    {
        return $_SESSION["username"];
    }

}