<?php

    session_destroy();
    
    print'<script>window.location.replace("/index.php")</script>';
    
    $_POST['error'] = '';
?>