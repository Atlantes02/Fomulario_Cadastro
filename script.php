<?php
 	$cnpj = addslashes($_POST['cnpj']);
    
 	if ($cnpj == '00000000000000' || 
		$cnpj == '11111111111111' || 
		$cnpj == '22222222222222' || 
		$cnpj == '33333333333333' || 
		$cnpj == '44444444444444' || 
		$cnpj == '55555555555555' || 
		$cnpj == '66666666666666' || 
		$cnpj == '77777777777777' || 
		$cnpj == '88888888888888' || 
		$cnpj == '99999999999999') {
        return header("location: index.html");
		
	}
	else 
	{   
	 
		$j = 5;
		$k = 6;
		$soma1 = 0;
		$soma2 = 0;

		for ($i = 0; $i < 13; $i++) {

			$j = $j == 1 ? 9 : $j;
			$k = $k == 1 ? 9 : $k;

			$soma2 += ($cnpj{$i} * $k);

			if($i < 12) {
				$soma1 += ($cnpj{$i} * $j);
			}

			$k--;
			$j--;

		}

		$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
        $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;
        
		if(($cnpj{12} != $digito1) and ($cnpj{13} != $digito2)){
            return header("location: index.html");
        }
           
        
    }
    
    $numero= addslashes($_POST['numero']);
    $data = addslashes($_POST['data']);
    $firma = addslashes($_POST['firma']);
    $endereco = addslashes($_POST['endereco']);
    $comp = addslashes($_POST['comp']);
    $bairro = addslashes($_POST['bairro']);
    $cidade = addslashes($_POST['cidade']);
    $estado = addslashes($_POST['estado']);
    $cep = addslashes($_POST['cep']);
	$inscr = addslashes($_POST['inscr']);
    $tels = addslashes($_POST['tels']);
    $cel = addslashes($_POST['cel']);
    $mail = addslashes($_POST['mail']);
    $obs = addslashes($_POST['obs']);



	$arq = fopen("formulario.csv","a");
    fputcsv($arq, array($numero, $data, $firma,$endereco, $comp, $bairro, $cidade, $estado, $cep, $cnpj,$inscr,$tels, $cel, $mail, $obs));
    fclose($arq);

	header("location: index.html");
?>



