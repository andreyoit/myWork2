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
                    <a href="?page=preventivi-lista">Preventivi</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="">Vedi</a>
                </li>
            </ul>
        </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"><a class="btn btn-circle btn-icon-only btn-default" href="javascript:history.back();">
            <i class="glyphicon glyphicon-chevron-left"></i>
        </a> Preventivi
    <small>Vedi</small>
    </h3>

    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    
    <div class="row">
        <div class="col-sm-12" style="margin:0 auto">
            <iframe src="uploads/preventivi/<?php echo $_GET['id']; ?>.pdf" width="100%" height="100%" style="margin:0 auto"></iframe>
        </div>
    </div>
    
    </div>
</div>