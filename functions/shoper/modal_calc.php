<?php

	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$col_prod = $db->selectCollection('prod');
	
	$pid = $_POST['pid'];
	$item = $col_prod->findOne(['_id' => new MongoDB\BSON\ObjectID($pid)]);

	$calc = $_POST['calc'];
	$count = $_POST['count'];
	$doprab = $item['form'];
	$dec = json_decode($doprab,1);
	
	
				if ($item['buy_data']['money']['inputs']) {
					$p = $item['buy_data']['money']['inputs'];
					
				foreach ($p as $k => $labval) {
						
					if (strpos($labval['label'],'only_pln') !== false) {$r_pln = $labval['value'];}
					if (strpos($labval['label'],'money_pln') !== false) {$r_zln_pln = $labval['value'];}
					if (strpos($labval['label'],'money_zln') !== false) {$r_zln_zln = $labval['value'];}
					if (strpos($labval['label'],'cena_wywolawcza') !== false) {$wywolawcza = $labval['value'];}
					if (strpos($labval['label'],'cena_kup_teraz') !== false) {$only_pln = $labval['value'];}
						
				} 
					
				} else {
					/* tego i tak nigdzie nie ma */
					$p = $item['prices'];
					$only_pln = $p['pln'];
					$money_pln = $p['pln_zln'];
					$money_zln = $p['zln_zln'];
					
				}
	
			
	foreach ($dec as $on) {
		foreach ($calc as $line) {
			if (strpos($on['q'],$line['name']) !== FALSE) {
				/* echo $on['q']."\r\n"; */
				foreach ($on['options'] as $o) {
					
					if (strpos($o['name'],$line['label']) !== FALSE) {
						/*
						echo "Dodawanie czy procent: ".$o['math']."\r\n";
						echo "+ czy -".$o['type']."\r\n";
						print_r($o['values']);
						*/
						
						if (isset($o['values']['per'])) {$per = $o['values']['per'];};
						if (isset($o['values']['pln'])) {$pln = $o['values']['pln'];};
						if (isset($o['values']['zln_pln'])) {$z_pln = $o['values']['zln_pln'];};
						if (isset($o['values']['zln_zln'])) {$z_zln = $o['values']['zln_zln'];};
												
						if ($o['type'] == 'doplaty') {
							if ($o['math'] == 'add') {
								$f[] = $pln;
								$f_z_pln[] = $z_pln;
								$f_z_zln[] = $z_zln;
							}
							if ($o['math'] == 'per') {
								$conv = $r_pln*($per/100);
								$f[] = $conv;
								
								$conv_z_pln = $r_zln_pln*($per/100);
								$conv_z_zln = $r_zln_zln*($per/100);
								$f_z_pln[] = $conv_z_pln;
								$f_z_zln[] = $conv_z_zln;
							}
						}
						
						if ($o['type'] == 'rabaty') {
							if ($o['math'] == 'add') {
								$f[] = "-".$pln;
								$f_z_pln[] = "-".$z_pln;
								$f_z_zln[] = "-".$z_zln;
							}
							if ($o['math'] == 'per') {
								$conv = $r_pln*($per/100);
								$f[] = "-".$conv;
								
								$conv_z_pln = $r_zln_pln*($per/100);
								$conv_z_zln = $r_zln_zln*($per/100);
								$f_z_pln[] = "-".$conv_z_pln;
								$f_z_zln[] = "-".$conv_z_zln;
							}
						}
						
						if ($o['type'] == 'no_change') {
								$f[] = 0;
								$f_z_pln[] = 0;
								$f_z_zln[] = 0;
						}
						
					}

				} 
				
			}
		}
	}
	
	$formula_pln = $count*($r_pln + array_sum($f));	
	$formula_zln_pln = $count*($r_zln_pln + array_sum($f_z_pln));
	$formula_zln_zln = $count*($r_zln_zln + array_sum($f_z_zln));
	
	$return = ['pln'=>$formula_pln,'zln_pln'=>$formula_zln_pln, 'zln_zln'=>$formula_zln_zln];
	
	echo json_encode($return);

;?>