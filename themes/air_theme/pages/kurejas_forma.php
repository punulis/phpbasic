<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="kurejas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="kurejas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="kurejas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="kurejas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="kurejas/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-11">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="id">ID:</label>
                  <input type="text" class="form-control" id="flightId" name="id" placeholder="Enter Flight ID">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Flight Name:</label>
                  <input type="text" class="form-control" id="flightName" name ="name" placeholder="Enter Flight Name">
                </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Flight Description:</label>
                      <input type="text" class="form-control" id="flightDescription" name="description" placeholder="Flight Description">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Flight From:</label>
                      <input type="text" class="form-control" id="flightfrom" name="from" placeholder="Flight From">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Flight To:</label>
                      <input type="text" class="form-control" id="flightTo" name="to" placeholder="Flight To">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Flight Price:</label>
                      <input type="text" class="form-control" id="flightPrice" name="price" placeholder="Flight Price">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Flight Category:</label>
                      <input type="text" class="form-control" id="flightCategory" name="category" placeholder="Flight Category">
                  </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="add">Submit</button>
              </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="delete">Delete</button>
                </div>
            </form>

          </div>

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="kurejas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="kurejas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="kurejas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="kurejas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="kurejas/dist/js/demo.js"></script>
</body>
</html>
