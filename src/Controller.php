<?php

namespace App;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);

        // include "Views/$view.php";
        include "../views/$view.php";
    }
    protected function renderDa($view, $data = [])
    {
        extract($data);

        // include "Views/$view.php";
        include "../views/dashboard/$view.php";
    }
}
