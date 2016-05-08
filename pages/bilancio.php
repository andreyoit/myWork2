<link href="assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
<div class="page-content" style="min-height:1318px">
    <!-- BEGIN PAGE HEADER-->

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">Bilancio</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Bilancio
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="col-md-6">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Questo Anno</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="morris_chart_1" style="height: 500px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);;"></div>
                <script>
                    new Morris.Line({
                      // ID of the element in which to draw the chart.
                      element: 'morris_chart_1',
                      // Chart data records -- each entry in this array corresponds to a point on
                      // the chart.
                      data: [
                        { mese: '2016-01', entrate: 0, uscite: 0 },
                        { mese: '2016-02', entrate: 100, uscite: 140 },
                        { mese: '2016-03', entrate: 50, uscite: 150 },
                        { mese: '2016-04', entrate: 50, uscite: 200 },
                        { mese: '2016-05', entrate: 200, uscite: 160 }
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
    </div>
    <div class="col-md-6">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Questo Mese</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="morris_chart_2" style="height: 500px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);;"></div>
                <script>
                    new Morris.Line({
                      // ID of the element in which to draw the chart.
                      element: 'morris_chart_2',
                      // Chart data records -- each entry in this array corresponds to a point on
                      // the chart.
                      data: [
                        { mese: '2016-04-01', entrate: 5, uscite: 0 },
                        { mese: '2016-04-02', entrate: 10, uscite: 14 },
                        { mese: '2016-04-03', entrate: 43, uscite: 10 },
                        { mese: '2016-04-04', entrate: 50, uscite: 20 },
                        { mese: '2016-04-05', entrate: 38, uscite: 6 }
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
    </div>
</div>
<script src="assets/pages/scripts/charts-morris.min.js" type="text/javascript"></script>