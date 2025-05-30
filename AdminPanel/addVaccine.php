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
                <h6 class="mb-4">Add Vaccine</h6>
    <form method="post">
             
            <div>
                   <input type="text" name="vaccineName" value="<?php echo $vaccineName ?>" class="form-control mb-4" placeholder="Vaccine Name" required>
                   <small class="text-danger"><?php echo $vaccineNameErr ?></small>
                   
            </div>
            <div>
                   <textarea name="vaccineDesc" value="<?php echo $vaccinedesc ?>" placeholder="Vaccine Description" class="form-control mb-4" required></textarea>
                   <small class="text-danger"><?php echo $vaccinedescErr ?></small>
            </div>  
            <div>     
                   <input type="number" name="doseNumber" value="<?php echo $vaccineDose ?>" placeholder="Dose Number" required class="form-control mb-4">
                   <small class="text-danger"><?php echo $vaccineDoseErr ?></small>
            </div>       
            <div>
                   <input type="text" name="ageGroup" value="<?php echo $vaccineage?>" placeholder="Age Group" required class="form-control mb-4">
                   <small class="text-danger"><?php echo $vaccineageErr ?></small>
            </div>       
            <div>
                   <input type="text" name="diseaseTargeted" value="<?php echo $vaccinedisease?>" placeholder="Disease Targeted (optional)" class="form-control mb-4">
                   <small class="text-danger"><?php echo $vaccinediseaseErr ?></small>
            </div>       
            <div>
                   <select name="status" value="<?php echo $vaccineStatus?>" required class="form-control mb-4">
                   <option value="">Select Status</option >
                   <option value="active">Active</option>
                   <option value="inactive">Inactive</option>
                   </select>
                   <small class="text-danger"><?php echo $vaccineStatusErr ?></small>
            </div>       
          <button  name="addVaccine" class="btn btn-primary">Add Vaccine</button>
    </form>

            </div>
        </div>
    </div>
</div>
<!-- Add Hospital Form End -->

<?php include("components/footer.php"); ?>
