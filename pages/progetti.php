<link href="assets/apps/css/todo-2.min.css" rel="stylesheet" type="text/css">
<div class="page-content" style="min-height:1176px">
    
    <style>
        .form-control {
    border: none;
    border-bottom: #2ab4c0 solid 1px;
}
    </style>
    <!-- BEGIN PAGE HEADER-->
    <?php 
    setlocale(LC_TIME, "it_IT");
    error_reporting(0);
    
    if (isset($_GET['pj'])) {$getProjectID = $_GET['pj'];} else {  } ;
    $getProject = $DB_CON ->query("SELECT * FROM progetti");
    $getProjectData = $DB_CON -> query ('SELECT * FROM progetti WHERE id =' . $getProjectID);
    $getTags = $DB_CON ->query("SELECT * FROM tag_progetti");
    $getListTags = $DB_CON->prepare("SELECT * FROM tag_progetti");
    $getListTags ->execute();
    $getListTags -> fetch();
    $getProjectTask = $DB_CON->query("SELECT * FROM task_progetti WHERE progetto = " . $_GET['pj'] . " ORDER BY data DESC");
    
    $getTask = $DB_CON->prepare("SELECT * FROM task_progetti WHERE id = " . $_GET['task'] ." AND progetto = ". $_GET['pj'] );
    $getTask -> execute();
    $fillTask = $getTask ->fetch();
        
    if (isset($_GET['submit'])) {
        db_insert_3('progetti','progetto','tipo','cliente',$_GET['progetto'],$_GET['tipo'],$_GET['cliente']);
        if (null !== $executed) { 
            print '<script>window.location.reload();</script>';
            $executed = TRUE;
        }
    }    
    if (isset($_GET['submittask'])) {
        db_insert_5('task_progetti','progetto','task','priority','description','data',$_GET['pj'],$_GET['task'],$_GET['priority'],$_GET['description'],$_GET['data']);
        if (null !== $executed) { 
            print '<script>window.location.reload();</script>';
            $executed = TRUE;
        }
    }
    if (isset($_GET['delete'])) {
        db_delete_1('progetti',$_GET['delete']);
        if (null !== $executed) { 
            print '<script>window.location.reload();</script>';
            $executed = TRUE;
        }

    }
    ?>
