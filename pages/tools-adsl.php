
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
                <a href="">ADSL/HDSL</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Tools
    <small>ADSL/HDSL</small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-green-sharp">
                <i class="icon-share font-green-sharp"></i>
                <span class="caption-subject bold uppercase"> Verifica Copertura</span>
            </div>
        </div>
        <div class="portlet-body">
             <div class="row">
                <form action ="" target="_self" method="GET">
                    <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                    <input type="hidden" name="submit">
                    <div class="col-md-2 col-md-offset-2">
                        <div class="form-group form-md-line-input">
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="prefisso" placeholder="Prefisso">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group form-md-line-input">
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="numero" placeholder="Numero">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1"></label>
                            <div class="col-md-10">
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="adsl" name="adsl" class="md-radiobtn" checked="">
                                        <label for="adsl">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> ADSL </label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="hdsl" name="hdsl" class="md-radiobtn" >
                                        <label for="hdsl">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> HDSL </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        
                        <br>
                        <input type="submit" id="submit" class="btn blue" value="Verifica"></input>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
                    <?php 
                    include 'lib/xmlrpc.inc';
                    
                    if (isset($_GET['submit'])) {
                        
                        $prefisso = $_GET['prefisso'];
                        $numero = $_GET['numero'];
                        $adsl = $_GET['adsl'];
                        $hdsl = $_GET['hdsl'];
                        if ($adsl = 'on') { $tecnology = 'adsl'; }
                        if ($hdsl = 'on') { $tecnology = 'hdsl'; }
                        
                        $xmlrpc_client = new xmlrpc_client('http://api.ehiweb.it/EPPA/ADSL/VerificaCopertura.py');
                        # parametri obbligatori (vedi paragrafo 3)
                        $parametri = array(
                         'prefisso' => $prefisso,
                         'telefono' => $numero,
                         );
                        $xmlrpc_msg = new xmlrpcmsg('verifica_copertura_estesa', array(php_xmlrpc_encode($parametri)));
                        $xmlrpc_resp = $xmlrpc_client->send($xmlrpc_msg);
                        if($xmlrpc_resp->errno != 0) {
                         # Qui si può gestire un controllo di errore
                         die(sprintf('<div class="alert alert-danger"><strong>Errore!</strong> %s',$xmlrpc_resp->errstr,'</div>'));
                        }
                        $decode = php_xmlrpc_decode($xmlrpc_resp->value());
                        # come output la struttura dati ritornata che poi si può integrare nei propri sistemi
                        //print_r($decode); 
                        
                        //var_dump($decode,json_encode($decode));
                        
                        print '<div class="portlet light bordered">';
                        print '<div class="portlet-title">';
                        print '<div class="caption font-green-sharp">';
                        print '<i class="icon-share font-green-sharp"></i>';
                        print '<span class="caption-subject bold uppercase"> Risultato per il numero ' . $_GET['prefisso'] . '-' . $_GET['numero'] . '</span>';
                        print '</div>';
                        print '</div>';
                        print '<div class="portlet-body">';
                        print '<div class="row">';
                        print '<div class="col-md-6">';
                        print '<table class="table table-hover table-condensed">';
                        print '<tbody>';
                        print '<tr>';
                        print '<td> Territorio </td>';
                        print '<td>' . $decode['territorio'] ['territorio'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Distretto </td>';
                        print '<td>' . $decode['territorio'] ['distretto'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Numero Portato </td>';
                        if (isset($decode['ngp'] ['num_portato'])) { $numPortato = $decode['ngp'] ['num_portato']; } else { $numPortato = 'Telecom Italia'; }
                        print '<td>' . $numPortato . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Arco Da </td>';
                        print '<td>' . $decode['utr'] ['arco_da'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Arco A </td>';
                        print '<td>' . $decode['utr'] ['arco_a'] . '</td>';
                        print '</tr>';
                        print '<td> Comune Sede</td>';
                        print '<td>' . $decode['utr'] ['comune_sede'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> CLLI Sede</td>';
                        print '<td>' . $decode['utr'] ['code_clli_sede'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> GAT Sede</td>';
                        print '<td>' . $decode['utr'] ['cod_gat_sede'] . '</td>';
                        print '</tr>';
                        print '</tbody>';
                        print '</table>';
                        print '</div>';
                        print '<div class="col-md-6">';
                        print '<table class="table table-hover table-condensed">';
                        print '<tbody>';
                        print '<tr>';
                        print '<td> IDDIS Sede</td>';
                        print '<td>' . $decode['utr'] ['iddis'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> IDBRE Sede</td>';
                        print '<td>' . $decode['utr'] ['cod_idbre_adc'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Tipo Locale</td>';
                        print '<td>' . $decode['utr'] ['tipo_locale'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Tipo Impianto</td>';
                        print '<td>' . $decode['utr'] ['tipo_impianto'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Sede</td>';
                        print '<td>' . $decode['utr'] ['dsc_gat_sede'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Codice Sede</td>';
                        print '<td>' . $decode['utr'] ['cod_gat_sede_sgu'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Indirizzo Sede</td>';
                        print '<td>' . $decode['utr'] ['indirizzo_sede'] . '</td>';
                        print '</tr>';
                        print '</tbody>';
                        print '</table>';
                        print '</div>';
                        print '</div>';
                        print '<div class="row">';
                        print '<div class="col-md-6">';
                        print '<table class="table table-hover table-condensed">';
                        print '<tbody>';
                        print '<tr>';
                        print '<td> Tecnologia ETH</td>';
                        print '<td>' . $decode['copertura'] ['eth'] ['tecnologia'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> CLLI Feeder</td>';
                        print '<td>' . $decode['copertura'] ['eth'] ['clli_feeder'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Descrizione Feeder</td>';
                        print '<td>' . $decode['copertura'] ['eth'] ['descrizione_feeder'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> IDBRE Sede</td>';
                        print '<td>' . $decode['copertura'] ['eth'] ['idbre_sede'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Cod ISTAT Comune</td>';
                        print '<td>' . $decode['copertura'] ['eth'] ['comune_cod_istat'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Nome Sede DSLAM</td>';
                        print '<td>' . $decode['copertura'] ['eth'] ['nome_sede_dslam'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Supporto VLAN Speciali</td>';
                        print '<td>' . $decode['copertura'] ['eth'] ['supporto_vlan_speciali'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Regione DSLAM</td>';
                        print '<td>' . $decode['copertura'] ['eth'] ['regione'] . '</td>';
                        print '</tr>';
                        print '</tbody>';
                        print '</table>';
                        print '</div>';
                        print '<div class="col-md-6">';
                        print '<table class="table table-hover table-condensed">';
                        print '<tbody>';
                        print '<tr>';
                        print '<td> Tecnologia ATM</td>';
                        print '<td>' . $decode['copertura'] ['atm'] ['tecnologia'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> CLLI Feeder</td>';
                        print '<td>' . $decode['copertura'] ['atm'] ['clli_feeder'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Descrizione Feeder</td>';
                        print '<td>' . $decode['copertura'] ['atm'] ['descrizione_feeder'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> IDBRE Sede</td>';
                        print '<td>' . $decode['copertura'] ['atm'] ['idbre_sede'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Cod ISTAT Comune</td>';
                        print '<td>' . $decode['copertura'] ['atm'] ['comune_cod_istat'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Nome Sede DSLAM</td>';
                        print '<td>' . $decode['copertura'] ['atm'] ['nome_sede_dslam'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Supporto VLAN Speciali</td>';
                        print '<td>' . $decode['copertura'] ['atm'] ['supporto_vlan_speciali'] . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Regione DSLAM</td>';
                        print '<td>' . $decode['copertura'] ['atm'] ['regione'] . '</td>';
                        print '</tr>';
                        print '</tbody>';
                        print '</table>';
                        print '</div>';
                        print '</div>';
                        print '<div class="row">';
                        print '<div class="col-md-6">';
                        print '<table class="table table-hover table-condensed">';
                        print '<tbody>';
                        print '<tr>';
                        print '<td> Semaforo Giallo</td>';
                        if ($decode['copertura'] ['eth'] ['semaforo_giallo'] == 'f') { $semGiallo = 'NO'; } else { $semGiallo = 'SI'; }
                        print '<td>' . $semGiallo . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Stato Copertura</td>';
                        if (isset($decode['copertura'] ['eth'] ['stato'])) { $statoCop = $decode['copertura'] ['eth'] ['stato'] . ' in ETH'; } else { $statoCop = $decode['copertura'] ['atm'] ['stato'] . ' in ATM'; } 
                        print '<td>' . $statoCop . '</td>';
                        print '</tr>';
                        print '<tr>';
                        print '<td> Banda Massima </td>';
                        if (isset($decode['copertura'] ['eth'] ['bw_max'])) { $bandaMax = $decode['copertura'] ['eth'] ['bw_max']; } else { $bandaMax = $decode['copertura'] ['atm'] ['bw_max']; } 
                        print '<td>' . $bandaMax . '</td>';
                        print '</tr>';
                        print '</div>';
                        print '</div>';
                        print '</div>';
                        //print '</div>';
                        //print '</div>';
                        /*
                        
                    
                        $host="api.ehiweb.it/EPPA/ADSL/VerificaCopertura.py";
                        $port="80";
                        $request="verifica_copertura_estesa['" . $prefisso . "','" . $numero . "','" . $tecnology . "]";
                        function do_call($host, $port, $request) {
                  
                            $url = "http://$host:$port/";
                            $header[] = "Content-type: text/xml";
                            $header[] = "Content-length: ".strlen($request);
                            
                            $ch = curl_init();   
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
                            
                            $data = curl_exec($ch);       
                            if (curl_errno($ch)) {
                                print curl_error($ch);
                            } else {
                                curl_close($ch);
                                return $data;
                            }
                        }
                        
                        $request = xmlrpc_encode_request('add', array(3, 4));
                        $response = do_call($host, $port, $request);
                        
                        var_dump ($response);
                        */
                    }
                
                ?>
                </div>
            </div>
        </div>
    </div>
</div>