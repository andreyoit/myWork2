<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <?php
    $clienti = $DB_CON->query("SELECT * FROM  `clienti` WHERE ID = " . $_GET['id']);
    //$clienti -> execute();
    $cliente = $clienti -> fetch();
    $progetti = $DB_CON->query("SELECT * FROM progetti WHERE cliente = " . $_GET['id']);
    //$progetti -> execute();
    $progetto = $progetti -> fetch();
    $preventivi = $DB_CON->query("SELECT * FROM preventivi WHERE cliente = " . $_GET['id']);
    //$preventivi -> execute();
    $preventivo = $preventivi -> fetch();
    ?>
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="?page=clienti-lista">Clienti</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span><?php print $cliente[1]; ?></span>
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
    <h3 class="page-title"><?php print $cliente[1]; ?> 
        <small>Scheda Cliente</small>
    </h3>
    <div class="row">
        <div class="col-md-6">
          <div class="scroller" style="height:78%" data-rail-visible="1" data-rail-color="grey" data-handle-color="#a1b2bd">
              <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green">
                        <i class="icon-user font-green"></i>
                        <span class="caption-subject bold uppercase"> Anagrafica Cliente</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form">
                        <div class="form-body">
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $cliente[1]; ?>">
                                <label for="form_control_1">Azienda</label>
                            </div>
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $cliente[6]; ?>">
                                <label for="form_control_1">Partita IVA</label>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" id="form_control_1" value="<?php print $cliente[3]; ?>">
                                        <label for="form_control_1">Indirizzo</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" id="form_control_1" value="<?php print $cliente[4]; ?>">
                                        <label for="form_control_1">CAP</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" id="form_control_1" value="<?php print $cliente[5]; ?>">
                                        <label for="form_control_1">Città</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $cliente[2]; ?>">
                                <label for="form_control_1">Contatto Primario</label>
                            </div>
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $cliente[8]; ?>">
                                <label for="form_control_1">Numero Telefonico</label>
                            </div>
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control" id="form_control_1" value="<?php print $cliente[7]; ?>">
                                <label for="form_control_1">E-mail</label>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
             <!-- <div class="portlet light bordered">
                  <div class="portlet-title">
                      <div class="caption font-green">
                          <i class="icon-call-end font-green"></i>
                          <span class="caption-subject bold uppercase"> Contatto Cliente</span>
                      </div>
                  </div>
                  
              </div>-->
          </div>
        </div>
        <div class="col-md-6">
            <div class="scroller" style="height:80%" data-rail-visible="1" data-rail-color="grey" data-handle-color="#a1b2bd">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <i class="icon-briefcase font-green"></i>
                            <span class="caption-subject bold uppercase"> Lavori Cliente</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                         <div class="table-scrollable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Progetto </th>
                                        <th> Tipo </th>
                                        <th width="10%"> Stato </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($progetto[0])) { ?>
                                    <tr>
                                        <td> <?php print $progetto[0]; ?></td>
                                        <td> <a href="?page=progetti&pj=1"><?php print $progetto[1]; ?></a></td>
                                        <td> <?php print $progetto[4]; ?></td>
                                        <td style="padding-top:11px"> <span class="label label-sm <?php print colorizeStatus($progetto[6]); ?>"> <?php print convertStatus($progetto[6]); ?></span> </td>
                                    </tr>
                                     
                                </tbody>
                            </table>
                            <?php } else { print '</tbody></table><br><br><center>Nessun lavoro per questo cliente</center><br><br>'; } ?>
                        </div>
                       
                    </div>
                </div>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <i class="icon-wallet font-green"></i>
                            <span class="caption-subject bold uppercase"> Preventivi Cliente</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                       <div class="table-scrollable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Preventivo </th>
                                        <th> Importo </th>
                                        <th width="10%"> Stato </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach ($preventivi as $preventivo) {
             
                                    if (isset($preventivo[0])) { ?>
                                    <tr>
                                        <td> <?php print $preventivo[0]; ?></td>
                                        <td> <a href="?page=preventivi-vedi&id=<?php print $preventivo[0]; ?>"><?php print $preventivo[1]; ?></a></td>
                                        <td> <?php print $preventivo[4]; ?></td>
                                        <td style="padding-top:11px"> <span class="label label-sm <?php print colorizeStatoPreventivi($preventivo[5]); ?>"> <?php print statoPreventivi($preventivo[5]); ?></span> </td>
                                    </tr>
                                     
                                
                            <?php } else { print '</tbody></table><br><br><center>Nessun lavoro per questo cliente</center><br><br>';
                                }
                            } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <i class="icon-wallet font-green"></i>
                            <span class="caption-subject bold uppercase"> Fatture Cliente</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                       <div class="table-scrollable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Progetto </th>
                                        <th> Importo </th>
                                        <th> Stato </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <br>
                            <center>Nessuna fattura per questo cliente</center>
                        <br>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    
    