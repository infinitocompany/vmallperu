<?php

function tbl_blog($do = "theme-list", $param = ""){
	$cn = Connection::getInstance();
	if($do == "theme-detail"){
		$cn->query("SELECT name, file, detail, content, date FROM blog WHERE id = '$param' and status = '1'");
		return $cn->fetch();
	}elseif($do == "theme-featured"){
		$cn->query("SELECT id, name, file, detail FROM blog WHERE status = '1' ORDER BY id DESC LIMIT 1");
		return $cn->fetch();
	}elseif($do == "theme-list"){
		$result = array();
		$pagination = array("start" => 1, "display" => 10);
		if($param != "") $pagination = array_merge($pagination, $param);
		$cn->query("SELECT id, name, file, thumbnail, detail, date FROM blog WHERE status = '1' ORDER BY id DESC LIMIT ".$pagination['start'].", ".$pagination['display']);
		while($row = $cn->fetch()) $result[] = $row;
		return $result;
	}
}

function tbl_comment($blog){
	$cn = Connection::getInstance();
	$result = array();
	$cn->query("SELECT nickname, content, date FROM comment WHERE blog_id = '$blog' and status = '1' ORDER BY id");
	while($row = $cn->fetch()) $result[] = $row;
	return $result;
}

function mp_cut($text, $length = 100){
	return strlen($text) > $length ? substr(strip_tags($text), 0, $length)."..." : strip_tags($text);
}

function mp_cutFilename($text, $length = 40){
	return strlen($text) > $length ? substr(strip_tags($text), 0, round(strlen($text) / 2))." ..... .".end(explode(".", $text)) : strip_tags($text);
}

function mp_strstr2($text, $search){
	return substr($text, 0, strpos($text, $search));
}

function mp_parseFile($file, $download = false){
	$file = substr(strstr($file, "_"), 1);
	return $download ? friendly($file) : str_replace("_", " ", $file);
}

function mp_parseTime($time){
	if($time == 0) return "N/A";
	return date("d F Y H:i A", $time);
}

function mp_parseDate($date){
	if($date == "0000-00-00 00:00:00") return "N/A";
	list($date, $time) = explode(" ", $date);
	list($year, $month, $day) = explode("-", $date);
	list($hour, $minute, $second) = explode(":", $time);
	return "$month/$day/$year ".str_pad(($hour > 12 ? $hour - 12 : $hour), 2, 0, STR_PAD_LEFT).":$minute ".($hour > 12 ? "PM" : "AM");
}

function mp_formatSize($size){
	$sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
	return $size == 0 ? "n/a" : (round($size / pow(1024, ($i = floor(log($size, 1024)))), $i > 1 ? 2 : 0).$sizes[$i]);
}

function mp_friendly($url){
	$url = htmlentities($url, ENT_IGNORE, "UTF-8");
	$url = html_entity_decode($url);
	$url = strtolower($url);
	$search = array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�');
	$replace = array('a', 'a', 'a', 'a', 'e', 'e', 'e', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'c', 'n');
	$url = str_replace($search, $replace, $url);
	$url = strtolower($url);
	$url = str_replace(array(' ', '&', '\r', '\n', '+', '_'), '-', $url);
	return preg_replace(array('/[^a-z0-9\-\.]/', '/[\-]+/'), array('', '-'), $url);
}

function mp_domain($email){
	return substr($email, strpos($email, "@") + 1, strlen($email));
}

function mp_scape($text){
	if(!get_magic_quotes_gpc()) $text = addslashes($text);
	return trim($text);
}

function mp_unscape($text){
	return htmlspecialchars($text);
}

$states = array("AL"=>"Alabama", "AK"=>"Alaska", "AZ"=>"Arizona", "AR"=>"Arkansas", "CA"=>"California", "CO"=>"Colorado", "CT"=>"Connecticut", "DE"=>"Delaware", "DC"=>"District of Columbia", "FL"=>"Florida", "GA"=>"Georgia", "HI"=>"Hawaii", "ID"=>"Idaho", "IL"=>"Illinois", "IN"=>"Indiana", "IA"=>"Iowa", "KS"=>"Kansas", "KY"=>"Kentucky", "LA"=>"Louisiana", "ME"=>"Maine", "MD"=>"Maryland", "MA"=>"Massachusetts", "MI"=>"Michigan", "MN"=>"Minnesota", "MS"=>"Mississippi", "MO"=>"Missouri", "MT"=>"Montana", "NE"=>"Nebraska", "NV"=>"Nevada", "NH"=>"New Hampshire", "NJ"=>"New Jersey", "NM"=>"New Mexico", "NY"=>"New York", "NC"=>"North Carolina", "ND"=>"North Dakota", "OH"=>"Ohio", "OK"=>"Oklahoma", "OR"=>"Oregon", "PA"=>"Pennsylvania", "RI"=>"Rhode Island", "SC"=>"South Carolina", "SD"=>"South Dakota", "TN"=>"Tennessee", "TX"=>"Texas", "UT"=>"Utah", "VT"=>"Vermont", "VA"=>"Virginia", "WA"=>"Washington", "WV"=>"West Virginia", "WI"=>"Wisconsin", "WY"=>"Wyoming");

function rpHash($value) {
    $hash = 5381;
    $value = strtoupper($value);
    for($i = 0; $i < strlen($value); $i++) {
            $hash = (($hash << 5) + $hash) + ord(substr($value, $i));
    }
    return $hash;
}

?>