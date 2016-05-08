
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
                    <a href="#">Tools</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="">Domini</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Tools
        <small>Domini</small>
        </h3>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="icon-share font-green-sharp"></i>
                            <span class="caption-subject bold uppercase"> Whois Dominio</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                         <div class="row">
                            <form action ="" target="_self" method="GET">
                                <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                                <input type="hidden" name="submit">
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input">
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="dominio" placeholder="Dominio">
                                            <div class="form-control-focus"> </div>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" id="submit" class="btn blue" value="Verifica"></input>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        if (isset($_GET['submit'])) {
            $domain     = $_GET['dominio'];
            $apikey     = "8a3118e123c75c78da46c98bbc31292c";
            $request    = "http://api.whoapi.com/?apikey=$apikey&r=whois&domain=$domain";
            $requestImg = "http://api.whoapi.com/?apikey=$apikey&r=screenshot&domain=$domain";
            $outputImg  = json_decode(file_get_contents($requestImg), true);
            $output     = json_decode(file_get_contents($request), true); 
            
            if ($output{'status_desc'} == 'Query high usage limit exceeded.') { print '<div class="alert alert-danger"><strong>Errore!</strong> Limite massimo query raggiunto, riprova più tardi.</div>'; }
            if (isset($output)) {
                print '<div class="col-md-12">';
                print '<div class="portlet light bordered">';
                print '<div class="portlet-title">';
                print '<div class="caption font-green-sharp">';
                print '<i class="icon-share font-green-sharp"></i>';
                print '<span class="caption-subject bold uppercase"> Risultato di ' . $_GET['dominio'] .'</span>';
                print '</div>';
                print '</div>';
                print '<div class="portlet-body">';
                //print_r ($outputImg);
                print '<div class="col-md-6">';
                print 'Registrato: <span class="pull-right">' . $output['registered'] . '</span>';
                print '<br>';
                print '</div>';
                print '<div class="col-md-6">';
                print '<img style="max-width:300px" src="' . $outputImg['full_size'] . '" />';
                print '</div>';
                print '</div>';
                print '</div>';
                print '</div>';
            } else {
                print '<div class="alert alert-danger"><strong>Errore!</strong> Qualcosa è andato storto, controlla i dati inseriti</div>';
            }
        }
            ?>
    </div>
</div>

