<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="header" id="header">
<nav class="navbar navbar-expand-lg p-3">
  <div class="container">
    <a class="navbar-brand" href="#"><div class="logo"><img src="assets/images/im.png" alt="logo"></div></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav w-100 d-flex justify-content-center mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Job</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Compines</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Serivces</a>
        </li>
       </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        </form>
        <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Register</button>
    </div>
  </div>
</nav>
</header>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center w-100" id="staticBackdropLabel">Create Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div class="input-group mb-3">
          <span class="input-group-text" id="fullname"><i class="fa-solid fa-circle-user"></i></span>
              <input type="text"name="name" class="form-control" placeholder="Fullname" aria-label="Username" aria-describedby="fullname">
          </div>
          <div class="input-group mb-3">
              <span class="input-group-text" id="emailaddress"><i class="fa-solid fa-envelope"></i></span>
              <input type="text" name="email" class="form-control" placeholder="Email Address" aria-label="email" aria-describedby="emailaddress">
          </div>
          <div class="input-group mb-3">
              <span class="input-group-text" id="password"><i class="fa-solid fa-lock"></i></span>
              <input type="text"name="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="password">
          </div>
          <button class="btn btn-primary w-100" type="submit" name="register" >Register</button>
          <p class="text-center pt-3">Already have an Account ? <a href="login.php">Login</a></p>
        </form>
      </div>
    </div>
  </div>
</div>