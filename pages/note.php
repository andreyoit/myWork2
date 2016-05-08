<link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css">
<link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css">
<link href="assets/apps/css/todo.min.css" rel="stylesheet" type="text/css">
    <!-- BEGIN PAGE HEADER-->
    <style>
        
    </style>
    
 <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar" style="">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="">Note</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title" style=""> Note
    <small></small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    
    <div class="" style=";">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <!-- END THEME PANEL -->
        <!-- END PAGE HEADER-->
       
        <div class="todo-container">
            <div class="row">
                <div class="col-md-5">
                    <ul class="todo-projects-container">
                        <li class="todo-padding-b-0">
                            <div class="todo-head">
                                <button class="btn btn-square btn-sm green todo-bold" data-toggle="modal" href="#add-note-modal">Aggiungi Nota</button>
                                <h3>Note</h3>
                               <?php 
                               $getNoteList = $DB_CON -> prepare("SELECT * FROM note");
                               $getNoteList -> execute();
                               $fillNoteList = $getNoteList -> fetchAll();
                               $getNoteText = $DB_CON -> prepare("SELECT * FROM note WHERE id= " . $_GET['id']);
                               $getNoteText -> execute();
                               $fillNoteText = $getNoteText -> fetch();
                               ?>
                            </div>
                        </li>
                        
                            <?php 
                            
                                foreach ($fillNoteList as $noteList) {
                                    if($noteList[0] == $_GET['id']) { $selected = "background-color:F0FFF0"; }
                                    print '<a href="?page=note&id=' . $noteList[0] . '" style="text-decoration:none">';
                                    print '<li class="todo-projects-item" style="padding:30 20 10 20;' . $selected . '">';
                                    print '<h3>' . $noteList[1] . '</h3>';
                                    print '<p>' . $noteList[2] . '</p>';
                                    print '</li>';
                                    print '</a>';
                                }
                            
                            ?>
                            
                        
                        <div class="todo-projects-divider"></div>
                        
                    </ul>
                </div>
                <div class="col-md-7">
                    <?php if (isset($_GET['id'])) { ?><div class="todo-tasks-container">
                        <div class="todo-head">
                            <button class="btn btn-square btn-sm red todo-bold" >Elimina</button>
                            &nbsp;&nbsp;	
                            <button class="btn btn-square btn-sm green todo-bold" >Salva</button>
                            
                            <h3>
                                <span class="todo-grey">Nota:</span> <?php if (isset($_GET['id'])) { print $fillNoteText[1]; } ?></h3>
                           
                        </div>
                        <ul class="todo-tasks-content">
                            <textarea style="margin-top:20px;width:100%;height:65%; border:none"><?php if (isset($_GET['id'])) { print $fillNoteText[2]; } ?></textarea>
                        </ul>
                    </div><?php } ?>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="add-note-modal" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Aggiungi Nota</h4>
                    </div>
                    <div class="modal-body"> 
                        <form id="aggiungiNota">
                            <div class="form">
                            <div class="form-body">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" id="form_control_1">
                                    <label for="form_control_1">Titolo Nota</label>
                                    <span class="help-block">Inserisci il titolo della nota</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <textarea class="form-control" rows="3"></textarea>
                                    <label for="form_control_1">Testo Nota</label>
                                </div>
                            </div>
                        </div>
                        </form>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Chiudi</button>
                        <button type="button" class="btn green">Aggiungi</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
<script src="assets/apps/scripts/todo.min.js" type="text/javascript"></script>