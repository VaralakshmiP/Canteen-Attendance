<?php
include("includes/header.php");
include("includes/menu.php");
include("includes/check_session.php");
include("api/config.php");
/*if ($_GET['encode']=="") {
$id=base64_encode($_GET['id']);
echo "<script>location.href='index.php?encode=encoded&id=$id'</script>";
}*/
  

//session_start();

?>

<section id="main-content">

   <section class="wrapper site-min-height">
      <div class="row mt">
          
         <div class="col-lg-12">
            <div class="tab-content">
               <div id="finder" class="tab-pane fade in active">
                  <div class="row dashboard-stats container"><br><br><br>
                     <div class="col-md-4 col-sm-6 col-md-offset-4">
                        <section class="panel panel-box">
                           <div class="panel-left panel-icon bg-lovender"><i class="fa fa-book fw fa-2x" style="margin-top: 12px;"></i></div>
                           <div class="panel-right panel-icon bg-reverse">
                              <p class="text-muted no-margin text"><span> </span></p>
                              <Strong>
                                 <p class="size-h1">TAP YOUR ID</p>
                              </Strong>
                           </div>
                        </section>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </head>
<body align>
<center>

<div class="row">
<div class="col-md-4 col-md-offset-4">
 <input type="text" placeholder="Please Scan Your ID" class="form-control" name="student_code" autofocus onchange="loaddata();" id="roll" ><br/><br/>
 </div>
</div>

 </center>



           

        

        <!--table responsive div start-->
        <div class="table-responsive" >
        <div id="ajax-load">

          
          </div>
        </div>
        <!--table responsive div end-->
        </div>
       </div> <!-- /row -->
    </div><br><br/> <!-- /.container -->
</body>
</html>
 </section>


 <script> 
   
         function loaddata(){
            //load data
            $("#ajax-load").load('ajax.php?action=data&pin='+roll.value);
        }

 </script>
