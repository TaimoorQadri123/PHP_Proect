<?php
include("php/query.php");
include("components/header.php");
// if(!isset($_SESSION['adminEmail'])){
//     echo "<script>location.assign('../login.php')</script>";
// }
?>

<!-- Add Hospital Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded mx-0">
        <div class="col-md-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Hospital</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label text-dark">Hospital Name</label>
                        <input value="<?php echo $hospitalName ?>" name="hName" type="text" class="form-control">
                        <small class="text-danger"><?php echo $hospitalNameErr ?></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark">Location</label>
                        <input value="<?php echo $hospitalLocation ?>" name="hLocation" type="text" class="form-control">
                        <small class="text-danger"><?php echo $hospitalLocationErr ?></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Logo</label>
                        <input type="file" name="hImage" class="form-control">
                        <small class="text-danger"><?php echo $hospitalImageErr ?></small>
                    </div>

                    <button name="addHospital" class="btn btn-primary">Add Hospital</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Hospital Form End -->

<?php include("components/footer.php"); ?>
