    <script src="assets/pages/scripts/ui-confirmations.min.js" type="text/javascript"></script>
    <link href="assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css">
<div class="modal fade" id="addProdotto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-basic draggable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Aggiungi Prodotto</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="GET" action="">
                    <?php 
                    if (isset($_GET['submit'])) {
                        db_insert_4('prodotti','ID','prodotto','categoria','prezzo',NULL,$_GET['prodotto'],$_GET['categoria'],$_GET['prezzo']);
                    }
                    if (isset($_GET['delete'])) {
                        db_delete_1('prodotti',$_GET['delete']);
                        
                        $success = '<div class="alert alert-success"><strong>Successo!</strong> L\'elemento è stato eliminato. </div>';
                        ?>
                        <script>
                            Command: toastr[success]("L'elemento è stato eliminato.", "Successo")

                            toastr.options = {
                              "closeButton": true,
                              "debug": false,
                              "positionClass": "toast-top-full-width",
                              "showDuration": "1000",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
                        </script>
                        <?php
                    }
                    ?>
                    <div class="form">
                        <input type="hidden" name="page" value="<?php print $_GET['page']; ?>"/>
                        <input type="hidden" name="submit"/>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" id="nomeProdotto" name="prodotto" value="" required>
                            <label for="nomeProdotto">Nome Prodotto</label>
                            <span class="help-block">Inserire nome prodotto</span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" id="catProdotto" name="categoria" value="" required>
                            <label for="catProdotto">Categoria Prodotto</label>
                            <span class="help-block">Inserire categoria prodotto</span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" id="prezzoProdotto" name="prezzo" value="" required>
                            <label for="prezzoProdotto">Prezzo</label>
                            <span class="help-block">Inserire prezzo prodotto senza simbolo valuta</span>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annulla</button>
                <input type="submit" id="submit" name="submit" class="btn green" value="Aggiungi"></input>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="editProdotto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-basic draggable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modifica Prodotto</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="GET" action="">
                    <?php 
                    if (isset($_GET['id'])) {
                        $prodValue = db_fetch_where_id('prodotti',$_GET['id']);
                    }
                    if (isset($_GET['submitedit'])) {
                        db_edit_4('prodotti','ID','prodotto','categoria','prezzo',$_GET['id'],$_GET['prodotto'],$_GET['categoria'],$_GET['prezzo']);
                    }
                    ?>
                    <div class="form">
                        <input type="hidden" name="page" value="<?php print $_GET['page']; ?>"/>
                        <input type="hidden" name="id" value="<?php print $_GET['id']; ?>"/>
                        <input type="hidden" name="submitedit"/>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" id="nomeProdotto" name="prodotto" value="<?php echo $prodValue['prodotto']; ?>" required>
                            <label for="nomeProdotto">Nome Prodotto</label>
                            <span class="help-block">Inserire nome prodotto</span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" id="catProdotto" name="categoria" value="<?php echo $prodValue['categoria']; ?>" required>
                            <label for="catProdotto">Categoria Prodotto</label>
                            <span class="help-block">Inserire categoria prodotto</span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" id="prezzoProdotto" name="prezzo" value="<?php echo $prodValue['prezzo']; ?>" required>
                            <label for="prezzoProdotto">Prezzo</label>
                            <span class="help-block">Inserire prezzo prodotto senza simbolo valuta</span>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annulla</button>
                <input type="submit" id="submitedit" name="submitedit" class="btn green" value="Modifica"></input>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
                <a href="#">Prodotti</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="">Lista</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Prodotti
    <small>Lista</small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
         <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable" style="margin-top:-70px;background-color:transparent">
                <div class="portlet-title">
                    <!--<div class="caption">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">prodotti</span>
                    </div>-->
                    <div class="actions">
                        
                        <div class="dt-buttons">
                           <div class="dt-buttons">
                               <a class="dt-button btn-circle buttons-print btn green btn-outline" data-toggle="modal" href="#addProdotto" tabindex="0" aria-controls="sample_1"><span><i class="icon-plus"></i> Aggiungi</span></a>
                               <a class="dt-button btn-circle buttons-print btn blue btn-outline" tabindex="0" aria-controls="sample_1"><span><i class="icon-printer"></i> Stampa</span></a>
                               
                               <a class="dt-button btn red buttons-print btn-outline btn-circle" href="javascript:;" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-share"></i>
                                <span class="hidden-xs"> Esporta </span>
                                <i class="fa fa-angle-down"></i>
                               </a>
                               <ul class="dropdown-menu pull-right" id="sample_3_tools">
                                
                                <li>
                                    <a href="javascript:;" data-action="2" class="tool-action">
                                        <i class="icon-doc"></i> PDF</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="3" class="tool-action">
                                        <i class="icon-doc"></i> Excel</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="4" class="tool-action">
                                        <i class="icon-doc"></i> CSV</a>
                                </li>
                            </ul>
                           </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($success)) { print $success; } ?>
                <div class="portlet-body">
                    <div class="table-container">
                        <table class="table table-striped table-hover" id="sample_3">
                            <thead>
                                <tr>
                                    <th class="col-xs-1 text-center"> ID </th>
                                    <th class="col-xs-6 text-center"> Nome Prodotto </th>
                                    <th class="col-xs-2 text-center"> Categoria </th>
                                    <th class="col-xs-2 text-center"> Prezzo </th>
                                    <th class="col-xs-1 text-center"> Opzioni </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $DB_CON->beginTransaction();
                                $prodotti = $DB_CON->query("SELECT * FROM  `prodotti` ORDER BY `ID`");
                                
                                foreach ($prodotti as $prodotto) {
                                    print '<tr>';
                                    print '<td class="col-xs-1">' . $prodotto[0] . '</td>';
                                    print '<td class="col-xs-6"> <a href="?page=prodotti-scheda&id='. $prodotto[0] .'">' . $prodotto[1] . '</a></td>';
                                    print '<td class="col-xs-2"> <a href="#">'. $prodotto[2] .' </a></td>';
                                    print '<td class="col-xs-2"> € ' . $prodotto[3] . ',00 </td>';
                                    print '<td class="col-xs-1"> <a href="?page='. $_GET['page'] . '&id=' . $prodotto[0] .'#editProdotto"><button type="button" class="btn blue btn-outline btn-sm"><i class="fa fa-edit" style="width:9px"></i></button></a> <button type="button" data-id="' . $prodotto[0] .'" data-toggle="confirmation" data-singleton="true" data-original-title="Eliminare ?" data-btn-ok-label="SI" data-btn-cancel-label="NO" class="delete_prod_link btn red btn-outline btn-sm"><i class="fa fa-times"> </i></button> </td>' ;
                                    print '</tr>';
                                }
                                
                                $DB_CON->commit();
                                ?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
    </div>
    </div>
    <script>
        $('#addProdotto').on('shown.bs.modal', function () {
            $('addProdotto').focus()
        })
        $(document).ready(function() {

            if(window.location.href.indexOf('#editProdotto') != -1) {
            $('#editProdotto').modal('show');
        }

});
    </script>
    <script src="assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/ui-confirmations.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
    </div>
</div>