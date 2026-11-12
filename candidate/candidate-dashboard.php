<?php
session_start();
//check user login or not
if(!isset($_SESSION['id'])){
    header('location:login.php');
    exit();
}
// Session Timeout & Destroy 

// if(isset($_SESSION['login_time']) && (time() - $_SESSION['login_time'] > 30)){
//     session_unset();     
//     session_destroy();   
//     header('location:login.php?msg=expired'); 
//     exit();
// }
// apply check for admin role(only candidate access candidate dashboard)
if(isset($_SESSION['role']) !='candidate'){
    header('location:admin/admin-dashboard.php');
    exit();
}
include '../includes/db.php';
include '../includes/dashboard-header.php';
?>

    <div class="container-fluid ">
        <div class="row">
             <div class="col-md-2 candidate-sidebar sidebar-toggle p-3">
                <?php include '../includes/candidate-sidebar.php'?>
             </div>
             <div class="col-md-10">
                 <!-- dashboard card -->
      <div class="row g-4 p-4">
         <div class="col-md-4">
            <div class="card shadow-sm text-center h-100 mt-5">
                <div class="card-body text-center p-4">
                    <h5><i class="fa-solid fa-briefcase"></i></h5>
                    <h4>Apply for job</h4>
                    <p>Apply to 6441+ jobs in India. Internshala offers the latest job vacancies opportunities to help you get hired by top companies.</p>
                    <a href="browse-job.php" class="btn btn-success">Browse Jobs</a>
                </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card shadow-sm text-center h-100 mt-5">
                <div class="card-body text-center p-4">
                    <h5><i class="fa-solid fa-window-restore"></i></h5>
                    <h4>My Application</h4>
                    <p>Apply to 6441+ jobs in India. Internshala offers the latest job vacancies opportunities to help you get hired by top companies.</p>
                    <a href="jobs.php" class="btn btn-success">View Applied Job</a>
                </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card shadow-sm text-center h-100 mt-5">
                <div class="card-body text-center p-4">
                    <h5><i class="fa-solid fa-user"></i></h5>
                    <h4>My Profile</h4>
                    <p>Apply to 6441+ jobs in India. Internshala offers the latest job vacancies opportunities to help you get hired by top companies.</p>
                    <a href="jobs.php" class="btn btn-success">View Profile</a>
                </div>
            </div>
         </div>
      </div>
      <div class="row mt-5">
           <div class="card px-0">
             <div class="card-header bg-success p-4 text-white fw-bold">Candidate Information</div>
             <div class="card-body">
                <div class="row g-3">
                     <div class="col-md-3">
                        <strong class="text-muted">Id</strong>
                        <p>CAN-<?php echo $_SESSION['id'];?></p>
                    </div>
                     <div class="col-md-3">
                        <strong class="text-muted">Name</strong>
                        <p>CAN-<?php echo $_SESSION['name'];?></p>
                     </div>
                     <div class="col-md-3">
                        <strong class="text-muted">Email</strong>
                        <p>CAN-<?php echo $_SESSION['email'];?></p>
                     </div>
                     <div class="col-md-3">
                        <strong class="text-muted">Role</strong>
                        <p>CAN-<?php echo $_SESSION['role'];?></p>
                     </div>
                   </div>
                 </div>
               </div>
              </div>
                   </div>
</div>

</div>
     
</div>
