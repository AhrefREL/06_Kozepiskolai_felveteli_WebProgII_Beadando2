<?php
class Regisztracio_Controller
{
	public $baseName = 'regisztracio';
	public function main(array $vars)
	{
		$regisztracioModel = new Regisztracio_Model;
        if(!empty($vars)){
		$retData = $regisztracioModel->regisztracio($vars);	
        if($retData['eredmeny'] == "ERROR")
			$this->baseName = "regisztracio";}
		$view = new View_Loader($this->baseName.'_main');
        if(!empty($vars))
		foreach($retData as $name => $value)
			$view->assign($name, $value);	
	}
}
?>