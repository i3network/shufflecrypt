<?php
//shuffle v0.1
// creates a secured password with a reverse salt key.

function shufflecrypt($action,$string="",$key_hash=""){
  global $_shufflecrypt;
	$_self=array('version'=>'v0.1.20130429');
	//debug?
		$d=($_shufflecrypt['debug'] ? 1 : 0);
	//string decode part 1:
		$key_hash=base64_decode($key_hash);
//do not change.
$key=<<<KEY
abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ`1234567890-=[]\;',./~!@#$%^&*()_+{}|:"<>?
KEY;
	if($d){
		echo "------\n";
		echo "[".strlen($key_hash)."]".$key_hash."\n";
		echo "[".strlen($key)."]".$key."\n";
		echo "------";
	}
//END: do not chante.
	if($action=="ver" || $action=="version"){
		$o=$_self['version'];
	}else if($action=="decrypt" || $action=="unshuffle"){
		//de-shuffle.
		$string=base64_decode($string);
		$len=strlen($string);
		if($d){echo "LEN:".$len."\n";}
		
		for($i=0; $i < $len; $i++){
			$pos=strpos($key_hash,$string[$i]);
			if($d){echo $i."[POS: ".$pos.", CHAR:".$string[$i].", REPLACE:".$key[$pos]."]\n";}
			$o.=$key[$pos];
		}
	}else if($action=="generatehash"){
		$o=str_shuffle($key);
		$o=base64_encode($o);
	}else{
		//shuffle.
		$len=strlen($string);
		if($d){echo "LEN:".$len."\n";}
		
		for($i=0; $i < $len; $i++){
			$pos=strpos($key,$string[$i]);
			if($d){echo $i."[POS: ".$pos.", CHAR:".$string[$i].", REPLACE:".$key_hash[$pos]."]\n";}
			$o.=$key_hash[$pos];
		}
		$o=base64_encode($o);
	}
	return $o;
}
/*example...*/
/*
$hash=shufflecrypt("generatehash");
$encrypted=shufflecrypt("encrypt","helloworld",$hash);
echo "ENCD: ".$encrypted."\n";
echo "DECR: ".shufflecrypt("decrypt",$encrypted,$hash);
*/
?>
