<?php
require_once "conf.php";
$search = isset($_POST['search']) ? strtolower(samu_scape($_POST['search'])) : "";
$cn->query("SELECT DatID, DatCom, ReqCouDesEs, DatGra, ReqUseDesEs, ReqUseSky, IndDesEs, IndDesEn, IndDesPt FROM sys_req_data AS cab, sys_mas_req_country AS c, sys_mas_req_user AS u, sys_mas_industry AS i WHERE cab.DatCouID=c.ReqCouID AND cab.DatOpeID=u.ReqUseID AND cab.DatIndID=i.IndID AND LOWER(CONCAT(DatCom, ' ', ReqCouDesEs, ' ', DatGra, ' ', ReqUseDesEs, ' ', IndDesEs, ' ', IndDesEn, ' ', IndDesPt)) like '%$search%' $and_user_cou ORDER BY DatID DESC");
$cnt=1;
?>
<script type="text/javascript">			
$(document).ready(function(){	
    $(".styled tr:odd").addClass("odd");
    $(".styled tr:not(.odd)").hide();
    $(".styled tr:first-child").show();
    $(".styled tr.odd").click(function(){
        $(this).next("tr").toggle();
        $(this).find(".arrow").toggleClass("up");
    });	
});
</script>
<table width="100%" class="listing">
    <thead>
        <tr>
            <th width="30">N&deg;</th>
            <th width="200">Nombre(s)</th>
            <th>Correo Electr&oacute;nico</th>
            <th width="120">Fecha Registro</th>
            <th width="40">Estado</th>
            <th width="40">Editar</th>
            <th width="40">Eliminar</th>
        </tr>
    </thead>
    <tbody>
    <?php while($row = $cn->fetch()){ ?>
        <tr>
            <td class="center"><?php echo $cnt;$cnt=$cnt+1; ?></td>
            <td><?php echo mp_unscape($row['names']); ?></td>			
            <td><a href="./?mod=51&amp;id=<?php echo $row['id']; ?>"><?php echo mp_unscape($row['email']); ?></a></td>
            <td><?php echo mp_unscape($row['create']); ?></td>
            <td class="center"><a href="#" id="<?php echo $row['id']; ?>" class="button status<?php if($row['status'] == 0) echo " status_inactive"; ?>" title="<?php echo $row['status'] == 0 ? "Activo" : "Inactivo"; ?>" value="<?php echo $row['status']; ?>"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['id']; ?>" class="button update" title="Editar"></a></td>
            <td class="center"><a href="#" id="<?php echo $row['id']; ?>" class="button delete" title="Eliminar"></a></td>
        </tr>
        <tr>
            <td colspan="8">
                <div class="detail">
                    <div class="diez cab">HSMID</div>
                    <div class="quince cab"><?php echo $arr_textos[$_COOKIE['LANG']][55];?></div>
                    <div class="quince cab"><?php echo $arr_textos[$_COOKIE['LANG']][58];?></div>
                    <div class="quince cab"><?php echo $arr_textos[$_COOKIE['LANG']][56];?></div>
                    <div class="quince cab"><?php echo $arr_textos[$_COOKIE['LANG']][57];?></div>
                    <div class="quince cab"><?php 
                        if($_COOKIE['LANG']=='Es') echo $arr_textos[$_COOKIE['LANG']][38].' HSM'; 
                        else echo 'HSM '.$arr_textos[$_COOKIE['LANG']][38];
                    ?></div>
                    <div class="quince cab"><?php 
                        if($_COOKIE['LANG']=='Es') echo $arr_textos[$_COOKIE['LANG']][16].' HSM'; 
                        else echo 'HSM '.$arr_textos[$_COOKIE['LANG']][16];
                    ?></div>
                </div>
                <div class="clear"></div>
                <?php //Function detalle;?>
            </td>
        </tr>          
        <?php } ?>
        <?php if($cn->numrows() == 0) echo '<tr><td colspan="8" class="row_error">'.$arr_textos[$_COOKIE['LANG']][115].'.</td></tr>'; ?>
    </tbody>
</table>