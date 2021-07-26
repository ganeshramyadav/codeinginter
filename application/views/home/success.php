<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>UserData Form</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>    
  <body class="hold-transition login-page" >
    
    <div class="login-box" style="width: 600px !important;">
        
    </div>

    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your Data has been saved Successfully.',
            showConfirmButton: false,
            timer: 3000
        });

        window.setTimeout(function(){
            // Move to a new location or you can do something else
            window.location.href = "<?php echo base_url(); ?>";

        }, 3000);

    </script>
  </body>
</html>