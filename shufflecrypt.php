<?php
/**********************************************************
     _            __  __ _                            _   
 ___| |__  _   _ / _|/ _| | ___  ___ _ __ _   _ _ __ | |_ 
/ __| '_ \| | | | |_| |_| |/ _ \/ __| '__| | | | '_ \| __|
\__ \ | | | |_| |  _|  _| |  __/ (__| |  | |_| | |_) | |_ 
|___/_| |_|\__,_|_| |_| |_|\___|\___|_|   \__, | .__/ \__|
  create encrypted passwords by shuffling |___/|_|i3network

  version  0.1.20130429102701
**********************************************************/

function shufflecrypt($action,$string="",$key_hash=""){
	global $_shufflecrypt;
		//debug?
			$d=($_shufflecrypt['debug'] ? 1 : 0);
	//setup.
		$_self=array('version'=>'v0.1.20130429102701');
		$key_hash=base64_decode($key_hash);
		//do not change.
			$key="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ`1234567890-=[]\;',./~!@#$%^&*()_+{}|:\"<>?";
		//END: do not change.
	if($d){
		echo "--\n".strlen($key_hash)."]".$key_hash."\n[".strlen($key)."]".$key."\n--";
	}
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
