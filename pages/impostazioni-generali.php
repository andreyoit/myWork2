<?php
    $getConfig = file('core/config.php');
    
    $getAziendaData = $DB_CON ->query("SELECT * FROM impostazioni");
    $getAziendaData -> execute();
    $aziendaData = $getAziendaData -> fetch();
?>
<link href="assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css">
<script src="assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>
    <!-- BEGIN PAGE HEADER-->
 <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Impostazioni</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="">Generali</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Impostazioni
        <small>Generali</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-sm-6">
                <div class="portlet light portlet-fit bordered" >
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-puzzle font-red-flamingo"></i>
                        <span class="caption-subject bold font-red-flamingo uppercase"> Sistema </span>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php 
                    $replace = array('$DB_HOST' , '$DB_USER' , '$DB_PASS' , '$DB_NAME' , '"' , ';', '=' , ' '); ?>
                    <div class="alert alert-danger">
                        <span class="label label-danger">Attenzione:</span> La modifica di questi dati potrebbe rendere inutilizzabile il database</small>
                    </div>
                    <form role="form" action="" method="get">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print str_replace($replace,"",$getConfig[4]); ?>">
                                <label for="form_control_1">Database Host</label>
                                
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print str_replace($replace,"",$getConfig[5]); ?>">
                                <label for="form_control_1">Database User</label>
                                
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print str_replace($replace,"",$getConfig[6]); ?>">
                                <label for="form_control_1">Database Pass</label>
                                
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print str_replace($replace,"",$getConfig[7]); ?>">
                                <label for="form_control_1">Database Name</label>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <div class="col-sm-6">
                <div class="portlet light portlet-fit bordered" >
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-puzzle font-red-flamingo"></i>
                        <span class="caption-subject bold font-red-flamingo uppercase"> Azienda </span>
                    </div>
                </div>
                <div class="portlet-body">
                    <form role="form" action="" method="get">
                        <div class="form-body">
                            <script>var Dropzone = require("dropzone");</script>
                            <form action="/file-upload" class="dropzone" id="logo-dropzone"></form>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $aziendaData[1]; ?>">
                                <label for="form_control_1">Nome Azienda</label>
                                
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $aziendaData[2]; ?>">
                                <label for="form_control_1">P.IVA / Codice Fiscale</label>
                               
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $aziendaData[3]; ?>">
                                <label for="form_control_1">Indirizzo</label>
                               
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $aziendaData[4]; ?>">
                                <label for="form_control_1">CAP</label>
                               
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $aziendaData[5]; ?>">
                                <label for="form_control_1">Città</label>
                               
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $aziendaData[6]; ?>">
                                <label for="form_control_1">Provincia</label>
                               
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $aziendaData[7]; ?>">
                                <label for="form_control_1">Telefono</label>
                               
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $aziendaData[8]; ?>">
                                <label for="form_control_1">E-Mail</label>
                               
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $aziendaData[9]; ?>">
                                <label for="form_control_1">Sito Web</label>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