<div class="modal fade modal fade draggable-modal ui-draggable in" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-basic">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Nuovo Progetto</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="GET" action="">
                    
                    <div class="form">
                        <input type="hidden" name="page" value="<?php print $_GET['page']; ?>"/>
                        <input type="hidden" name="submit"/>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" id="nomeProdotto" name="progetto" value="" required>
                            <label for="nomeProdotto">Nome Progetto</label>
                            <span class="help-block">Inserire nome progetto</span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" id="catProdotto" name="tipo" value="" required>
                            <label for="catProdotto">Tipo Progetto</label>
                            <span class="help-block">Inserire tipo progetto</span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" id="prezzoProdotto" name="cliente" value="" required>
                            <label for="prezzoProdotto">Cliente</label></label>
                            <span class="help-block">Inserire nome cliente</span>
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
<div class="modal fade draggable" id="deletepj" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Elimina Progetto</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="GET" action="">
                    <div class="form">
                        <p>Eliminare Progetto definitivamente?</p>
                        <div class="md-checkbox">
                            <input type="checkbox" id="checkbox30" class="md-check">
                            <label for="checkbox30">
                                <span></span>
                                <span class="check"></span>
                                <span class="box"></span> Eliminare anche i task associati </label>
                        </div>
                    </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annulla</button>
                    <a href="?page=progetti&delete=<?php print $_GET['delpj']; ?>" class="btn red">Elimina</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN TODO SIDEBAR -->
            <div class="todo-ui">
                <div class="todo-sidebar">
                    
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption" data-toggle="collapse " data-target=".todo-project-list-content">
                                    
                                    <span class="caption-subject font-green-sharp bold uppercase">Progetti </span>
                                    <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">clicca per espandere</span>
                                </div>
                                <div class="actions">
                                        <div class="actions">
                                            <a class="btn btn-circle green btn-outline btn-sm tooltips" style="width:26px" data-container="body" data-placement="top" data-original-title="Aggiungi Progetto"  data-toggle="modal" href="#add" title="">
                                                <i class="fa fa-plus" style="margin-left:-3px"></i>
                                            </a>
                                            <a style="width:26px" class="btn btn-circle <?php if($_GET['showall'] == true) { print 'green'; } else { print 'grey-salsa'; } ?> btn-outline btn-sm tooltips" data-container="body" data-placement="top" data-original-title="Visualizza Completati" href="<?php if ($_GET['showall'] == true) { print '?page=progetti' . $setShowAll . ''; }  else { print '?page=progetti' . $setShowAll . '&showall=true'; } ?>">
                                                <i class="fa fa-check" style="margin-left:-3px"></i> 
                                            </a>
                                            
                                        </div>
                                    </div>
                            </div>
                            <div class="portlet-body todo-project-list-content" style="height: auto;">
                                <div class="todo-project-list">
                                    <ul class="nav nav-stacked">
                                        
                                        <?php 
                                            if (isset($_GET['showall'])) { $setShowAll = '&showall=true'; } else { }
                                            
                                            foreach ($getProject as $project) {
                                                if($_GET['pj'] == $project[0]) { $isSelected = 'selected active'; } else { $isSelected = ''; }
                                                print '<li id="selpro" class="'  . $isSelected  . '">'; ?>
                                                <span id="delicon" onclick='location="?page=progetti&delpj=<?php print $project[0];?>#deletepj"' data-toggle="modal"><i class="icon-close" style="cursor:hand ;left: -20px;margin-top: 10px;z-index: 1;position: absolute;color: #C12121;"></i></span>
                                        <?php   print '<a href="?page=progetti' . $setShowAll . '&pj=' . $project[0] . '">';
                                                print '<span class="badge badge-success">' . countTask($project[0]) . ' </span>' . $project[1] . '</a>';
                                                print '</li>';
                                            }
                                        
                                        ?>
                                        
                                    </ul>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content-priority">
                                    <span class="caption-subject font-blue bold uppercase">Priorità </span>
                                    <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">clicca per espandere</span>
                                </div>
                            </div>
                            <div class="portlet-body todo-project-list-content-priority" style="height: auto;">
                                <div class="todo-project-list">
                                    <ul class="nav nav-stacked">
                                        
                                        <?php 
                                            $getPriority = array (
                                                    0 => 'Urgente',
                                                    1 => 'Importante',
                                                    2 => 'Normale',
                                                    3 => 'Inferiore',
                                                    4 => 'Bassa',
                                                    5 => 'Nessuna'
                                                    );
                                            
                                            foreach ($getPriority as $priority) {
                                                print '<li>';
                                                print '<a href="?page=progetti' . $setShowAll . '&pj=' . $priority[0] . '">';
                                                print '<span class="badge badge-success">' . countTag($project[0]) . ' </span>' . $priority . '</a>';
                                                print '</li>';
                                            }
                                        
                                        ?>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content-tags">
                                    <span class="caption-subject font-red bold uppercase">Stato </span>
                                    <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">clicca per espndere</span>
                                </div>
                            </div>
                            <div class="portlet-body todo-project-list-content todo-project-list-content-tags" style="height: auto;">
                                <div class="todo-project-list">
                                    <ul class="nav nav-pills nav-stacked">
                                        <?php 
                                            
                                            
                                            foreach ($getTags as $tag) {
                                                print '<li>';
                                                print '<a href="#">';
                                                print '<span class="badge badge-success">' . countTag($tag[0]) . ' </span>' . $tag[1] . '</a>';
                                                print '</li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <!-- END TODO SIDEBAR -->
                <!-- BEGIN TODO CONTENT -->
                <div class="todo-content">
                    <div class="portlet light ">
                        <!-- PROJECT HEAD -->
                        <?php 
                            
                            //if (isset($projectData)) {
                            foreach ($getProjectData as $projectData) {
                                // code...
                            
                        ?>
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bar-chart font-green-sharp hide"></i>
                                <span class="caption-helper"><?php echo $projectData[4]; ?></span> &nbsp;
                                <span class="caption-subject font-green-sharp bold uppercase"><?php  echo $projectData[1];  ?></span>
                            </div>
                            <?php }//} //chiusura ciclo foreach ?> 
                        </div>
                        <!-- end PROJECT HEAD -->
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-5 col-sm-4">
                                    <div class="todo-tasklist">
                                        <!--<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 90%;">
                                            <div class="scroller" style="height: 90%; overflow: hidden; width: auto;" data-initialized="1">-->
                                            <div class="scroller" style="height:80%" data-rail-visible="1" data-rail-color="grey" data-handle-color="#a1b2bd">
                                                <?php 
                                                    setlocale(LC_ALL, "it_IT.UTF-8");
                                                    //Return sorted as Project
                                                    if (isset($_GET['pj'])) {
                                                        foreach ($getProjectTask as $projectTask) {
                                                            if ($_GET['task'] == $projectTask[0]) { $selectionBackground = 'background-color:#F0FFF0;'; } else { $selectionBackground = ''; }
                                                            print '<a href="?page=' . $_GET['page'] . $setShowAll . '&pj='. $getProjectID .'&task=' . $projectTask[0] .'" style="text-decoration:none">';
                                                            print '<div class="todo-tasklist-item todo-tasklist-item-border-green" style="' . $selectionBackground . '">';
                                                            //print '<img class="todo-userpic pull-left" src="../assets/pages/media/users/avatar4.jpg" width="27px" height="27px">';
                                                            print '<div class="todo-tasklist-item-title">' . $projectTask[2] . '</div>';
                                                            print '<div class="todo-tasklist-item-text">' . $projectTask[4] .'</div>';
                                                            print '<div class="todo-tasklist-controls pull-left">';
                                                            print '<span class="todo-tasklist-date">';
                                                            print '<i class="fa fa-calendar"></i> '. ucwords(strftime("%a %d %B %Y", strtotime($projectTask[5]))) .' </span>';
                                                            print '<span class="todo-tasklist-badge badge badge-primary badge-roundless">'.convertTag($projectTask[6]) . $returnTag .'</span>';
                                                            print '&nbsp;';
                                                            print '<span class="todo-tasklist-badge badge badge-roundless">'.convertPriority($projectTask[3]) . $returnPriority .'</span>';
                                                            print '</div>';
                                                            print '</div>';
                                                            print '</a>';
                                                            print '<br>';
                                                        }
                                                    }
                                                   
                                                ?>
                                                </div>
                                            <!--</div>-->
                                        
                                    </div>
                                </div>
                                <div class="todo-tasklist-devider"> </div>
                               <div class="col-md-7 col-sm-8">
                                     <?php if (isset($_GET['pj'])) { ?>
                                     <form method="GET" action="" class="form-horizontal">
                                        <!-- TASK HEAD -->
                                         <div class="form">
                                            <div class="form-group">
                                                <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                                                 <input type="hidden" name="pj" value="<?php echo $_GET['pj']; ?>">
                                                 <input type="hidden" name="task" value="<?php echo $_GET['task']; ?>">
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="caption-subject font-green-sharp bold uppercase">
                                                        <?php if(isset($_GET['task'])) { echo 'Modifica Task'; } else { echo 'Aggiungi Task'; } ?>
                                                        <!--<img class="todo-userpic pull-left" src="../assets/global/img/user_header_32.png" width="50px" height="50px">
                                                        <span class="todo-username pull-left">Andrea Emili</span>-->
                                                        <!--<button type="button" class="todo-username-btn btn btn-circle btn-default btn-sm">&nbsp;&nbsp;</button>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                   <!-- <div class="todo-taskbody-date pull-right">
                                                        <button type="button" class="todo-username-btn btn btn-circle btn-default btn-sm">&nbsp; Complete &nbsp;</button>
                                                    </div>-->
                                                </div>
                                            </div>
                                            <!-- END TASK HEAD -->
                                            <!-- TASK TITLE -->
                                            
                                             <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control todo-taskbody-tasktitle" name="task" value="<?php if(isset($_GET['task'])) { echo $fillTask[2]; } else { echo 'Titolo Task...'; }?>"> 
                                                </div>
                                            </div>
                                            <!-- TASK DESC -->
                                             <div class="form-group">
                                                <div class="col-md-12">
                                                    <textarea class="form-control todo-taskbody-taskdesc" rows="8" name="description" placeholder=""><?php if(isset($_GET['task'])) { echo $fillTask[4]; } else { echo 'Descrizione Task...'; }?></textarea>
                                                </div>
                                            </div>
                                            <!-- END TASK DESC -->
                                            <!-- TASK DUE DATE -->
                                             <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="input-icon">
                                                        <i class="fa fa-calendar"></i>
                                                        <input type="text" class="form-control todo-taskbody-due" name="data" value="<?php if(isset($_GET['task'])) { echo $fillTask[5]; } else { echo 'Data...'; }?>"> </div>
                                                </div>
                                            </div>
                                            <!-- TASK TAGS -->
                                             <div class="form-group">
                                                <div class="col-md-12">
                                                    <select class="form-control" name="stato" tabindex="-1" aria-hidden="true">
                                                        <option value="default" <?php if(isset($_GET['task'])) {} else { echo 'selected="selected"'; }?> >-- Seleziona Stato --</option>
                                                        <option value="1" <?php if ($fillTask[6] == '1') { print 'selected="selected"'; } ?>>In Attesa</option>
                                                        <option value="2" <?php if ($fillTask[6] == '2') { print 'selected="selected"'; } ?>>Completato</option>
                                                        <option value="3" <?php if ($fillTask[6] == '3') { print 'selected="selected"'; } ?>>In Corso</option>
                                                        <option value="4" <?php if ($fillTask[6] == '4') { print 'selected="selected"'; } ?>>Chiuso</option>
                                                        <option value="5" <?php if ($fillTask[6] == '5') { print 'selected="selected"'; } ?>>Completato</option>
                                                    </select><!--<span class="select2 select2-container select2-container--bootstrap" dir="ltr" style="width: 638px;"><span class="selection"><span class="select2-selection" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-n4y8-container"><span class="select2-selection__rendered" id="select2-n4y8-container" title="Pending"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true">--></span></span>
                                                </div>
                                            </div>
                                            <!-- TASK TAGS -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <select class="form-control" name="piority" tabindex="-1" aria-hidden="true">
                                                        <option value="default" <?php if(isset($_GET['task'])) {} else { echo 'selected="selected"'; }?> >-- Seleziona Priorità --</option>
                                                        <option value="1" <?php if ($fillTask[3] == '1') { print 'selected="selected"'; } ?>>Urgente</option>
                                                        <option value="2" <?php if ($fillTask[3] == '2') { print 'selected="selected"'; } ?>>Importante</option>
                                                        <option value="3" <?php if ($fillTask[3] == '3') { print 'selected="selected"'; } ?>>Normale</option>
                                                        <option value="4" <?php if ($fillTask[3] == '4') { print 'selected="selected"'; } ?>>Inferiore</option>
                                                        <option value="5" <?php if ($fillTask[3] == '5') { print 'selected="selected"'; } ?>>Bassa</option>
                                                        <option value="6" <?php if ($fillTask[3] == '6') { print 'selected="selected"'; } ?>>Nessuna</option>
                                                    </select><!--<span class="select2 select2-container select2-container--bootstrap" dir="ltr" style="width: 638px;"><span class="selection"><span class="select2-selection" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-n4y8-container"><span class="select2-selection__rendered" id="select2-n4y8-container" title="Pending"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true">--></span></span>
                                                </div>
                                            </div>
                                             <div class="form-actions right todo-form-actions">
                                                 
                                                <input class="btn btn-circle btn-sm green" name="submittask" id="submittask" type="submit" value="<?php if(isset($_GET['task'])) { echo 'Salva'; } else { echo 'Aggiungi'; } ?>"></input>
                                                <input type="reset" class="btn btn-circle btn-sm btn-default" value="Cancella"></input>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END TODO CONTENT -->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.it.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="assets/apps/scripts/todo-2.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 

<script>
    $('#deletepj').on('shown.bs.modal', function () {
            $('deletepj').focus()
        })
    $(document).ready(function() {

            if(window.location.href.indexOf('#deletepj') != -1) {
            $('#deletepj').modal('show');
        }
    });
    $(document).ready(function(){
        $("#selpro").hover(
          function(){$(this).siblings("delicon").show();},
          function(){$(this).siblings("delicon").hide();}
        );
    });
</script>