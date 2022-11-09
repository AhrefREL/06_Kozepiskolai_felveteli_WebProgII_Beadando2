<?php
class Beleptet_Controller
{
	public $baseName = 'beleptet';
	public function main(array $vars)
	{
		$beleptetModel = new Beleptet_Model;
		$retData = $beleptetModel->get_data($vars);
		if($retData['eredmeny'] == "ERROR") 
			$this->baseName = "beleptet";
		$view = new View_Loader($this->baseName.'_main');
		/*
		if($retData['eredmeny'] == "OK")
			$this->baseName = "hulladekudvarkereso";
		$view = new View_Loader($this->baseName.'_main');
		*/

		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}
?>