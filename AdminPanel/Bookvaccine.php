<?php
include('php/query.php');
include('components/header.php');

// Check if user is parent
if(!isset($_SESSION['parentId'])) {
    echo "<script>location.assign('login.php')</script>";
    // exit();
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4 ">
        <div class="col-12">
            <div class="bg-light rounded vh-100 p-4">
                <h6 class="mb-4 text-center">Book an Vaccination & Hospital Appointment</h6>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Child Name</label>
                        <input type="text" class="form-control" name="childName" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Child Gender</label>
                        <select name="childGender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <!-- <option value="Other">Other</option> -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Child Age</label>
                        <input type="text" class="form-control" name="childAge" required>
                    </div>

                    <div class="mb-3">
                        <!-- <label class="form-label">Select Hospital</label> -->
                        <!-- <select name="hospitalId" class="form-control" required>
                            <option value="">Select Hospital</option>
                            <?php
                            // $query = $pdo->query("SELECT id, name FROM hospitals");
                            // while($row = $query->fetch(PDO::FETCH_ASSOC)){
                            //     echo "<option value='".$row['id']."'>".$row['name']."</option>";
                            // }
                            ?>
                        </select> -->
 
                         <select name="hospitalId" class="form-control" required>
                             <option value="">Select Hospital</option>
                            <?php
                            $query = $pdo->query("SELECT id, name FROM hospitals");
                            $hospitals = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($hospitals as $hospital){
                            ?>
                           <option value="<?php echo $hospital['id']; ?>"><?php echo $hospital['name']; ?></option>
                             <?php
                              }
                               ?>
                         </select>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Select Vaccine</label>
                        <!-- <select name="vaccineId" class="form-control" required>
                            <option value="">Select Vaccine</option>
                            <?php
                            // $query = $pdo->query("SELECT id, name FROM vaccines WHERE status='Active'");
                            // while($row = $query->fetch(PDO::FETCH_ASSOC)){
                            //     echo "<option value='".$row['id']."'>".$row['name']."</option>";
                            // }
                            ?>
                        </select> -->
                           

                        <select name="vaccineId" class="form-control" required>
                             <option value="">Select Vaccine</option>
                            <?php
                            $query = $pdo->query("SELECT id, name FROM vaccines WHERE status='Active'");
                            $vaccines = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($vaccines as $vaccine){
                            ?>
                           <option value="<?php echo $vaccine['id']; ?>"><?php echo $vaccine['name']; ?></option>
                             <?php
                              }
                               ?>
                         </select>

                         



                    </div>

                    <div class="mb-3">
                        <label class="form-label">Additional Notes</label>
                        <textarea class="form-control" name="notes" placeholder="Any special instructions?"></textarea>
                    </div>

                    <button type="submit" name="addBooking" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('components/footer.php');
?>
