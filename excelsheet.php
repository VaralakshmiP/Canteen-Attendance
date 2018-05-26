

<?php 
include("api/config.php");

 ?>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <style>
.mrg_pad_0{
    margin: 0;
    padding: 0;
}
  .disp_none{
    display: none;
  }

  table td, th{
    text-align: center;
  }
  .form-control{
    min-width: 30px;
  }
</style>

<!-- Web form starts -->
<div id='main-content'>
      <br><br><br>

      <?php
      
// We'll be outputting an excel file
@header("Content-Type: application/xls");    
@header("Content-Disposition: attachment; filename=latecomer.xls");

      

                ?>
        <div class="col-md-12 table-responsive">
          <table class="table table-bordered table-striped table-hover">
             <thead>
                 <tr>
                     <th>S.No</th>
                     <th>Roll No</th>
                     <th>Name</th>
                     <th>Guardian name</th>
                     <th>Mobile</th>
                     <th>Gender</th>
                     <th>Year</th>
                     <th>College</th>
                    
                 </tr>
             </thead>
             <tbody>

              <?php
             $i=1;
             $query5= "SELECT * FROM `attendence` WHERE day(date)='".date('d')."' AND month(date)='".date('m')."' AND year(date)='".date('Y')."'";
              @$result5 = mysqli_query($con,$query5);
               while($row = mysqli_fetch_array($result5)) {

              

            $query6="SELECT * from `students` where student_code='".$row['rollno']."'";
            $result6=mysqli_query($con, $query6);
                    
            @$Count = mysqli_num_rows($result6);
                    if ($Count > 0) {
              
                 while (@$row1 = mysqli_fetch_array($result6)) {



                    ?> 
                    <tr class="data">
                        <td><?php echo $i;?></td>
                       <td  ><?php echo $row1['student_code'];?></td>
                        <td  ><?php echo $row1['student_name'];?></td>
                        <td  ><?php echo $row1['guardian_name'];?></td>
                        <td ><?php echo $row1['mobile'];?></td>
                        <td  ><?php echo $row1['gender'];?></td>
                        <td ><?php echo $row1['year'];?></td>
                        <td ><?php echo $row1['college'];?></td>

                       
                  
                       

                    </tr>
           <?php
            $i++;
            }
          }
          
            else{
                echo "<tr><td colspan='12'><h3 class='text-danger'>No data Found</h3></td></tr>";
             }
           }
           
$from="preethi.sathi369@gmail.com";
$to="knavya1997@gmail.com";
$subject="Today latecomers list";
$message="Gd mrng";
$attatchment="latecomer.xls";
function mail_attachment($from , $to, $subject, $message, $attachment){

$fileatt = $attachment; // Path to the file                  
$fileatt_type = "excel"; // File Type 
$start= strrpos($attachment, '/') == -1 ? strrpos($attachment, '//') : strrpos($attachment, '/')+1;
$fileatt_name = substr($attachment, $start, strlen($attachment)); // Filename that will be used for the file as the     attachment 

$email_from = $from; // Who the email is from 
$email_subject =  $subject; // The Subject of the email 
$email_txt = $message; // Message that the email has in it 

$email_to = $to; // Who the email is to

$headers = "From: ".$email_from;
//$headers .= "\nCc: payment@comtranslations.com";
//$headers .= "\nCc: ".$o3->email;
$file = fopen($fileatt,'rb'); 
$data = fread($file,filesize($fileatt)); 
fclose($file); 
$msg_txt="testing";

$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

$headers .= "\nMIME-Version: 1.0\n" . 
        "Content-Type: multipart/mixed;\n" . 
        " boundary=\"{$mime_boundary}\""; 

$email_txt .= $msg_txt;

$email_message .= "Good morning sir.Today latecomers list can be found in the below attatchment.\n\n" . 
            "--{$mime_boundary}\n" . 
            "Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
           "Content-Transfer-Encoding: 7bit\n\n" . 
$email_txt . "\n\n"; 

$data = chunk_split(base64_encode($data)); 

$email_message .= "--{$mime_boundary}\n" . 
              "Content-Type: {$fileatt_type};\n" . 
              " name=\"{$fileatt_name}\"\n" . 
              //"Content-Disposition: attachment;\n" . 
              //" filename=\"{$fileatt_name}\"\n" . 
              "Content-Transfer-Encoding: base64\n\n" . 
             $data . "\n\n" . 
              "--{$mime_boundary}--\n"; 


$ok = @mail($email_to, $email_subject, $email_message, $headers); 

if($ok) { 



} 
else { 
    die("Sorry, but the email could not be sent. Please go back and try again!"); 
} 
}      





?>


            </tbody>
          </table>
          </div>
