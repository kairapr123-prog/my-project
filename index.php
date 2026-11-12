<?php
include 'includes/db.php';

$message="";
if(isset($_POST['register'])){
  $name=trim($_POST['name']) ?? "";
  $email=trim($_POST['email']) ?? "";
  $password=trim($_POST['password']) ?? "";
  $role="candidate";
  //check email already exist or not in user table
  $checkEmail="select* from users where email='$email'";
  $checkResult=mysqli_query($connect, $checkEmail);
  //validation
  if(empty($name) || empty($email) || empty($password)){
    $message="All fields are required";
  }elseif(!preg_match("/^[A-Za-z ]+$/", $name)){
    $message="Only letters are allowed in Name";
  }elseif(!preg_match("/^[a-z0-9]+@[a-z]+.[a-z]+$/", $email)){
    $message="Invalid Email Format";
  }elseif(!preg_match("/^[A-Za-z\d@$!%*?&]{6}+$/", $password)){
    $message="Password must be at least 6 characters";
  }elseif(mysqli_num_rows($checkResult)>0){
    $message="Email Already Registered";
  }else{
  
    // hash password
    $hashpassword=password_hash($password,PASSWORD_DEFAULT);
    $query="INSERT INTO users(name,email,password,role)values('$name','$email','$hashpassword','$role')";
    $res=mysqli_query($connect,$query);
    if($res){
      $message="Registration Successfully!";
       header('location:login.php');
       exit();
    }else{
      $message="Faild !,you can try again";
    }
  }
 }
include 'includes/header.php';
?>
<?php
if($message!=""){
  ?>
  <div class='alert alert-info' id="show-smg">
    <?php echo $message; ?>
  </div>
  <?php
}
?>
<main>
  <!-- section 1 start -->
<section class="hiring-section">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="hiring-box">
          <div class="hiring-left">
            <h2>See who's hiring in <br> your area.</h2>
            <p>Chat to people on public transport, connect on social media <br> and be courageous for networking success.</p>
            <div class="btn-group">
              <a href="#" class="btn-orange">APPLY JOB</a>
              <a href="#" class="btn-dark">SEE ALL COMPANIES</a>
            </div>
          </div>
          <div class="hiring-right">
            <img src="assets/images/img2.png" alt="hiring">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- section 1 end -->
 
 <!-- section 2 start -->
   <section class="popular-categories py-5 bg-light">
  <div class="container">
    <!-- Heading Row -->
    <div class="row">
      <div class="col-12 text-center mb-5">
        <h2 class="fw-bold">Popular Job Categories</h2>
        <div class="d-flex justify-content-center gap-2 mt-2">
          <span style="width: 30px; height: 3px; background: #0d1b3d; display:inline-block;"></span>
          <span style="width: 30px; height: 3px; background: #0d1b3d; display:inline-block;"></span>
        </div>
      </div>
    </div>

    
    <div class="row g-4">
      <div class="col-xl-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-sm text-center p-4">
          <div class="mb-3 fs-2 text-primary"><i class="fa-solid fa-person-dots-from-line"></i></div>
          <h6 class="fw-bold text-primary">Accounting</h6>
          <div class="mx-auto my-2" style="width: 30px; height: 2px; background: #0d1b3d;"></div>
          <p class="small text-muted">You can find your best job in accounting</p>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-sm text-center p-4">
          <div class="mb-3 fs-2 text-primary"><i class="fa-solid fa-chart-pie"></i></div>
          <h6 class="fw-bold text-primary">Automotive</h6>
          <div class="mx-auto my-2" style="width: 30px; height: 2px; background: #0d1b3d;"></div>
          <p class="small text-muted">You can find your best job in automotive</p>
        </div>
      </div>
    
      <div class="col-xl-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-sm text-center p-4">
          <div class="mb-3 fs-2 text-primary"><i class="fa-solid fa-shop"></i></div>
          <h6 class="fw-bold text-primary">Constructions</h6>
          <div class="mx-auto my-2" style="width: 30px; height: 2px; background: #0d1b3d;"></div>
          <p class="small text-muted">You can find your job in constructions</p>
        </div>
      </div>
      
      <div class="col-xl-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-sm text-center p-4">
          <div class="mb-3 fs-2 text-primary"><i class="fa-solid fa-phone-volume"></i></div>
          <h6 class="fw-bold text-primary">Design Art</h6>
          <div class="mx-auto my-2" style="width: 30px; height: 2px; background: #0d1b3d;"></div>
          <p class="small text-muted">You can find your best job in design art</p>
        </div>
      </div>
     
      <div class="col-xl-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-sm text-center p-4">
          <div class="mb-3 fs-2 text-primary"><i class="fa-solid fa-truck-field"></i></div>
          <h6 class="fw-bold text-primary">Food Services</h6>
          <div class="mx-auto my-2" style="width: 30px; height: 2px; background: #0d1b3d;"></div>
          <p class="small text-muted">You can find your job in food services</p>
        </div>
      </div>
     
      <div class="col-xl-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-sm text-center p-4">
          <div class="mb-3 fs-2 text-primary"><i class="fa-solid fa-pen-clip"></i></div>
          <h6 class="fw-bold text-primary">Leisure & Tourism</h6>
          <div class="mx-auto my-2" style="width: 30px; height: 2px; background: #0d1b3d;"></div>
          <p class="small text-muted">You can find your job in leisure tourism</p>
        </div>
      </div>
      
      <div class="col-xl-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-sm text-center p-4">
          <div class="mb-3 fs-2 text-primary"><i class="fa-solid fa-truck-front"></i></div>
          <h6 class="fw-bold text-primary">Marketing & PR</h6>
          <div class="mx-auto my-2" style="width: 30px; height: 2px; background: #0d1b3d;"></div>
          <p class="small text-muted">You can find your best job in marketing</p>
        </div>
      </div>
      
      <div class="col-xl-3 col-md-6 col-sm-12">
        <div class="card h-100 border-0 shadow-sm text-center p-4">
          <div class="mb-3 fs-2 text-primary"><i class="fa-solid fa-laptop"></i></div>
          <h6 class="fw-bold text-primary">Media</h6>
          <div class="mx-auto my-2" style="width: 30px; height: 2px; background: #0d1b3d;"></div>
          <p class="small text-muted">You can find your best job in art & media</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center mt-5">
        <a href="#" class="btn btn-primary px-4">View all Specialisms</a>
      </div>
    </div>
  </div>
