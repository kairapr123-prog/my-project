<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['id'])){
    header('location: ../login.php');
    exit();
}

$candidate_id = $_SESSION['id'];

$query = "SELECT job_application.*, jobs.title, jobs.company, jobs.job_type, jobs.technology, jobs.exeperience, jobs.location, jobs.salary, job_application.status 
      FROM jobs 
      INNER JOIN job_application ON jobs.id = job_application.job_id 
      WHERE job_application.user_id = '$candidate_id'";

$result= mysqli_query($connect, $query);
?>
<style>
    h2{
        text-align:center;
    }
 .card{
    background:rgba(11, 51, 119, 0.58);
    color:black;
    width:300px;
    padding:25px;
    margin:10px;
    float:left;
    box-shadow:0px, 0px, 0px, 0.5px #fff;
    border-radius:5px;
    border:2px solid black;
    align-items:center;

}
.card:hover{
 transform: translateY(-10px);
 box-shadow: 0 10px 30px rgba(29, 47, 79, 0.15);
}
.card h3{
    margin:5px 0;
}
.card p
{
    margin:6px 0;
   font-size:20px;
}
.card button{
    background:#00a8ff;
    color:white;
    border:none;
    padding:5px 15px;
    margin-top:10px;
    border-radius:5px;
} 
.card button:hover{
    background:blue;
}
</style>
<h2>My Applied Jobs</h2>

<?php
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>
<div class="card">
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['company']; ?></p>
    <hr>
    <p><b>Job Type :</b> <?php echo $row['job_type']; ?></p>
    <p><b>Required Technology :</b> <?php echo $row['technology']; ?></p>
    <p><b>Experience :</b> <?php echo $row['exeperience']; ?></p>
    <p><b>Location :</b> <?php echo $row['location']; ?></p>
    <p><b>Salary :</b> <?php echo $row['salary']; ?></p>
    <p><b>Status :</b> <?php echo $row['status']; ?></p>
   <a href="<?php echo $row['resume ']; ?>">Resume</a>
    <button>Applied</button>
</div>
<?php
    }
} else {
    echo "No jobs applied";
}
?>
