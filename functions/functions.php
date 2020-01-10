<?php
function getURL($serverName=0, $scriptName=0, $fileName=1, $queryString=1, $varDenied=''){
	$url	 = '';
	$slash = '/';
	if($scriptName != 0)$slash	= "";
	if($serverName != 0){
	  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    
		if(isset($_SERVER['SERVER_NAME'])){
			$url .= $protocol . $_SERVER['SERVER_NAME'];
			if(isset($_SERVER['SERVER_PORT'])) $url .= ":" . $_SERVER['SERVER_PORT'];
			$url .= $slash;
		}
	}
	if($scriptName != 0){
		if(isset($_SERVER['SCRIPT_NAME']))	$url .= substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
	}
	if($fileName	!= 0){
		if(isset($_SERVER['SCRIPT_NAME']))	$url .= substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
	}
	if($queryString!= 0){
		$url .= '?';
		reset($_GET);
		$i = 0;
		if($varDenied != ''){
			$arrVarDenied = explode('|', $varDenied);
			while(list($k, $v) = each($_GET)){
				if(array_search($k, $arrVarDenied) === false){
					$i++;
					if($i > 1) $url .= '&' . $k . '=' . @urlencode($v);
					else $url .= $k . '=' . @urlencode($v);
				}
			}
		}
		else{
			while(list($k, $v) = each($_GET)){
				$i++;
				if($i > 1) $url .= '&' . $k . '=' . @urlencode($v);
				else $url .= $k . '=' . @urlencode($v);
			}
		}
	}
	$url = str_replace('"', '&quot;', strval($url));
	return $url;
}


///lấy giá trị
function getValue($value_name, $data_type = "int", $method = "GET", $default_value = 0, $advance = 0){
	$value = $default_value;
	switch($method){
		case "GET": if(isset($_GET[$value_name])) $value = $_GET[$value_name]; break;
		case "POST": if(isset($_POST[$value_name])) $value = $_POST[$value_name]; break;
		case "COOKIE": if(isset($_COOKIE[$value_name])) $value = $_COOKIE[$value_name]; break;
		case "SESSION": if(isset($_SESSION[$value_name])) $value = $_SESSION[$value_name]; break;
		default: if(isset($_GET[$value_name])) $value = $_GET[$value_name]; break;
	}
   if($data_type == "arr" || $data_type == "array") return $value;
	$valueArray	= array("int" => intval($value), "str" => trim(strval($value)), "flo" => floatval($value), "dbl" => doubleval($value), "arr" => $value);
	foreach($valueArray as $key => $returnValue){
		if($data_type == $key){
			if($advance != 0){
				switch($advance){
					case 1:
						$returnValue = str_replaceMQ($returnValue);
						break;
					case 2:
						$returnValue = htmlspecialbo($returnValue);
						break;
				}
			}
			//Do số quá lớn nên phải kiểm tra trước khi trả về giá trị
			if((strval($returnValue) == "INF") && ($data_type != "str")) return 0;
			return $returnValue;
			break;
		}
	}
	return (intval($value));
}


function str_replaceMQ($text){
	$text	= str_replace("'", "'", $text);
	$text	= str_replace("'", "''", $text);
	$text	= str_replace("\\", "\\\\", $text); 
	return $text;
}

//////
function redirect($url){
	$url	= htmlspecialchars($url);
	echo '<script type="text/javascript">window.location.href = "' . $url . '";</script>';
	exit();
}


?>