</section>
   <!-- section 2 end -->

   <!-- section 3 start -->
    <section class="blog-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="blog-heading">
          <h2>Latest Blog Posts</h2>
          <div class="heading-lines">
            <span></span><span></span>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-4">
    
      <div class="col-xl-4 col-md-6">
        <div class="blog-card">
          <div class="blog-img">
            <img src="assets/images/img.jpeg" alt="blog">
            <div class="blog-avatar">
              <i class="fa-solid fa-circle-user"></i>
            </div>
          </div>
          <div class="blog-content">
            <p class="blog-meta"><strong>studio-admin</strong> November 23, 2015</p>
            <h4>Experience Writing For Producing</h4>
            <p class="blog-desc">Ravenously while stridently coughed far promiscuously below jeez much yikes bland that salamander cunningly some over abhorrent as..</p>
          </div>
          <div class="blog-plus">
            <a href="#"><i class="fa-solid fa-circle-user"></i></i></a>
          </div>
        </div>
      </div>

   
      <div class="col-xl-4 col-md-6">
        <div class="blog-card">
          <div class="blog-img">
            <img src="assets/images/img1.jpeg" alt="blog">
            <div class="blog-avatar">
              <i class="fa-solid fa-circle-user"></i>
            </div>
          </div>
          <div class="blog-content">
            <p class="blog-meta"><strong>studio-admin</strong> November 23, 2015</p>
            <h4>New York Is Leading The Nation</h4>
            <p class="blog-desc">Ravenously while stridently coughed far promiscuously below jeez much yikes bland that salamander cunningly some over abhorrent as..</p>
          </div>
          <div class="blog-plus">
            <a href="#"><i class="fa-solid fa-circle-user"></i></a>
          </div>
        </div>
      </div>

      
      <div class="col-xl-4 col-md-6">
        <div class="blog-card">
          <div class="blog-img">
            <img src="assets/images/img2.jpeg" alt="blog">
            <div class="blog-avatar">
              <i class="fa-solid fa-circle-user"></i>
            </div>
          </div>
          <div class="blog-content">
            <p class="blog-meta"><strong>studio-admin</strong> November 23, 2015</p>
            <h4>An Overworked Newspaper Editor</h4>
            <p class="blog-desc">Ravenously while stridently coughed far promiscuously below jeez much yikes bland that salamander cunningly some over abhorrent as..</p>
          </div>
          <div class="blog-plus">
            <a href="#"><i class="fa-solid fa-circle-user"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- section 3 end -->

<!-- how it work section 4-->
<section class="how-work-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="how-heading">
          <h2>How It Work</h2>
          <div class="heading-lines">
            <span></span><span></span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="how-steps">
         
          <div class="how-step">
            <p class="step-label">First Step</p>
            <div class="step-circle">
            <i class="fa-solid fa-circle-check"></i>
            </div>
            <p class="step-title">Register With Us</p>
          </div>
         
          <div class="how-step">
            <p class="step-label">Second Step</p>
            <div class="step-circle">
              <i class="fa-solid fa-circle-user"></i>
            </div>
            <p class="step-title">Create Your Profile</p>
          </div>
         
          <div class="how-step">
            <p class="step-label">Third Step</p>
            <div class="step-circle">
              <i class="fa-solid fa-upload"></i>
            </div>
            <p class="step-title">Upload Your Resume</p>
          </div>
         
          <div class="how-step">
            <p class="step-label">Now Its our turn</p>
            <div class="step-circle">
              <i class="fa-solid fa-mug-hot"></i>
            </div>
            <p class="step-title">Now Take a rest</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


 <!-- testimonial section 5-->
<section class="testimonial-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="testimonial-box">
          <div class="testimonial-img">
            <img src="assets/images/im3.jpeg" alt="user">
          </div>
          <h4>Jesus Christ</h4>
          <p class="company">Music Company</p>
          <p class="testimonial-text">We are a group of entrepreneurs brought together to provide a differentiated approach to the recruiting industry. We are a group of entrepreneurs brought together to provide a differentiated approach.</p>
          <div class="testimonial-line"></div>
          <div class="testimonial-dots">
            <span></span><span></span><span class="active"></span><span></span><span></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- section 5 end -->
 <!-- Companies we'venhelped section 6 -->
<section class="companies-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="companies-heading">
          <h2>Companies We've Helped</h2>
          <div class="heading-lines">
            <span></span><span></span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="companies-logos">
          <div class="company-logo"><span style="color:#2a9d8f; font-weight:700;">Zim</span> HOME</div>
          <div class="company-logo">JBN <span style="color:#a8c686;">CONSEILS</span></div>
          <div class="company-logo" style="letter-spacing:5px; font-weight:700;">ULOUR</div>
          <div class="company-logo"><span style="color:red;"></span> roundTable</div>
          <div class="company-logo" style="font-weight:700;">flipbook</div>
          <div class="company-logo" style="font-weight:700;">varela</div>
        </div>
      </div>
    </div>
  </div>
</section>
</main>
<?php
include 'includes/footer.php';
?>