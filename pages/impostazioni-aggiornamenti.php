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
                    <a href="#">Impostazioni</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="">Aggiornamenti</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Impostazioni
        <small>Aggiornamenti</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        <span class="sr-only">  </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button name="check" type="button" class="check btn btn-lg green">Controlla Aggiornamenti</button>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
var clicks = 0;
 $('.check').on('click', function() {
     $(this).prop('disabled', true);
  clicks++;
  var percent = Math.min(Math.round(clicks / 1 * 100), 3000);
  $('.progress-bar').width(percent + '%').text(percent + '%');
  $(".check").after("<br><br><div class='alert alert-success'>Non ci sono aggiornamenti!</div>");
 });
});
</script>