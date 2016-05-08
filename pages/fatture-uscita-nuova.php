<?php 
    $getCliente = $DB_CON ->query('SELECT * FROM clienti');
    $getCliente -> execute();
    $clienti = $getCliente -> fetchAll();
    $getProdotto = $DB_CON -> query('SELECT * FROM prodotti');
    $getProdotto -> execute();
    $prodotti = $getProdotto -> fetchAll();
?>
<style>
    .print {
        background: url('assets/global/img/portlet-print-icon.png');
        width: 16px;
        margin-top: -7px;
    }
    hr {
        border: 1px solid #26C281!important;
    }
</style>
<link href="assets/global/plugins/select2/css/select2.css" rel="stylesheet" type="text/css">
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
                <a href="#">Fattura</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="">Nuova</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Fattura
    <small>Nuova</small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-5">
            <div class="portlet light bg-inverse">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-check font-green"></i>
                        <span class="caption-subject bold font-green uppercase"> Dati</span>
                    </div>
                </div>
                <div class="tools">
                    <a class="print"></a>
                </div>
                <div class="portlet-body">
                    <form id="invoiceform" action="" method="GET">
                        <div class="form-group">
                            
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
                            <script>
                            $(document).ready(function() {
                              $("#cliente").select2();
                            });
                            $(document).ready(function() {
                              $(".prodotto").select2();
                            });
                            </script>
                            <label for="cliente" class="control-label">Cliente</label>
                            <select id="cliente" class="select2 form-control" tabindex="-1" aria-hidden="true">
                                <option value="default">-- Seleziona Cliente --</option>
                                <?php
                                    foreach ($clienti as $cliente) {
                                        print '<option value="' . $cliente[0] . '">' . $cliente[1] . '</option>';
                                    }
                                ?>
                            </select>
                            <hr>
                            <center><span class="capitalize">Prodotti</span><br><br></center>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="quantita">Quantità</label>
                                        <input name="quantita" type="text" class="form-control" id="form_control_1" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Prodotto</label>
                                        <select name="prodotto" class="form-control select2 prodotto" tabindex="-1" aria-hidden="true">
                                            <option value="default">-- Seleziona Prodotto --</option>
                                            <?php
                                                foreach ($prodotti as $prodotto) {
                                                    print '<option value="' . $prodotto[0] . '">' . $prodotto[1] . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="sconto">Sconto</label>
                                        <div class="input-group">
                                            <input name="sconto" type="text" class="form-control" id="form_control_1" value="">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <a href=""><h3 class="glyphicon glyphicon-remove-sign font-red font-large" style="margin-top:32px"></h3></a>
                                </div>
                            </div>
                                <div class="row">
                                    <center><h2><a id="addProdotto" class="glyphicon glyphicon-plus-sign font-large font-green-jungle"  style="text-decoration:none"></a></h2></center>
                                </div>
                                
                                <script>
                                    addProdotto.onclick=function() {
                                        document.body.insertAdjacentHTML( 'beforeEnd', '<div class="row"><div class="col-sm-2"><div class="form-group"><label for="quantita">Quantità</label><input name="quantita" type="text" class="form-control" id="form_control_1" value=""></div></div><div class="col-sm-7"><div class="form-group"><label>Prodotto</label><select name="prodotto" class="form-control select2" tabindex="-1" aria-hidden="true"> <option value="default">-- Seleziona Prodotto --</option></select></div></div><div class="col-sm-3"><div class="form-group"><label for="sconto">Sconto</label><div class="input-group"><input name="sconto" type="text" class="form-control" id="form_control_1" value=""><span class="input-group-addon">%</span></div></div></div></div>' );
                                    };
                                </script>

                                <hr>
                                <center><span class="capitalize">Pagamento</span><br><br></center>
                                

                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="portlet light bg-inverse" >
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-puzzle font-red-flamingo"></i>
                        <span class="caption-subject bold font-red-flamingo uppercase"> Anteprima </span>
                    </div>
                    <div class="tools">
                        <a id="print" onclick="print();" class="print" data-original-title="Stampa" title=""></a>
                        <a id="reload" href="onclick(reload);" class="reload" data-original-title="Aggiorna Anteprima" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body" style="margin-bottom:-120px">
                    <?php if (isset($cliente)) ?>
                    <iframe id="invoice" src="core/invoice/1.php" style="width: 21cm;height: 29.7cm;border:none;margin: 0 auto;margin-top:-130px;overflow-x:visible;overflow-y:hidden;-webkit-transform:scale(0.75);-moz-transform-scale(0.75);"></iframe>

                </div>
            </div>
        </div>
    </div>
    <script>
    
    reload.onclick=function(){
        document.getElementById('invoice').contentWindow.location.reload(true);
    };
    print.onclick=function(){
        $("#invoice").get(0).contentWindow.print();
    }
    $('#invoiceform').change(function(){
        document.getElementById('invoice').contentWindow.location.reload(true);
        document.getElementById('invoice').src = "core/invoice/1.php?cliente=" + custom_seed;
        if ($cliente) {
            document.getElementById('invoice').src = "core/invoice/1.php?cliente=" + custom_seed;
        }
    });
    </script>
