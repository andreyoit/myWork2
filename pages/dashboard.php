<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
<style>
    .portlet-body .scroller a {
        text-decoration:none;
    }
    .portlet-body .scroller span {
        float: right;
        margin-top: 1px!important;
    }
    .portlet-body .scroller li {
        list-style:none;
        padding:10 5 10 5;
    }
    .portlet-body .scroller li:hover {
        background-color:#EEE;
        
    }
</style>

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Dashboard</span>
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
    <h3 class="page-title"> Dashboard
        <small><?php $today= date("Y-m-d");
setlocale(LC_TIME, "it_IT.utf8");
echo ucwords(strftime("%A %d %B %Y", strtotime($today))); ?></small>
    </h3>
<div class="row">

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="index.html#">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="2">0</span> </div>
                <div class="desc"> Clienti </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="index.html#">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="2">0</span>
                </div>
                <div class="desc"> Progetti </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="0">0</span>
                </div>
                <div class="desc"> Fatture </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="4">4</span></div>
                <div class="desc"> Preventivi </div>
            </div>
        </a>
    </div>
</div>
<div class="clearfix"></div>
    <div class="row ui-sortable" id="sortable_portlets">
        <div class="col-md-4 column sortable">
            <div class="portlet portlet-sortable light bordered">
                <div class="portlet-title ui-sortable-handle">
                    <div class="caption font-green-sharp">
                        <i class="icon-list font-green-sharp"></i>
                        <span class="caption-subject bold uppercase"> Progetti</span>
                        <span class="caption-helper"></span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="scroller" style="height:200px" data-rail-visible="1" data-rail-color="green" data-handle-color="#a1b2bd">
                        <?php 
                            $getProject = $DB_CON ->query("SELECT * FROM progetti");
                            
                            foreach ($getProject as $project) {
                                print '<li>';
                                print '<a href="?page=progetti&pj=' . $project[0] . '" style="font-size: 14px!important;padding: 8px 10px;">';
                                print '<span class="badge badge-success">Vedi' . $projectCount . ' </span>' . $project[1] . '</a>';
                                print '</li>';
                            }
                        
                        ?>
                    </div>
                </div>
            </div>
            <div class="portlet portlet-sortable-empty"> </div>
        </div>
        <div class="col-md-4 column sortable">
            <div class="portlet portlet-sortable light bordered">
                <div class="portlet-title ui-sortable-handle">
                    <div class="caption font-green-sharp">
                        <i class="icon-layers font-green-sharp"></i>
                        <span class="caption-subject bold uppercase"> Bilancio</span>
                        <span class="caption-helper"></span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="morris_chart_1" style="height: 200px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);;"></div>
                <script>
                    new Morris.Line({
                      // ID of the element in which to draw the chart.
                      element: 'morris_chart_1',
                      // Chart data records -- each entry in this array corresponds to a point on
                      // the chart.
                      data: [
                        { mese: '2016-01', entrate: 0, uscite: 0 },
                        { mese: '2016-02', entrate: 0, uscite: 0 },
                        { mese: '2016-03', entrate: 0, uscite: 0 },
                        { mese: '2016-04', entrate: 0, uscite: 0 },
                        { mese: '2016-05', entrate: 0, uscite: 0 },
                        { mese: '2016-06', entrate: 0, uscite: 0 },
                        { mese: '2016-07', entrate: 0, uscite: 0 },
                        { mese: '2016-08', entrate: 0, uscite: 0 },
                        { mese: '2016-09', entrate: 0, uscite: 0 },
                        { mese: '2016-10', entrate: 0, uscite: 0 },
                        { mese: '2016-11', entrate: 0, uscite: 0 },
                        { mese: '2016-12', entrate: 0, uscite: 0 }
                      ],
                      // The name of the data record attribute that contains x-values.
                      xkey: 'mese',
                      // A list of names of data record attributes that contain y-values.
                      ykeys: ['entrate','uscite'],
                      // Labels for the ykeys -- will be displayed when you hover over the
                      // chart.
                      labels: ['Entrate','Uscite'],
                      pointSize: 6,
                      hideHover: 'true',
                      resize: true,
                      smooth: true,
                      lineColors: ['green', 'red'],
                      postUnits: ' €'
                    });
                    
                </script>
                </div>
            </div>
            <div class="portlet portlet-sortable-empty"> </div>
        </div>
        <div class="col-md-4 column sortable">
            <div class="portlet portlet-sortable-empty"> </div>
        </div>

    </div>
</div>
<script src="assets/pages/scripts/portlet-draggable.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>