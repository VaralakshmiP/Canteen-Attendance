<?php
include("includes/header.php");
include("includes/menu.php");
include("includes/check_session.php");

/*if ($_GET['encode']=="") {
$id=base64_encode($_GET['id']);
echo "<script>location.href='index.php?encode=encoded&id=$id'</script>";
}*/





//session_start();

?>


<!--<script>
  $(document).ready(function() {
    $('.example').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );
  } );
</script>-->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script> -->
<section id="main-content">

  <section class="wrapper site-min-height">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="tab-content">
          <div id="finder" class="tab-pane fade in active">
            <div class="row dashboard-stats container"><br><br><br>
              <div class="col-md-4 col-sm-6 col-md-offset-7">
                <section class="panel panel-box">
                  <div class="panel-left panel-icon bg-lovender"><i class="fa fa-book fw fa-2x" style="margin-top: 12px;"></i></div>
                  <div class="panel-right panel-icon bg-reverse">
                    <p class="text-muted no-margin text"><span> </span></p>
                    <Strong>
                      <p class="size-h1">ATTENDED STUDENTS</p>
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
 <form method="post">
   <div class="col-md-3"><span>From -<input style="float: right" class="form-control" type="date" id="datepicker" name="date1"></span></div>
    <div class="col-md-3"><span>To -<input  class="form-control" type="date" id="datepicker" name="date2"></span></div>
    <div class="col-md-3"><br/>
      <span>
      <select name="foodsession">
         <option value="breakfast">Breakfast</option>
         <option value="lunch">Lunch</option>
         <option value="snacks">Snacks</option>
         <option value="dinner">Dinner</option>
     </select>
    </span></div>
    <div class="col-md-3">
     <br/>
       <button class="btn btn-primary"  name="submit">Submit</button> 
    </div>
        <!--table responsive div end-->
 </form>
 

    </div>


    
    <!--  data will write here -->


    


          <?php 
         if(isset($_POST['submit']))
         {

          ?>

<div class="tab-content" style="border: 1px solid #eee; background: #fff; padding: 10px;">
      <!--  data will write here -->
      <center><h2 class="text-center">Students List</h2></center>

      <!--table responsive div start-->
      <div class="table-responsive">
        <table class="table example table-striped table-bordered table-centered table-hover">
          <thead>    
            <!--<a href="#add" onclick="display_form()" class="btn btn-primary btn-md pull-right"><i class="glyphicon glyphicon-plus"></i> Start Mapping</a>-->
            <tr>
              <th>S.No</th>
              <th>Student id</th>
              <th>Student name</th>
              <th>Room no</th>
              <th>Mobile</th>
              <th>Gender</th>
              <th>Year</th>
              <th>College</th>
                <th>Canteen</th>
              
            </tr>
          </thead>
          <tbody>

          <?php
        

               
          $item=$_POST['foodsession'];
     
          $date1=$_POST['date1'];
         $date2=$_POST['date2'];
          $day1=explode("-",$date1);
          $day2=explode("-",$date2);
         
          
                $x=1;    

            $query3= "SELECT * FROM `attendance` WHERE date between '".$date1."' AND '".$date2."'"; 

             $res5=mysqli_query($con, $query3);


                

         // $query3= "SELECT * FROM `attendance` WHERE day(date)='".$day1[2]."'  AND month(date)>='".$day1[1]."' AND  year(date)='".$day1[0]."'";    

            // $res5=mysqli_query($con, $query3);


                  while($row = mysqli_fetch_array($res5)) {

                    if($row[$item]!=NULL)
                    {
                        
                       $query="SELECT * from `students` where student_id='".$row['student_id']."'";
                        $result=mysqli_query($con,$query);
                        $r=mysqli_fetch_array($result);

                    ?> 
                    <tr class="data">
                        <td><?php echo $x;?></td>
                       <td  ><?php echo $row['student_id'];?></td>
                        <td  ><?php echo $r['student_name'];?></td>
                        <td  ><?php echo $r['room_no'];?></td>
                        <td ><?php echo $r['mobile'];?></td>
                        <td  ><?php echo $r['gender'];?></td>
                        <td ><?php echo $r['year'];?></td>
                        <td ><?php echo $r['college'];?></td>
                        <td ><?php echo $r['canteen'];?></td>
           <?php
            $x++;
            }
          }
            ?>
         
          </tbody>
        </table>
      </div><!--table responsive div end-->
    </div>
  </div> <!-- /row -->
</div><br><br/> <!-- /.container -->
</section>
<?php
include("includes/footer.php");
?>
</section>
<?php
}
?>
</body>
</html>