<?php

class View_Loader
{
    private $data = array();
    private $render = FALSE;
    private $selectedItems = FALSE;

    public function __construct($viewName)
    {
        $file = SERVER_ROOT . 'views/' . strtolower($viewName) . '.php';
        if (file_exists($file))
        {
            $this->render = $file;            
            $this->selectedItems = explode("_", $viewName);
        }        
    }

    public function assign($variable , $value)
    {
        $this->data[$variable] = $value;
    }

    public function __destruct()
    {
        $this->data['render'] = $this->render;
        $this->data['selectedItems'] = $this->selectedItems;
        $viewData = $this->data;
        include(SERVER_ROOT . 'views/page_main.php');
    }
}

?>