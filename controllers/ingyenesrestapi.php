<?php

class Ingyenesrestapi_Controller
{
	public $baseName = 'ingyenesrestapi';
	
	public function main(array $vars)
	{

		$view = new View_Loader($this->baseName."_main");
	}
}

?>