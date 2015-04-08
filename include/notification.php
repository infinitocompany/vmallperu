<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <section>
    <!-- Modal -->
        <div class="modal fade" id="notification">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        Recibir Notificaciones - <span class="modal-title"></span>
                    </div>
                    <div class="modal-body">
                        <br><br>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 no-padding">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="padding-top:10px;">Del</label>
                                    <div class="col-sm-10">
                                        <input type="input" id="notification_star" class="datepicker form-control" name="day"  placeholder="Seleccione fecha" autocomplete="off" readonly >
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 no-padding">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="padding-top:10px;">Al</label>
                                    <div class="col-sm-10">
                                        <input type="input" id="notification_end" class="datepicker form-control" name="day"  placeholder="Seleccione fecha" autocomplete="off" readonly >
                                    </div>
                                </div>
                            </div>
                            <ul style="padding: 40px 0 0 15px;">
                                <li style="margin-top:10px;"><input type="checkbox" id="notification_item" />  Este Producto</li>
                                <li><input type="checkbox" id="notification_store" />  Esta Tienda</li>
                                <li><input type="checkbox" id="notification_type" />  Este Tipo de Ofertas</li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="JavaScript:void(0);" class="btn btn-default" id="save_notification">
                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Guardar Preferencia
                        </a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    <!-- /.modal -->
    </section>