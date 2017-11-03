<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pxy CRM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 <link rel="stylesheet" href="/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">

  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="/dist/css/custom.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    @include('header')

    <!-- Sidebar -->
    @include('sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <br />
            <h1>
                @yield('title')
                &nbsp;&nbsp;<small>@yield('subtitle')</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            <ol class="breadcrumb">
                <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">@yield('title')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/plugins/datepicker/bootstrap-datepicker.js"></script> 
<script src="/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
  });
</script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="/bootstrap/js/bootstrap.min.js"></script>

<script src="/plugins/select2/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>    
<script src="/dist/js/app.min.js"></script>    
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<script>
    $(function () {
    //Date range picker
    $('#reservation').daterangepicker();
    $('#projectdaterange').daterangepicker();
    $('#taskdate').daterangepicker({
        minDate: new Date($("#minyear").val(), $("#minmonth").val() - 1, $("#minday").val()),
        maxDate: new Date($("#maxyear").val(), $("#maxmonth").val() - 1, $("#maxday").val())
    });
    
  });
</script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/search.js"></script>
    <script>
$("input[type=password]").keyup(function(){
	if($("#new_password").val().length >= 6){
		$("#morethansix").removeClass("glyphicon-remove");
		$("#morethansix").addClass("glyphicon-ok");
		$("#morethansix").css("color","#00A41E");
	}else{
		$("#morethansix").removeClass("glyphicon-ok");
		$("#morethansix").addClass("glyphicon-remove");
		$("#morethansix").css("color","#FF0004");
	}

	if($("#new_password_confirm").val().length >= 6 && $("#new_password_confirm").val() == $("#new_password").val()){
		$("#newpasswordcorrect").removeClass("glyphicon-remove");
		$("#newpasswordcorrect").addClass("glyphicon-ok");
		$("#newpasswordcorrect").css("color","#00A41E");
	}else{
		$("#newpasswordcorrect").removeClass("glyphicon-ok");
		$("#newpasswordcorrect").addClass("glyphicon-remove");
		$("#newpasswordcorrect").css("color","#FF0004");
	}
    if($("#oldpasswordconfirm").val() == "malsbabs" ){
		$("#oldpasswordcorrect").removeClass("glyphicon-remove");
		$("#oldpasswordcorrect").addClass("glyphicon-ok");
		$("#oldpasswordcorrect").css("color","#00A41E");
	}else{
		$("#oldpasswordcorrect").removeClass("glyphicon-ok");
		$("#oldpasswordcorrect").addClass("glyphicon-remove");
		$("#oldpasswordcorrect").css("color","#FF0004");
	}
    
    if($("#new_password").val().length >= 6 && $("#new_password_confirm").val() == $("#new_password").val() && $("#oldpasswordconfirm").val() == "malsbabs"){
        $('#changepassword').prop('disabled', false);
    }else{
        $('#changepassword').prop('disabled', true);
    }
});
</script>
    



    
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
