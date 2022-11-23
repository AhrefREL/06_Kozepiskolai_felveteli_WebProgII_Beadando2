<?php

include(SERVER_ROOT . 'includes/tcpdf/tcpdf.php');



class Tcpdf_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
        $retData['tartalom'] = "";
		try {
			$connection = Database::getConnection();
			$sqlSelect = "SELECT jelentkezo.nev, jelentkezes.szerzett, kepzes.nev as `kepzes_neve`
            FROM ((`jelentkezes` LEFT JOIN kepzes ON jelentkezes.kepzesid = kepzes.id) 
            LEFT JOIN jelentkezo ON jelentkezes.jelentkezoid = jelentkezo.id) 
            WHERE jelentkezes.szerzett >= kepzes.minimum 
            AND jelentkezes.kepzesid= :kepzesid AND jelentkezo.nem = :nem AND jelentkezes.sorrend = :sorrend ";

            $sth = $connection ->prepare($sqlSelect);
            $sth->execute(array(':kepzesid' => $vars['kepzes'], ':nem' => $vars['nem'], ':sorrend' => $vars['sorrend'] ));

			//$jelentkezok = $sth->fetchAll(PDO::FETCH_ASSOC);
           // $retData['tartalom'] = $sth->fetch(PDO::FETCH_ASSOC);
            $retData['tartalom'] .= "<html><head>
            <meta charset='utf-8'>
          </head>
          <body><h1>IT SCHOOL</h1><h2>Minimumponttal rendelkező jelentkezők lekérése képzés, hallgató neme és jelentkezési sorrend szerint.</h2>
            <p>Választott nem: ".$vars['nem']."; Jelentkezési sorrend: ".$vars['sorrend']."</p>
            <table>
            <tr><th>Jelentkező neve</th><th>Jelentkező szerzett pontszáma</th>
            <th>Képzés neve</th></tr>
            ";
            for($i=0; $row = $sth->fetch(); $i++){
                $retData['tartalom'] .= "<tr><td>".$row["nev"]."</td>";
                $retData['tartalom'] .= "<td>".$row["szerzett"]."</td>";
                $retData['tartalom'] .= "<td>".$row["kepzes_neve"]."</td></tr>";
            }
            $retData['tartalom'] .= "</table></body></html>";
            $pdf = new TCPDF('P', 'mm', 'A4',true,'TrueTypeUnicode',FALSE);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            
            $pdf->SetFont('freeserif', '', 10);
            //$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            $pdf->AddPage();
            $pdf->WriteHTMLCell(190,0,'','',$retData['tartalom'],1);

            $pdf->Output("jelentkezokListaja.pdf", "D");

		}
		catch (PDOException $e) {
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}
}

?>