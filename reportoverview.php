<?php
include("includes/header.php");
include("includes/menu.php");
include("includes/check_session.php");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <!-- <link rel="stylesheet" type="text/css" href="css/style.css">-->


  <style>
  .count_head{
    text-align:center;
    color:#000;
   
  }
    .count_num{
    text-align:center;
    vertical-align: middle;
    color:#fff;

    line-height: 10px 100px 200px;
     font-size: 50px !important;

  }
  .count_num_bg{
    background:blue;
    margin-bottom: 400px;
    height: 80px;
    width: 80px;
    margin-left: 90px;
    border-radius: 50px;
    border:2px solid #fff;
  
  }
</style>
  </head>
  <body>

          <div class="row mt">
          
         <div class="col-lg-12">
            <div class="tab-content">
               <div id="finder" class="tab-pane fade in active">
                  <div class="row dashboard-stats container"><br><br><br>
                     <div class="col-md-4 col-sm-6 col-md-offset-6">
                        <section class="panel panel-box">
                           <div class="panel-left panel-icon bg-lovender"><i class="fa fa-book fw fa-2x" style="margin-top: 12px;"></i></div>
                           <div class="panel-right panel-icon bg-reverse">
                              <p class="text-muted no-margin text"><span> </span></p>
                              <Strong>
                                 <p class="size-h1">Overall Reports</p>
                              </Strong>
                           </div>
                        </section>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
  	
    <div class="row">
      <div class="col-xs-6 col-md-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel dash_analysis_1">
            <h4>Breakfast</h4>

    <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><h1><?php
 $date=date('Y-m-d');
       
    $sql="select * from attendance where date='".$date."' and breakfast!=''";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);

    echo $count;
    ?></h1></div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-2">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel dash_analysis_2">
            <h4>Lunch</h4>
            <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><h1><?php
 $date=date('Y-m-d');
       
    $sql="select * from attendance where date='".$date."' and lunch!=''";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);

    echo $count;
    ?></h1></div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-2">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel dash_analysis_3">
            <h4>Snacks</h4>
            <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><h1><?php
 $date=date('Y-m-d');
       
    $sql="select * from attendance where date='".$date."' and snacks!=''";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);

    echo $count;
    ?></h1></div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-2">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel dash_analysis_4">
            <h4>Dinner</h4>
            <div class="easypiechart" id="easypiechart-red" data-percent="27" ><h1><?php
 $date=date('Y-m-d');
       
    $sql="select * from attendance where date='".$date."' and dinner!=''";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);

    echo $count;
    ?></h1></div>
          </div>
        </div>
      </div>
    </div>

  </body>
<style type="text/css">
	.top_margin{
		margin-top:30px; 
	}
.dash_analysis{
	margin-right:20px;
	margin-bottom:20px;
	border: 2px solid #000;
	border-radius: 10px;
	box-shadow: 5px 5px #888888;
}


.dash_analysis_4{
    background: #ef630b;
    color: #fff;
}

.dash_analysis_3{
    background: #065b10;
    color: #fff;

}

.dash_analysis_2{
    background: #7741f4;
    color: #fff;

}
.dash_analysis_1{
    background: #f44141;
    color: #fff;

}


</style>



</html>

