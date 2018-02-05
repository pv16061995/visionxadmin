<?php include 'include/config.php';
 include 'ajax/controls.php';
 include 'ajax/apis.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title><?php echo PROJECT_TITLE;?></title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <link href="css/customs.css" rel="stylesheet">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
       <?php include 'include/top_menu.php';?>
       <?php include 'include/left_side_menu.php';?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">


                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                            <h5 class="text-muted vb">Total Users</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger"><?php print_r(count($datacountuser['users']));?></h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                            <h5 class="text-muted vb">NEW PROJECTS</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-megna">169</h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                            <h5 class="text-muted vb">NEW INVOICES</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-primary">157</h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6  b-0">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                            <h5 class="text-muted vb">All PROJECTS</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-success">431</h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
                <!-- /.row -->
               <!--  <div class="row">
                    <div class="col-md-7 col-lg-9 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Yearly Sales</h3>
                            <ul class="list-inline text-right">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>iPhone</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #fb9678;"></i>iPad</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #9675ce;"></i>iPod</h5>
                                </li>
                            </ul>
                            <div id="morris-area-chart" style="height: 340px;"></div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-3 col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bg-theme-dark m-b-15">
                                    <div class="row weather p-20">
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 m-t-40">
                                            <h3>&nbsp;</h3>
                                            <h1>73<sup>°F</sup></h1>
                                            <p class="text-white">AHMEDABAD, INDIA</p>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-right"> <i class="wi wi-day-cloudy-high"></i>
                                            <br/>
                                            <br/>
                                            <b class="text-white">SUNNEY DAY</b>
                                            <p class="w-title-sub">April 14</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="bg-theme m-b-15">
                                    <div id="myCarouse2" class="carousel vcarousel slide p-20">

                                        <div class="carousel-inner ">
                                            <div class="active item">
                                                <h3 class="text-white">My Acting blown <span class="font-bold">Your Mind</span> and you also laugh at the moment</h3>
                                                <div class="twi-user"><img src="images/users/hritik.jpg" alt="user" class="img-circle img-responsive pull-left">
                                                    <h4 class="text-white m-b-0">Govinda</h4>
                                                    <p class="text-white">Actor</p>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <h3 class="text-white">My Acting blown <span class="font-bold">Your Mind</span> and you also laugh at the moment</h3>
                                                <div class="twi-user"><img src="images/users/genu.jpg" alt="user" class="img-circle img-responsive pull-left">
                                                    <h4 class="text-white m-b-0">Govinda</h4>
                                                    <p class="text-white">Actor</p>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <h3 class="text-white">My Acting blown <span class="font-bold">Your Mind</span> and you also laugh at the moment</h3>
                                                <div class="twi-user"><img src="images/users/ritesh.jpg" alt="user" class="img-circle img-responsive pull-left">
                                                    <h4 class="text-white m-b-0">Govinda</h4>
                                                    <p class="text-white">Actor</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--row -->
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12 divheight">
                        <div class="white-box">
                          <!--   <h3 class="box-title">Recent Ticket</h3> -->
                            <div class="row sales-report">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h2 class="h2height">Latest Ticket</h2>
                                   <!--  <p>SALES REPORT</p> -->
                                </div>
                                <!-- <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <h1 class="text-right text-success m-t-20">$3,690</h1>
                                </div> -->
                            </div>
                            <div class="comment-center">
                                <?php
                                $i=1;
                                $objcon=NEW controls();
                                $tickequery=$objcon->getalltickets();
                                $ticketdata=json_decode($tickequery,true);
                                //print_r($ticketdata);
                                foreach ($ticketdata['data'] as $tic_data) {
                                   //print_r($tic_data);
                                ?>
                                <div class="comment-body">
                                  <!--   <div class="user-img"> <img src="images/users/pawandeep.jpg" alt="user" class="img-circle"></div> -->
                                    <div class="mail-contnet">
                                        <h5><?php echo $tic_data['ticketOwnerId']['email'];?><span class="time pull-right"><?php echo date('d-M-Y h:i:s',strtotime($tic_data['createdAt']));?></span></h5>
                                        <span class="mail-desc"><p><b>Subject : </b><?php echo $tic_data['title'];?></p></span>
                                         <!-- <span class="label label-rounded label-info">PENDING</span> -->
                                        </div>
                                </div>
                                <?php $i++;}?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-sm-12 divheight">
                        <div class="white-box">
                            <!-- <h3 class="box-title">Recent sales</h3> -->
                              <!-- <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                <select class="form-control pull-right row b-none">
                                  <option>March 2017</option>
                                  <option>April 2017</option>
                                  <option>May 2017</option>
                                  <option>June 2017</option>
                                  <option>July 2017</option>
                                </select>
                              </div> -->
                            </h3>
                            <div class="row sales-report">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h2 class="h2height">Currency Balances</h2>
                                   <!--  <p>SALES REPORT</p> -->
                                </div>
                                <!-- <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <h1 class="text-right text-success m-t-20">$3,690</h1>
                                </div> -->
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Currency</th>
                                            <th>Volume</th>
                                            <th>Freeze Volume</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        $objapi=NEW allapi();
                                        $responce=$objapi->getallcurrency();
                                        $result=json_decode($responce,true);

                                        $objcon=NEW controls();
                                        $apires=$objcon->getallcurrencybalances();
                                        $apiresult=json_decode($apires,true);

                                        foreach ($result as $value) {
                                            $val=substr($value,0,3);
                                        ?>
                                        <tr>
                                            <td class="txt-oflo"><?php echo $value;?></td>
                                            <td><?php if($apiresult['user'][0][$val.'balance']!=''){echo $apiresult['user'][0][$val.'balance'];}else{echo "0";}?> </td>
                                            <td class="txt-oflo"><?php if($apiresult['user'][0]['Freezed'.$val.'balance']!=''){echo $apiresult['user'][0]['Freezed'.$val.'balance'];}else{echo "0";}?>
                                                </td>
                                        </tr>
                                        <?php $i++;}?>

                                    </tbody>
                                </table>
                                <!-- <a href="#">Check all the sales</a> --> </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!--row -->
               <!--  <div class="row">
                    <div class="col-md-12 col-lg-9 col-sm-12 col-xs-12 pull-right">
                        <div class="white-box">
                            <h3 class="box-title">Sales Difference</h3>
                            <ul class="list-inline text-right">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Site A View</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Site B View</h5>
                                </li>
                            </ul>
                            <div id="morris-area-chart2" style="height: 370px;"></div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="white-box m-b-15">
                                    <h3 class="box-title">Sales Difference</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                                            <h1 class="text-info">$647</h1>
                                            <p class="text-muted">APRIL 2017</p>
                                            <b>(150 Sales)</b> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div id="sparkline2dash" class="text-center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="white-box bg-purple m-b-15">
                                    <h3 class="text-white box-title">VISIT STATASTICS</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                                            <h1 class="text-white">$347</h1>
                                            <p class="light_op_text">APRIL 2017</p>
                                            <b class="text-white">(150 Sales)</b> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div id="sales1" class="text-center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- row -->

                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
             <?php include 'include/footer.php';?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <script src="plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="plugins/bower_components/morrisjs/morris.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
<style type="text/css">

.h2height{
line-height:10px;
}
.comment-body
{
    width:100%;
}

</style>
