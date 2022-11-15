<?php

class Restfulapi_Controller
{
	public $baseName = 'restfulapi';
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>