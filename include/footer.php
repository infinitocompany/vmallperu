<?php require_once "conf.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <footer>
        <div class="canvas-footer center-text">
            <a data-toggle="modal" data-target="#myModal">Contáctanos</a>
            <?php $cn->query("SELECT WebPagID, WebPagNam, WebPagLnk FROM itech_web_page WHERE WebPagSta='1'");
            while($row = $cn->fetch()){
                echo '<a href="'.mp_unscape($row['WebPagLnk']).'.php">'.mp_unscape($row['WebPagNam']).'</a>';
            }?>
        </div>
    </footer>

