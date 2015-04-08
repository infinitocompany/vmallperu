<?php
require_once "../conf.php";
switch($do){
	case 2: 
		$name = mp_scape($_POST['name']);
		$file = mp_scape($_POST['file_guid']);
		$thumbnail = mp_scape($_POST['thumbnail_guid']);
		$detail = mp_scape($_POST['detail']);
		$content = mp_scape($_POST['content']);
		$date = time();
		$cn->query("INSERT INTO mp_news(name, file, thumbnail, detail, content, date) VALUES('$name', '$file', '$thumbnail', '$detail', '$content', '$date')");
		break;
	case 3: 
		$cn->query("UPDATE mp_news SET status = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE id = '".$_POST['id']."'");
		break;
	case 4: 
		$cn->query("DELETE FROM mp_news WHERE id = '".$_POST['id']."'");
		break;
	case 5: 
		$name = mp_scape($_POST['name']);
		$file = mp_scape($_POST['file_guid']);
		$thumbnail = mp_scape($_POST['thumbnail_guid']);
		$detail = mp_scape($_POST['detail']);
		$content = mp_scape($_POST['content']);
		$cn->query("UPDATE mp_news SET name = '$name', file = '$file', thumbnail = '$thumbnail', detail = '$detail', content = '$content' WHERE id = '".$_POST['id']."'");
		break;
}
?>