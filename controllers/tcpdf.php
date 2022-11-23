<?php

class Tcpdf_Controller
{
	public $baseName = 'tcpdf';

	public function main(array $vars)
	{
        $pdf = new Tcpdf_Model;

        if(!empty($vars))
        $retData = $pdf->get_data($vars);
      
		$view = new View_Loader($this->baseName."_main");
        
        if(!empty($vars))
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>