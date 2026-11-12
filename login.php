<?php
session_start();
include 'includes/db.php';
if(isset($_POST['login'])){
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    //find user by email..
    $query="select* from users where email='$email'";
    $result=mysqli_query($connect,$query);
    if(mysqli_num_rows($result)>0){
     $user=mysqli_fetch_assoc($result);
     //check password... 
     if(password_verify($password, $user['password'])){
        //store user data in session(id, name, email, role)
        $_SESSION['id']=$user['id'];
        $_SESSION['name']=$user['name'];
        $_SESSION['email']=$user['email'];
        $_SESSION['role']=$user['role']; 
        // $_SESSION['login_time'] = time();
        if($user['role']=="admin"){
            header('location:admin/admin-dashboard.php');
        }else{
            header('location:candidate/candidate-dashboard.php');
        }
     }else{
        echo "<div class='show-message'>Invalid Password !</div>";
     }
    }else{
        echo "<div class='show-message'>Invalid Email...</div>";
    }
}
include 'includes/header.php';
?>

<div class="container">
 <div class="row justify-content-center mt-5 mb-3">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-body p-4">
                <h3 class="text-center mb-5">Login page</h3>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="">password</label>
                        <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
                    </div>
                    <button type="submit" name="login" class="btn bg-primary w-100">Login</button>
                </form>
                <p class="text-center mt-2">We don't have any account ! Register</p>
            </div>
        </div>
    </div>
 </div>
</div>
<?php
include 'includes/footer.php';
?>