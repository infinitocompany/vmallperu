<?php require_once "conf.php";
$cn->query("SELECT ConLog, ConSlo, ConFavIco, ConMas, ConFacLnk, ConTwiLnk, ConGooLnk, ConLinLnk, ConSky, ConYou, ConVim FROM itech_configuration");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <section>
    <!-- Modal -->
        <div class="modal fade" id="detail">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <span class="modal-title"></span>
                    </div>
                    <div class="modal-body">
                        <br>
                            <input type="text" id="editID" value="" class="hide"/>
                            <input type="text" id="editUser" value="" class="hide"/>
                            <input type="text" id="facelin" value="" class="hide"/>
                        <br>
                        <div class="modal-image" style="float:left;margin-right:10px;"></div>
                        <div class="modal-description" style="float:rigth;"></div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-toolbar" role="toolbar">
                            <div class="btn-group">
                                <a  href="JavaScript:void(0);" class="btn btn-default" id="send_facebook" target="_blank">
                                    <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Me gusta
                                </a>
                                <a href="JavaScript:void(0);" class="btn btn-default" id="send_notification">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Notificarme ofertas
                                </a>
                                <a href="JavaScript:void(0);" class="btn btn-default" id="send_favorite">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Marcar como favorito
                                </a>
                            </div>
                            <div class="btn-group" style="float:right;">
                                <a href="JavaScript:void(0);" class="btn btn-default" id="send_information">
                                    <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Solicitar
                                </a>
                            </div>
                        </div>                        
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal fade" id="message">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <span class="modal-title"></span>
                    </div>
                    <div class="modal-body">
                        <br><br>
                        <span class="modal-message"></span>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <a href="JavaScript:void(0);" class="btn btn-info" id="modal_register"><span class="glyphicon glyphicon-edit" aria-hidden="true"/> Registrar</a>
                        <a href="JavaScript:void(0);" class="btn btn-default" id="ok"><span class="glyphicon glyphicon-ok" aria-hidden="true"/> Aceptar</a>                        
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </section>