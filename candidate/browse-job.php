<?php
session_start();
include '../includes/db.php';
if(!isset($_SESSION['id']) || $_SESSION['role'] !='candidate'){
header('location: ../login.php');
exit();
}
$query="select*from jobs order by id ASC";
$result=mysqli_query($connect,$query);

//apply job functionality

if(isset($_POST['apply_job'])){
  $user_id=$_SESSION['id'];
  $job_id=$_POST['job_id'];

  //check resume uploaded or not
  if(!isset($_FILES['resume']) || $_FILES['resume']['error'] !=0 ){
    echo "please upload your resume";
    exit();
  }
  //check job exist or not
  $job_query="select id from jobs where id='$job_id' AND status='open'";
  $res=mysqli_query($connect,$job_query);
  if(mysqli_num_rows($res)==0){
    echo "job not available!";
    exit();
  }
  //check duplicate job

  $job_duplicate="select id from job_application where user_id='$user_id' AND job_id='$job_id'";
  $result=mysqli_query($connect,$job_duplicate);
  if(mysqli_num_rows($result)>0){
    echo "you have already applied for this job!";
    exit();
  }
  //resume validaion
  // name, tmp_name,size
  $resume_name=$_FILES['resume']['name'];
  $resume_tmp=$_FILES['resume']['tmp_name'];
  $resume_size=$_FILES['resume']['size'];

  //fileExtension

  $fileExtension=pathinfo($resume_name,PATHINFO_EXTENSION);
  $allow_extension=["pdf","doc","docx"];

  if(!in_array($fileExtension,$allow_extension)){
    echo "only PDF, DOC, DOCX file are allowed";
    exit();
  }
  // maximume file size 2MB=>2*1024*1024
  if($resume_size>2*1024*1024){
    echo "resume size should be uploaded less then 2MB";
    exit();
  }

  //create upload folder
  $upload_folder="../upload/resumes/";
  if(!is_dir($upload_folder)){
    mkdir($upload_folder,0755,true);
  }
  //generate unique file name
  $new_resume_name=uniqid('resume_',true).'.'.$fileExtension;
  $resume_path=$upload_folder.$new_resume_name;

  if(move_uploaded_file($resume_tmp,$resume_path)){
    //save resume in database
    $resume_db_path="upload/resumes/" .$new_resume_name;
    $insert_query="INSERT INTO job_application (user_id,job_id,resume) values('$user_id','$job_id','$resume_db_path')";
    $result=mysqli_query($connect,$insert_query);
    if($result){
      echo "<script>
           alert('job Application submitted successfully!');
           window.location.href='browse-job.php';
        </script>";
    }else{
         //remove uploaded file if database insert fails
         unlink($resume_path);
         echo "Application not submitted, please try again.";
    }
  }else{
    echo "Resume upload failed";
  }
}

include '../includes/dashboard-header.php';
?>
<div class="container-fluid">
       <div class="row">
          <div class="col-md-2 candidate-sidebar sidebar-toggle p-3">  
            <?php include '../includes/candidate-sidebar.php'; ?>
       </div>
       
       <div class="col-md-10">
       <h2 class="text-center">Available jobs</h2>
       <p class="text-muted text-center">You can apply job related to you profile</p>
       <div class="row g-4">
         <?php
         if(mysqli_num_rows($result)>0){
          while($job=mysqli_fetch_assoc($result)){
            ?>
            <div class="col-md-4">
                <div class="card"style="border:none; border-radius:16px; box-shadow:0 6px 20px rgba(0,0,0,0.12); height:100%;">
                     <div class="card-body rounded" style="background:#1D2F4F; color:#fff; border-radius:16px; padding:20px;">
                        <h4><?php echo $job['title'];?></h4>
                        <p><i class="fa-solid fa-building"></i><?php echo $job['company'];?></p>
                        <hr class="shadow">
                        <p><strong>Job Type : </strong><?php echo $job['job_type'];?></p>
                        <p><strong>Required Technology : </strong><?php echo $job['technology'];?></p>
                        <p><strong>Experience :</strong> <?php echo $job['exeperience'];?></p>
                        <p><i class="fa-solid fa-location-pin"></i><strong> Location :</strong> <?php echo $job['location'];?></p>
                        <p><i class="fa-solid fa-sack-dollar"></i><strong> Salary : </strong><?php echo $job['salary'];?></p>
                        
                       <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#appliedjob<?php echo $job['id'];?>" aria-controls="offcanvasRight">Apply</button>

                    </div>
                </div>
            </div>
           <div class="offcanvas offcanvas-end" tabindex="-1" id="appliedjob<?php echo $job['id'];?>" aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasRightLabel">Apply job</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                          <form action="" method="POST" enctype="multipart/form-data">
                          <div>
                            <input type="hidden" name="job_id" value="<?php echo $job['id'];?>">
                          </div>
                            <div class="mb-3">
                              <label for="" class="form-lable">Resume</label>
                              <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" require>
                            </div>
                            <div>
                                <button class="btn btn-primary" name="apply_job"type="submit">Submit</button>
                            </div>
                        </form> 
                      </div>
                  </div>
            <?php
          }
         }
         ?>
    </div>
 <?php
 include "../includes/dashboard-footer.php";
 ?>
 </div>
 </div> 
</div>
<!-- <script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/script.js"></script> -->