<!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
<div class="page-content">
<!-- BEGIN PAGE HEADER-->

<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>leads</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <i class="fa fa-angle-down"></i>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Leads
    <small>Lista</small>
</h3>



<div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable" style="margin-top:-70px;background-color:transparent">
                <div class="portlet-title">
                    <!--<div class="caption">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">leads</span>
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
                                    <th> <i class="fa fa-briefcase"></i> Nome Lead </th>
                                    <th> <i class="fa fa-user"></i> Contatto </th>
                                    <th> <i class="fa fa-phone"></i> Telefono </th>
                                    <th class="hidden-xs"> <i class="fa fa-envelope"></i> E-mail </th>
                                    <th class="hidden-sm hidden-xs"> <i class="fa fa-map-marker"></i> Indirizzo </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $DB_CON->beginTransaction();
                                $leads = $DB_CON->query("SELECT * FROM  `leads` ");
                                
                                foreach ($leads as $lead) {
                                    print '<tr>';
                                    print '<td> <a href="?page=leads-scheda&id='. $lead[0] .'">' . $lead[1] . '</a></td>';
                                    print '<td> <a href="#">'. $lead[2] .' </a></td>';
                                    print '<td> <a href="tel:'. $lead[8] .'"> '. $lead[8] .'</a></td>';
                                    print '<td class="hidden-xs"> <a href="mailto:' . $lead[7] . '"> ' . $lead[7] . '</a></td>';
                                    print '<td class="hidden-sm hidden-xs"> ' . $lead[3] . ' - ' . $lead[4] . ' ' . $lead[5] . '</td>';
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

<!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->