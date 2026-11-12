<?php
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['name']) || !isset($_SESSION['role']) || $_SESSION['role']!=='admin'){
    header('location:login.php');
    exit();
}
include '../includes/dashboard-header.php';
?>

<!-- Sidebar Fixed -->
<div class="candidate-sidebar p-3">
  <?php include '../includes/admin-sidebar.php'?>
</div>

<!-- Main Content -->
<div class="main-admin-content">
    
    <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded shadow-sm">
        <div>
            <h5 class="mb-0 fw-bold">adminDashboard</h5>
            <small class="text-muted">Welcome, Admin (<?php echo $_SESSION['name']; ?>)</small>
        </div>
        <a href="../logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card stat-card p-3 border-0 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div><p class="text-muted mb-1">Total Jobs</p><h3 class="fw-bold">248</h3></div>
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3"><i class="fa-solid fa-briefcase fs-4"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card stat-card p-3 border-0 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div><p class="text-muted mb-1">Applications</p><h3 class="fw-bold">1,420</h3></div>
                    <div class="bg-success bg-opacity-10 text-success p-3 rounded-3"><i class="fa-solid fa-users fs-4"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card stat-card p-3 border-0 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div><p class="text-muted mb-1">Companies</p><h3 class="fw-bold">86</h3></div>
                    <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3"><i class="fa-solid fa-building fs-4"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card stat-card p-3 border-0 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div><p class="text-muted mb-1">Hired</p><h3 class="fw-bold">32</h3></div>
                    <div class="bg-info bg-opacity-10 text-info p-3 rounded-3"><i class="fa-solid fa-trophy fs-4"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card p-4 shadow-sm border-0">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="fw-bold">Recent Jobs</h5>
                    <button class="btn btn-primary btn-sm">+ Add Job</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr><th>Job Title</th><th>Company</th><th>Location</th><th>Status</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>Frontend Developer</td><td>Infosys</td><td>Chennai</td><td><span class="badge bg-success">Active</span></td><td><button class="btn btn-sm btn-outline-primary">View</button></td></tr>
                            <tr><td>PHP Developer</td><td>TCS</td><td>Bangalore</td><td><span class="badge bg-danger">Pending</span></td><td><button class="btn btn-sm btn-outline-primary">View</button></td></tr>
                            <tr><td>UI/UX Designer</td><td>Wipro</td><td>Remote</td><td><span class="badge bg-success">Active</span></td><td><button class="btn btn-sm btn-outline-primary">View</button></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div> <!-- main-admin-content close -->
</body>
</html>