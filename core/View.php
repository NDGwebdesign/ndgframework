<?php

class View
{
    protected $view;
    protected $data = [];

    public function __construct($view, $data = [])
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function with($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function render()
    {
        $view = str_replace('.', '/', $this->view);

        extract($this->data);

        ob_start();
        require __DIR__."/../resources/view/$view.php";
        $html = ob_get_clean();

        return parseComponents($html);
    }

    public function __toString()
    {
        return $this->render();
    }
}