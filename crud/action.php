<?php
session_start();
require_once "../conf.php";
include '../class/Functions.php';
$action = mp_scape($_POST['action']);
$date = time();
switch($action){
    case 1:
        $name = mp_scape($_POST['rname']);
        $lastname = mp_scape($_POST['rlname']);
        $user = mp_scape($_POST['ruser']);
        $password = md5(mp_scape($_POST['rpass']));
        if($cn->query("INSERT INTO vmall_users(name, lastname, user, password, date) VALUES('$name', '$lastname', '$user', '$password', '$date')")){
           echo '0'; 
        }else{
           echo '1'; 
        }
        break;
    case 2:
    	$idUser="";
    	if(!isset($_POST['username']) and !isset($_POST['password'])){
    		echo 'error--1';
    		return;
    	}
    	else
    	{
    		$idUser=$cn->getField("select id from vmall_users where user='".$cn->scape($_POST['username'])."' and password='".md5($cn->scape($_POST['password']))."'");
    	}
        if($idUser== "")
        {
        	echo "error--2";
        }
        else
        {
        	
            $_SESSION['vmall_session'] = true;
            $_SESSION['vmall_iduser'] = $idUser;
            $id = session_id();
            $cn->query("UPDATE vmall_users SET sessionid = '$id' WHERE user = '".$cn->scape($_POST['username'])."'");
            $_SESSION['vmall_name']=$cn->getField("SELECT CONCAT(name,' ',lastname) FROM vmall_users WHERE user = '".$cn->scape($_POST['username'])."'");
            echo "msg--Bienvenid@ ".$_SESSION['vmall_name'];
        }
        break;
    case 3:
        unset($_SESSION['vmall_session']);
        session_destroy();
        echo 'Hasta la proxima.';
        break;
    case 4:
        if (rpHash($_POST['defaultReal']) == $_POST['defaultRealHash']) {echo 'true';}else{echo 'false';}
        break;
    case 5:
		//echo "insert into vmall_notifications (NotDatBeg,NotDatEnd,NotTip,UseId,GalId) values('".$_POST['datBeg']."','".$_POST['datEnd']."','".$_POST['notTyp']."','".$_POST['userId']."','".$_POST['galId']."');";
    	if($cn->query("insert into vmall_notifications (NotDatBeg,NotDatEnd,NotTip,UseId,GalId) values('".$_POST['datBeg']."','".$_POST['datEnd']."','".$_POST['notTyp']."','".$_POST['userId']."','".$_POST['galId']."');")){
    		echo 'true';
    	}else{
    		echo 'false';
    	}
        break;
     case 6:
     	$notifications=$cn->getField("select count(*) as numNot from (
											select ig.GalID
												from itech_gallery ig
													inner join itech_gallery_subcategory igs on ig.GalID=igs.GalID
												where ig.GalSta='1'
													and DATE_FORMAT(now(), '%Y-%m-%d')<=ig.GalDatEnd
													and ig.GalId in	(
																		select DISTINCT vn.GalId
																			from vmall_notifications vn
																			where vn.UseId='".$_SESSION['vmall_iduser']."' and DATE_FORMAT(now(), '%Y-%m-%d')  between vn.NotDatBeg and vn.NotDatEnd 
																					and vn.NotTip='1'
																	)
											union 
											select ig.GalID 
												from itech_gallery ig
													inner join itech_gallery_subcategory igs on ig.GalID=igs.GalID
												where ig.GalSta='1'
													and DATE_FORMAT(now(), '%Y-%m-%d')<=ig.GalDatEnd
													and ig.TypID in	(
														select distinct ig.TypId
															from vmall_notifications vn 
																inner join itech_gallery as ig on ig.GalId=vn.GalId
															where vn.UseId='".$_SESSION['vmall_iduser']."' and DATE_FORMAT(now(), '%Y-%m-%d')  between vn.NotDatBeg and vn.NotDatEnd 
																and vn.NotTip='2'
																
																	)
											union 
											select ig.GalID
												from itech_gallery ig
													inner join itech_gallery_subcategory igs on ig.GalID=igs.GalID
												where ig.GalSta='1'
													and DATE_FORMAT(now(), '%Y-%m-%d')<=ig.GalDatEnd
													and igs.SubCatID in	(
																			select distinct SubCatID 
																			from vmall_notifications vn 
																				inner join itech_gallery_subcategory igs on igs.GalID=vn.GalId
																			where vn.UseId='".$_SESSION['vmall_iduser']."' and DATE_FORMAT(now(), '%Y-%m-%d')  between vn.NotDatBeg and vn.NotDatEnd 
																				and vn.NotTip='3'
																				)
											                                    ) as uno
											where GalID not in (select GalID from notifications_gallery where UseId='".$_SESSION['vmall_iduser']."')");
     		echo $notifications;
        	break;
        	case 7:
        		if($cn->query("insert into itech_favorite(GalId,UserId) values('".$_POST['prodId']."','".$_POST['userId']."');")){
        			echo 'true';
        		}else{
        			echo 'false';
        		}
        		break;
        		case 8:
        			echo "update itech_favorite set StaFav='0' where GalId='".$_POST['prodId']."' and UserId='".$_SESSION['vmall_iduser']."'";
        			
        			if($cn->query("update itech_favorite set StaFav='0' where GalId='".$_POST['prodId']."' and UserId='".$_SESSION['vmall_iduser']."';")){
        				echo 'true';
        			}else{
        				echo 'false';
        			}
        			
        			break;
        			case 9:
        				$favorites=$cn->getField("SELECT count(*) as numfav FROM (select DISTINCT itg.GalID,itg.GalTit,itg.GalDatSta,itg.GalDatEnd,itt.TypNam
							 from itech_favorite itf
								inner join itech_gallery itg on itf.GalId=itg.GalID
							    inner join itech_type itt on itg.TypID=itt.TypID
							where 
								UserId='".$_SESSION['vmall_iduser']."' 
							    and StaFav='1'
								and itg.GalID in (select distinct GalId from itech_favorite where UserId='".$_SESSION['vmall_iduser']."' )
							
							) AS t");
        				echo $favorites;
        			break;
        			case 10:
        				$cadres="";
        				$cadres.= '
        					<tr>
        					<th style="width: 30%">Oferta</th>
        					<th style="width: 10%">Fecha publicaci&oacute;n</th>
        					<th style="width: 10%">Vigencia</th>
        					<th style="width: 30%">Ofertante</th>
        					<th style="width: 20%">Opciones</th>
        					</tr>';
        				if(isset($_SESSION['vmall_iduser']))
        				{
        					$cadres.= '<input type="text" id="editUser" value="'.$_SESSION['vmall_iduser'].'" class="hide"/>';
        				}
        				else
        				{
        					$cadres.= '<input type="text" id="editUser" value="" class="hide"/>';
        				}
        				$cn->query("select DISTINCT itg.GalID,itg.GalTit,itg.GalDatSta,itg.GalDatEnd,itt.TypNam
			 								from itech_favorite itf
												inner join itech_gallery itg on itf.GalId=itg.GalID
			    								inner join itech_type itt on itg.TypID=itt.TypID
											where
												UserId='".$_SESSION['vmall_iduser']."'
    											and StaFav='1'
												and itg.GalID in (select distinct GalId from itech_favorite where UserId='".$_SESSION['vmall_iduser']."' )");
        															
							while($row = $cn->fetch()){
        						$cadres.= '<tr>
            							<td>'.$row['GalTit'].'</td>
	            						<td>'.$row['GalDatSta'].'</td>
				            			<td>'.$row['GalDatEnd'].'</td>
	            						<td>'.$row['TypNam'].'</td>
										<td >
											<a href="index.php?page=mostrarproducto&notificacion=true&producto='.$row['GalID'].'">Ver mas</a> <a href="#" value="'.$row['GalID'].'" id="remove_favorite" > <span  style="font-size:x-large;color:#ff9c00;" class="icon-star"></span></a>
										</td>
            							</tr>';
        					}
        					echo $cadres;
        				break;
}
?>