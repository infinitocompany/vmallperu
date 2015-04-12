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
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        Cont&aacute;ctanos
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <br><br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input type="text-large" id="inputname" placeholder="Nombres" name="inputname">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input type="text-large" id="inputlname" placeholder="Apellidos" name="inputlname"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 ">                 
                            <input type="text-large" id="inputemail" placeholder="Correo" name="inputemail"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 ">               
                           <textarea id="inputmsg" placeholder="Mensaje" name="inputmsg"></textarea>  
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 "> 
                            <div class="col-xs-12 col-sm-12 col-md-12 ">
                                <img class="img-responsive box-red-gradient" src="assets/img/canvas-contact/captcha.jpg" /> 
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 "></br>
                                <input type="checkbox" id="inputpwd" placeholder="Contraseña" name="inputpwd"><a href="terminos-condiciones.php" target="_blank">Términos y condiciones</a></input>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 box-modal-social"> 
                            <h3>Síguenos</h3>
                            <div class="col-xs-12 col-sm-12 col-md-12 "> 
                                <div class="inline"><a href="<?php echo $cn->result('ConFacLnk');?>"><img class="img-responsive " src="assets/img/canvas-contact/facebook.jpg" /></a></div>  
                                <div class="inline"><a href="<?php echo $cn->result('ConTwiLnk');?>"><img class="img-responsive " src="assets/img/canvas-contact/twitter.jpg" /></a></div>  
                                <div class="inline"><a href="<?php echo $cn->result('ConGooLnk');?>"><img class="img-responsive" src="assets/img/canvas-contact/google.jpg" /></a></div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 "> 
                                <a href="#" class="btn btn-default" id="sendInformation">Enviar Solicitud</a>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer"></div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </section>