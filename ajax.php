<?php 
  include("includes/check_session.php");
  include("api/config.php");
  // student data load
  if ($_REQUEST['action'] && $_REQUEST['action']=="data") 
  {
    echo "<script>$('#roll').val('');</script>";    
    error_reporting(0);
    $pin = mysqli_real_escape_string($con, $_REQUEST['pin']);//getting value in ajax
    $query= "SELECT * FROM `students` where `student_id`='".$pin."'";
    $res=mysqli_query($con, $query);
    while($row = mysqli_fetch_array($res)) 
    {
?> 
      <style>
      .count_head
      {
        text-align:center;
        color:#000;
      }
      .count_num
      {
        text-align:center;
        color:#fff;
        line-height: 100px 0px 0px 0px;
        font-size: 100px !important;
      }
      .count_num_bg
      {
        background: #ff8c00;
        height: 200px;
        width: 200px;
        margin-left: 130px;
        margin-top: 60px;
        border-radius: 100px;
        border:2px solid #fff;
      }
      .img_bg{
        background-image:  url(images/canteen1.jpg);
        height: 580px;
        width:500px;

      }



</style>                    

<div class="container" align="left" >
<div class="row">
<div class="col-md-5 col-md-offset-1">

<div class="panel panel-default" style="border-color: #003366; background-image: url("images/bg8.jpg")">
  <div class="panel-heading" style="border-color: #003366; background-color: #336699"> <center> <h2 style="color:  #ffffff">Student Data</h2></center></div>
   <div class="panel-body" style="border-color: #003366">
       
    <div class="box box-info" >
        
            <div class="box-body">

            <div class="col-md-12">
            <center><img alt="User Pic"  style="width: 100PX;height: 100px" src="images/student_img/<?php echo $row['student_id']; ?>.jpg" id="profile-image1" class="img-circle img-responsive"></center> <br>
    
            </div>


            <div class="col-md-6">
            <span><h4 class="text-right" style="color: #003300;">Roll No :</h4></span>
             <span><h4 class="text-right" style="color: #003300;">Name :</h4></span>
              <span><h4 class="text-right" style="color: #003300;">Room No :</h4></span>
               <span><h4 class="text-right" style="color: #003300;">Mobile :</h4></span>
                <span><h4 class="text-right" style="color: #003300;">Gender :</h4> 
                 <span><h4 class="text-right" style="color: #003300;">Year :</h4></span>
                   <span><h4 class="text-right" style="color: #003300;">College :</h4></span>
                   <span><h4 class="text-right" style="color: #003300;">Canteen :</h4></span>


               
            </div>

                <div class="col-md-6">
            <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['student_id'];?> </h4></span>
             <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['student_name'];?> </h4></span>
              <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['room_no'];?> </h4></span>
               <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['mobile'];?> </h4></span>
                <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['gender'];?> </h4></span>
                 <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['year'];?> </h4></span>
                   <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['college'];?> </h4></span>
                   <span><h4 class="text-left" style="color:#00b1b1;">  <?php echo  $row['canteen'];?> </h4></span>


               
            </div>
        </div> 
            
       </div> 
    </div>
</div>  

   <?php
             $date=date('Y-m-d');
            date_default_timezone_set('Asia/kolkata');
             $result=mysqli_query($con,"select * from attendance where student_id='".$pin."' and date='".$date."'"); 
    $r=mysqli_fetch_array($result); 
    $rowcount=mysqli_num_rows($result);
    if($rowcount==0 && $pin==$row['student_id'] )
      { 
        $sql="insert into attendance set student_id='".$pin."',date='".$date."'";
        $result=mysqli_query($con,$sql);
      }
    if(date('H:i:s')>='07:30:00' && date('H:i:s')<='09:00:00')
      {
        if($r['breakfast']!='')
        {
          echo "<script>alert('You have Already Taken Breakfast...!');location.href='dashboard.php'</script>";
        }
     else
     {
        $sql="update attendance set breakfast='".date('H:i:s')."' where student_id='".$pin."' and date='".$date."' ";
        $result=mysqli_query($con,$sql);
      }

      }
      if(date('H:i:s')>='12:30:00' && date('H:i:s')<='14:00:00')
      {
        if($r['lunch']!='')
        {
          echo "<script>alert('You have Already Taken Lunch...!');location.href='dashboard.php'</script>";
        }
        else
        {
        $sql="update attendance set lunch='".date('H:i:s')."' where student_id='".$pin."' and date='".$date."' ";
        $result=mysqli_query($con,$sql);
        }
      }
      if(date('H:i:s')>='15:30:00' && date('H:i:s')<='18:00:00')
      {
        if($r['snacks']!='')
        {
          echo "<script>alert('You have Already Taken Snacks...!');location.href='dashboard.php'</script>";
        }
        else
        {
        $sql="update attendance set snacks='".date('H:i:s')."' where student_id='".$pin."' and date='".$date."' ";
        $result=mysqli_query($con,$sql);
       }
        
      }
      if(date('H:i:s')>='19:00:00' && date('H:i:s')<='20:30:00')
      {
        if($r['dinner']!='' )
        {
          echo "<script>alert('You have Already Taken Dinner...!');location.href='dashboard.php'</script>";
        }
        else
        {
        $sql="update attendance set dinner='".date('H:i:s')."' where student_id='".$pin."' and date='".$date."' ";
        $result=mysqli_query($con,$sql);
        }
      }
      ?>
</div>
<div class="col-md-5" style="background-color:#81bf41;height:480px;border:2px solid blue;">
  <?php
  if(date('H:i:s')>='07:30:00' && date('H:i:s')<='09:00:00')
  { 
  
    $sql="select * from attendance where date='".$date."' and breakfast!=''";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);
    echo "<div class='panel-heading' style='border-color: #003366; background-color: #336699'> <center> <h2 style='color:  #ffffff'>Breakfast Attendance</h2></center></div>";
    echo "<div class='count_num_bg'><br/><h1 class='count_num'>".$count."</h1></div>";




  } 
 else if(date('H:i:s')>='12:30:00' && date('H:i:s')<='14:00:00')
  { 
  
    $sql="select * from attendance where date='".$date."' and lunch!=''";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);
    echo "<div class='panel-heading' style='border-color: #003366; background-color: #336699'> <center> <h2 style='color:  #ffffff'>Lunch Attendance</h2></center></div>";
    echo "<div class='count_num_bg'><br/><h1 class='count_num'>".$count."</h1></div>";




  }
 else if(date('H:i:s')>='15:30:00' && date('H:i:s')<='18:00:00')
  { 
  
    $sql="select * from attendance where date='".$date."' and snacks!=''";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);
    echo "<div class='panel-heading' style='border-color: #003366; background-color: #336699'> <center> <h2 style='color:  #ffffff'>Snacks Attendance</h2></center></div>";
    echo "<div class='count_num_bg'><br/><h1 class='count_num'>".$count."</h1></div>";




  }  
 else if(date('H:i:s')>='19:00:00' && date('H:i:s')<='20:30:00')
  { 
  
     $sql="select * from attendance where date='".$date."' and dinner!=''";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);
    echo "<div class='panel-heading' style='border-color: #003366; background-color: #336699'> <center> <h2 style='color:  #ffffff'>Dinner Attendance</h2><br/><br/></center></div>";
    echo "<div class='count_num_bg'><br/><center><h1 class='count_num'>".$count."</center></h1></div>";




  } 
  
  

  
  else{?>
    <!-- <div class="img_bg" >--><?php
    echo "<center><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><h1 style='color:black;'>No session is running now</h1></center>";
    }
    ?>
  <!--</div>-->
  </div>
</div>

</div>
<?php
echo "Hlo....!";
}
}
?>