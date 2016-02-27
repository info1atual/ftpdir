<?php 

	class Util {

	function fileSizeConvert($bytes)
	{

	    $bytes = floatval($bytes);
	        $arBytes = array(
	            0 => array(
	                "UNIT" => "TB",
	                "VALUE" => pow(1024, 4)
	            ),
	            1 => array(
	                "UNIT" => "GB",
	                "VALUE" => pow(1024, 3)
	            ),
	            2 => array(
	                "UNIT" => "MB",
	                "VALUE" => pow(1024, 2)
	            ),
	            3 => array(
	                "UNIT" => "KB",
	                "VALUE" => 1024
	            ),
	            4 => array(
	                "UNIT" => "B",
	                "VALUE" => 1
	            ),
	        );

	    foreach($arBytes as $arItem) {

	        if($bytes >= $arItem["VALUE"]) {
	            $result = $bytes / $arItem["VALUE"];
	            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
	            break;
	        }

	    }

	    return $result;

	}

	function diasArquivo($arquivo) 
	{

		$dataAtual = date('d M Y');
		$time_inicial = strtotime($dataAtual);
		$dataArquivo = date("d M Y", filectime($arquivo));
		$time_final = strtotime($dataArquivo);
		$diferenca = $time_inicial - $time_final;
		
		$dias = (int)floor($diferenca / (60 * 60 * 24));
		return $dias;

	}

	function diffTimeDate($d1, $d2, $type="", $sep="-") 
	{
		
		$d1 = explode($sep, $d1);
		$d2 = explode($sep, $d2);

			switch ($type) {
			case "A":
			$X = 31536000;
			break;
			case "M":
			$X = 2592000;
			break;
			case "D":
			$X = 86400;
			break;
			case "H":
			$X = 3600;
			break;
			case "MI":
			$X = 60;
			break;
			default:
			$X = 1;

		}

		return floor( ( ( mktime(0, 0, 0, $d2[1], $d2[2], $d2[0]) - mktime(0, 0, 0, $d1[1], $d1[2], $d1[0] ) ) / $X ) );
		
	}

}