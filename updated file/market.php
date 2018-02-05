<?php include 'include/config.php';
include 'ajax/apis.php';
$objapi=NEW allapi();
$currap=$objapi->getallexchnage();
$currapi=json_decode($currap,true);
if(isset($_GET['curr']))
{
  $curr1=base64_decode($_GET['curr']);
  if(in_array($curr1,$currapi))
  {
    $curr=base64_decode($_GET['curr']);
  }else{
    $curr="INRW/BTC";
  }

}else{
  $curr="INRW/BTC";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title><?php echo PROJECT_TITLE;?></title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <style>
    .tableInfo
    {
      padding-bottom: 5%;
    }
    .tablespace
    {
      padding-left: 5%;
    }
    </style>
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <?php include 'include/top_menu.php';?>
       <?php include 'include/left_side_menu.php';?>
        <!-- Top Navigation -->

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">market : <span class="curr_sub">INRW</span>/<span class="curr_main">BCH</span></h4>
                    </div>
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-4 white-box" id="allCurrencyList">

                    </div>
                    <div class="col-sm-8 white-box">
                      <div class="row">
                        <input type="hidden" id="sub_curr">
                        <input type="hidden" id="main_curr">
                        <input type="hidden" id="urlapi" value="<?php echo URL_API;?>">
                        <!---CENTER DIV--->
                        <div class="col-sm-6">
                          <!---BUY DIV---->
                        <div class="col-sm-12">
                          <div class="col-sm-12 text_head">
                            <h3>Buy <span class="curr_sub">INRW</span></h3>
                          </div>

                          <table style="width:70%;">
                              <tbody>
                                  <tr><td class="tableInfo">Your balance</td><td class="tableInfo tablespace"><span class="curr_main">BTC</span></td></tr>

                                  <tr><td class="tableInfo">Freeze Balance</td><td class="tableInfo tablespace"><span class="curr_main">BTC</span></td></tr>
                              </tbody>
                          </table>
                          <form>
                              <div class="form-group">
                                  <label for="exampleInputuname">Price <span class="curr_main">BTC</span></label>
                                  <div class="input-group">
                                    <input type="text" id="bid_rate" class="form-control inputRate" onkeypress="return isNumberKey(event)" onkeyup="bidAmount()" value="0">

                                </div>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputuname">Amount <span class="curr_sub">INRW</span></label>
                                  <div class="input-group">
                                    <input type="text" id="bid_vol"  class="form-control inputRate" onkeypress="return isNumberKey(event)" onkeyup="bidAmount()" value="0">
                                </div>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputuname">Total <span class="curr_main">BTC</span></label>
                                  <div class="input-group">
                                    <input type="text" id="bid_amount" class="form-control inputRate" onkeypress="return isNumberKey(event)" onkeydown="return check_number(event);" onkeyup="bidAmountTotal()" value="0">
                                </div>
                              </div>
                              <button type="button" class="fcbtn btn btn-success btn-outline btn-1b" onclick="buy_data();">Buy (<span class="curr_main">BTC</span> -> <span class="curr_sub">INRW</span>)</button>
                          </form>
                          <div class="alert alert-danger" id="alertmsg" style="display: none;"><strong>Please filled price and amount first !!!</strong>  </div>
                        </div>
                        <div class="clearfix horizontal_divider"></div>
                        <!---SELL DIV--->
                        <div class="col-sm-12">
                          <div id="getallaskdetail">

                          </div>
                          <!-- <p>Total BID <span class="curr_sub">INRW</span>  11.90000</p>
                          <p>Total BID <span class="curr_main">BTC</span>  1.19000</p>
                          <table class="table color-table info-table">
                                  <thead>
                                      <tr>
                                          <th>Bid</th>
                                          <th>Amount</th>
                                          <th>Price</th>
                                          <th>Total(BTC)</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>BID</td>
                                          <td>6.9</td>
                                          <td>0.1</td>
                                          <td>0.69</td>
                                      </tr>
                                      <tr>
                                          <td>BID</td>
                                          <td>6.9</td>
                                          <td>0.1</td>
                                          <td>0.69</td>
                                      </tr>
                                      <tr>
                                          <td>BID</td>
                                          <td>6.9</td>
                                          <td>0.1</td>
                                          <td>0.69</td>
                                      </tr>
                                  </tbody>
                              </table> -->
                        </div>

                      </div>
                      <!---RIGHT DIV--->
                      <div class="col-sm-6">
                          <div class="col-sm-12">
                            <div class="col-sm-12 text_head">
                              <h3>Sell <span class="curr_sub">INRW</span></h3>
                            </div>

                            <table style="width:70%;">
                                <tbody>
                                    <tr><td class="tableInfo">Your balance</td><td class="tableInfo tablespace"><span class="curr_main">BTC</span></td></tr>

                                    <tr><td class="tableInfo">Freeze Balance</td><td class="tableInfo tablespace"><span class="curr_main">BTC</span></td></tr>
                                </tbody>
                            </table>
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputuname">Price <span class="curr_main">BTC</span></label>
                                    <div class="input-group">
                                      <input id="ask_rate" class="form-control inputRate" type="text" onkeypress="return isNumberKey(event)" onkeyup="askAmount()" value="0">
                                      </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname">Amount <span class="curr_sub">INRW</span></label>
                                    <div class="input-group">
                                       <input id="ask_vol" class="form-control inputRate" type="text" onkeyup="askAmount()" onkeypress="return isNumberKey(event)"  value="0">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname">Total <span class="curr_main">BTC</span></label>
                                    <div class="input-group">
                                    <input id="ask_amount" class="form-control inputRate" type="text" onkeypress="return isNumberKey(event)" onkeydown="return check_number(event);" value="0" onkeyup="askTotalAmount()" value="">
                                        </div>
                                </div>
                                <button type="button" class="fcbtn btn btn-danger btn-outline btn-1b" onclick="sell_data();">Sell (<span class="curr_sub">INRW</span> -> <span class="curr_main">BTC</span>)</button>
                            </form>
                            <div class="alert alert-danger" id="alertmsg1" style="display: none;"><strong>Please filled price and amount first !!!</strong>  </div>
                          </div>
                          <div class="clearfix horizontal_divider"></div>
                          <div class="col-sm-12">
                            <div id="getallbiddetail">

                            </div>

                          </div>

                      </div>
                      <div class="clearfix"></div>
                      <div class="col-sm-12" style="margin-top:4%;">
                        <h3 class="box-title">Orders</h3>
                        <div class="table-responsive" id="order-table">
                              <!-- <table class="table color-table success-table">
                                  <thead>
                                      <tr>
                                          <th>ORDER DATE</th>
                                          <th>BID/ASK</th>
                                          <th>UNITS FILLED INRW</th>
                                          <th>ACTUAL RATE</th>
                                          <th>UNITS TOTAL INRW</th>
                                          <th>UNITS TOTAL BTC</th>
                                          <th>ACTION</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>1</td>
                                          <td>Nigam</td>
                                          <td>Eichmann</td>
                                          <td>@Sonu</td>
                                          <td>Nigam</td>
                                          <td>Eichmann</td>
                                          <td>@Sonu</td>
                                      </tr>
                                      <tr>
                                          <td>2</td>
                                          <td>Deshmukh</td>
                                          <td>Prohaska</td>
                                          <td>@Genelia</td>
                                          <td>Nigam</td>
                                          <td>Eichmann</td>
                                          <td>@Sonu</td>
                                      </tr>
                                      <tr>
                                          <td>3</td>
                                          <td>Roshan</td>
                                          <td>Rogahn</td>
                                          <td>@Hritik</td>
                                          <td>Nigam</td>
                                          <td>Eichmann</td>
                                          <td>@Sonu</td>
                                      </tr>
                                  </tbody>
                              </table> -->
                          </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-sm-12" style="margin-top:4%;">
                        <h3 class="box-title">Success Orders</h3>
                        <div class="table-responsive">
                              <table class="table color-table success-table">
                                  <thead>
                                      <tr>
                                          <th>ORDER DATE</th>
                                          <th>BID/ASK</th>
                                          <th>UNITS FILLED INRW</th>
                                          <th>ACTUAL RATE</th>
                                          <th>UNITS TOTAL INRW</th>
                                          <th>UNITS TOTAL BTC</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>1</td>
                                          <td>Nigam</td>
                                          <td>Eichmann</td>
                                          <td>@Sonu</td>
                                          <td>Eichmann</td>
                                          <td>@Sonu</td>
                                      </tr>
                                      <tr>
                                          <td>2</td>
                                          <td>Deshmukh</td>
                                          <td>Prohaska</td>
                                          <td>@Genelia</td>
                                          <td>Eichmann</td>
                                          <td>@Sonu</td>
                                      </tr>
                                      <tr>
                                          <td>3</td>
                                          <td>Roshan</td>
                                          <td>Rogahn</td>
                                          <td>@Hritik</td>
                                          <td>Eichmann</td>
                                          <td>@Sonu</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                    </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
           <?php include 'include/footer.php';?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();

        getCurrencytList();
      });
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });



    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="modal"]').tooltip();
    maketcurrenypass('<?php echo $curr?>');
    orderBookBid();
    orderBookAsk();
    fetchOrderBook('<?php echo $_SESSION['admin_email']; ?>');
});

    </script>
<script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script src="plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js"></script>
<script src="ajax/market.js"></script>
<script src="js/bignumber.js"></script>
<script type="text/javascript" src="js/sails.io.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#myTab a").click(function(e){
      e.preventDefault();
      $(this).tab('show');
    });
});

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 46 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
</body>

</html>
<style>
.btn{
    padding: .8rem 12.1rem
}
.modal-dialog {
    max-width: 1200px;

}
.closepop{
    display:none !important;
}
.m-b-30{

    margin-bottom: 0px !important;
}
.tab-content {
    margin-top: 0px !important;
}
.nav-link.active{
    background-color: #fec107 !important;
}
.nav-primary-clr.active{
    background: #ab8ce4 !important;
}
.inputRate {
    text-align: right;
}
#alertmsg,#alertmsg1
{
  margin-top: 2%;
}
.form-group {
    margin-bottom: 10px;
}
</style>
