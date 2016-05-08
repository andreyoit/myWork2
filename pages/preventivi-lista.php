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
                <a href="#">Preventivi</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="">Lista</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Preventivi
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
                        <span class="caption-subject font-green sbold uppercase">Clienti</span>
                    </div>-->
                    <div class="actions">
                        
                        <div class="dt-buttons">
                           <div class="dt-buttons">
                               <a class="dt-button btn-circle buttons-print btn green btn-outline" tabindex="0" aria-controls="sample_1"><span><i class="icon-plus"></i> Aggiungi</span></a>
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
                <div class="portlet-body">
                    <div class="table-container">
                        <table class="table table-striped table-hover" id="sample_3">
                            <thead>
                                <tr>
                                    <th> <i class=""></i> Numero </th>
                                    <th> <i class=""></i> Cliente </th>
                                    <th> <i class=""></i> Data </th>
                                    <th> <i class=""></i> Importo </th>
                                    <th> <i class=""></i> Stato </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $preventivi = $DB_CON->query("SELECT * FROM  `preventivi` ");

                                foreach ($preventivi as $preventivo) {
                                     
                                setlocale(LC_TIME, "it_IT.utf8");
                                $dataPreventivo = ucwords(strftime("%d %B %Y", strtotime($preventivo[2])));
                                    print '<tr>';
                                    print '<td> <a href="?page=preventivi-vedi&id='. $preventivo[0] .'">' . $preventivo[1] . '</a></td>';
                                    print '<td> <a href="?page=clienti-scheda&id=' . $preventivo[3] . '">'. convertCliente($preventivo[3]) .' </a></td>';
                                    print '<td> '. $dataPreventivo .'</td>';
                                    print '<td> ' . $preventivo[4] . ' €</td>';
                                    print '<td><span style="margin-top:-3px;position:absolute;padding:6px " class="label ' . colorizeStatoPreventivi($preventivo[5]) .'"> ' . statoPreventivi($preventivo[5]) . '</span></td>';
                                    print '</tr>';
                                }
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

<!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->