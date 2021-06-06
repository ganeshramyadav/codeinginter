<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CodeInsect | Admin System Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>    
  <body class="hold-transition login-page" >
    
    <div class="login-box" style="width: 600px !important;">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">General Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="<?php echo base_url(); ?>create" method="post">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name">
                    </div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="tel" name="mobile" class="form-control" placeholder="Enter your contact number">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your contact email">
                    </div>

                    <div class="form-group">
                        <label>Street Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter your address">
                    </div>

                    <div class="form-group">
                        <label>City </label>
                        <input type="text" name="city" class="form-control" placeholder="Enter your city">
                    </div>

                    <div class="form-group">
                        <label>State </label>
                        <select class="form-control" name="state">
                            <option value="">Select Your City</option>
                            <option value="1">option 2</option>
                            <option value="2">option 3</option>
                            <option value="3">option 4</option>
                            <option value="4">option 5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Zip code </label>
                        <input type="number" name="zipcode" class="form-control" placeholder="Enter your city">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block btn-flat" value="Submit" />
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>