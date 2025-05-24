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
     <form method="post">
                   <input type="text" name="vaccineName" class="form-control mb-4" placeholder="Vaccine Name" required>
                   <textarea name="vaccineDesc" placeholder="Vaccine Description" class="form-control mb-4" required></textarea>
                   <input type="number" name="doseNumber" placeholder="Dose Number" required class="form-control mb-4">
                   <input type="text" name="ageGroup" placeholder="Age Group" required class="form-control mb-4">
                   <input type="text" name="diseaseTargeted" placeholder="Disease Targeted (optional)" class="form-control mb-4">
                   <select name="status" required class="form-control mb-4">
                   <option value="">Select Status</option >
                   <option value="active">Active</option>
                   <option value="inactive">Inactive</option>
                   </select>
          <button type="submit" name="addVaccine" class="btn btn-primary">Add Vaccine</button>
    </form>

            </div>
        </div>
    </div>
</div>
<!-- Add Hospital Form End -->

<?php include("components/footer.php"); ?>
