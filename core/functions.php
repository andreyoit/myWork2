<?php
// Funzioni globali

function countTask($projectID) {
    include 'core/config.php';
    include 'core/db.php';
    $getProjectCount = $DB_CON->prepare("SELECT * FROM task_progetti WHERE progetto = " . $projectID);
    $getProjectCount -> execute();
    $fetchProjectCount = $getProjectCount->fetchAll();
    $projectCount = count($fetchProjectCount);
    return $projectCount;
}

function countTag($tag) {
    include 'core/config.php';
    include 'core/db.php';
    $getTagCount = $DB_CON->prepare("SELECT * FROM task_progetti WHERE tag = " . $tag );
    $getTagCount -> execute();
    $fetchTagCount = $getTagCount->fetchAll();
    $tagCount = count($fetchTagCount);
    return $tagCount;
}


function convertPriority($priority) {
    switch ($priority) {
        case '1':
            $returnPriority = 'Urgente';
            break;
        case '2':
            $returnPriority = 'Importante';
            break;
        case '3':
            $returnPriority = 'Normale';
            break;
        case '4':
            $returnPriority = 'Inferiore';
            break;
        case '5':
            $returnPriority = 'Bassa';
            break;
        case '6':
            $returnPriority = 'Nessuna';
            break;
        default:
            $returnPriority = 'Nessuna';
            break;
    }
    return $returnPriority;
}
        
function convertTag($tag) {
    switch ($tag) {
        case '1':
            $returnTag = "In Attesa";
            break;
        case '2':
            $returnTag = "Completato";
            break;
        case '3':
            $returnTag = "In Corso";
            break;
        case '4':
            $returnTag = "Chiuso";
            break;
        case '5':
            $returnTag = "Consegnato";
            break;
    }
    return $returnTag;
}
function convertStatus ($status) {
    
    switch ($status) {
        case '1':
            $convertedStatus = 'In Attesa';
            break;
        case '2':
            $convertedStatus = 'Completato';
            break;
        case '3':
            $convertedStatus = 'In Corso';
            break;
        case '4':
            $convertedStatus = 'Chiuso';
            break;
        case '5':
            $convertedStatus = 'Consegnato';
            break;
        default:
            $convertedStatus = 'Sconosciuto';
            break;
    }
    return $convertedStatus;
}
    function colorizeStatus ($status) {
        
        switch ($status) {
            case '1':
                $statusColor = 'label-warning';
                break;
            case '2':
                $statusColor = 'label-success';
                break;
            case '3':
                $statusColor = 'label-info';
                break;
            case '4':
                $statusColor = 'label-danger';
                break;
            case '5':
                $statusColor = 'label-success';
                break;
            default:
                $statusColor = '';
                break;
        }
        return $statusColor;
    }
    

function colorizeProjectBadge ($status) {
    switch ($status) {
        case '1' :
            break;
        case '2' :
            break;
        case '3' :
            break;
        case '4' :
            break;
        case '5' :
            break;
    }
}

function convertCliente ($id) {
    include 'core/config.php';
    include 'core/db.php';
    $getCliente = $DB_CON -> query('SELECT * FROM clienti WHERE id = ' . $id);
    $getCliente -> execute();
    $cliente = $getCliente -> fetch();
    $resCliente = $cliente[1];
    return $resCliente;
}

function statoPreventivi ($stato) {
    switch($stato) {
        case '1' :
            $resStato = 'In Attesa';
            break;
        case '2' :
            $resStato = 'Accettato';
            break;
        case '3' :
            $resStato = 'Rifiutato';
            break;
    }
    return $resStato;
}

function colorizeStatoPreventivi ($stato) {
    switch($stato) {
        case '1' :
            $colorStato = 'label-warning';
            break;
        case '2' :
            $colorStato = 'label-success';
            break;
        case '3' :
            $colorStato = 'label-danger';
            break;
    }
    return $colorStato;
}

// DATABASE

// FETCH

function db_fetch_all($table) {
    include 'core/config.php';
    include 'core/db.php';
    $prepareFetch = $DB_CON->query("SELECT * FROM `$DB_NAME`.`$table`;");
    $fetch = $prepareFetch->fetch();
    return $fetch;
}

function db_fetch_where_id($table,$id) {
    include 'core/config.php';
    include 'core/db.php';
    $prepareFetch = $DB_CON->query("SELECT * FROM `$DB_NAME`.`$table` WHERE `ID` = $id;");
    $fetch = $prepareFetch->fetch();
    return $fetch;
}

// INSERT 

function db_insert_1($table,$where1,$val1) {
    include 'core/config.php';
    include 'core/db.php';
    $prepareInsert = $DB_CON->query("INSERT INTO `$DB_NAME` . `$table` (`$where1`) VALUES ('$val1');");
}
function db_insert_2($table,$where1,$where2,$val1,$val2) {
    include 'core/config.php';
    include 'core/db.php';
    $prepareInsert = $DB_CON->query("INSERT INTO `$DB_NAME` . `$table` (`$where1` , `$where2`) VALUES ('$val1','$val2');");
}
function db_insert_3($table,$where1,$where2,$where3,$val1,$val2,$val3) {
    include 'core/config.php';
    include 'core/db.php';
    $prepareInsert = $DB_CON->query("INSERT INTO `$DB_NAME` . `$table` (`$where1` , `$where2` , `$where3`) VALUES ('$val1','$val2','$val3');");
}
function db_insert_4($table,$where1,$where2,$where3,$where4,$val1,$val2,$val3,$val4) {
    include 'core/config.php';
    include 'core/db.php';
    $prepareInsert = $DB_CON->query("INSERT INTO `$DB_NAME` . `$table` (`$where1` , `$where2` , `$where3`,`$where4`) VALUES ('$val1','$val2','$val3','$val4');");
}
function db_insert_5($table,$where1,$where2,$where3,$where4,$where5,$val1,$val2,$val3,$val4,$val5) {
    include 'core/config.php';
    include 'core/db.php';
    $prepareInsert = $DB_CON->query("INSERT INTO `$DB_NAME` . `$table` (`$where1` , `$where2` , `$where3`,`$where4`,`$where5`) VALUES ('$val1','$val2','$val3','$val4','$val5');");
}
// DELETE

function db_delete_1($table,$id) {
    include 'core/config.php';
    include 'core/db.php';
    $prepareDelete = $DB_CON->query("DELETE FROM `$DB_NAME`.`$table` WHERE `$table`.`ID` = $id;");
}

// EDIT

function db_edit_3($table,$id,$where1,$where2,$where3,$val1,$val2,$val3) {
    include 'core/config.php';
    include 'core/db.php';
    $prepareEdit = $DB_CON->query("UPDATE `$DB_NAME`.`$table` SET `$where1` = '$val1', `$where2` = '$val2', `$where3` = '$val3' WHERE `$table`.`ID` = $id");
}
?>