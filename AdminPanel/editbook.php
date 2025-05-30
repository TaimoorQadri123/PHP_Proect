<?php
include('php/query.php');
include('components/header.php');

// Check if user is parent
// if(!isset($_SESSION['parentId'])) {
//     echo "<script>location.assign('login.php')</script>";
    // exit();
// }
?>

<?php
if(isset($_GET['bId'])){
    $bookingId = $_GET['bId'];
    $query = $pdo->prepare("select * from bookings where id = :bookId");
    $query->bindParam(':bookId', $bookingId);
    $query->execute();
    $booking = $query->fetch(PDO::FETCH_ASSOC);
    // print_r($category); 
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
                        <input type="text" class="form-control" name="childName" value="<?php echo $booking['child_name'] ?? ''; ?>" required>

                        <!-- <input type="text" class="form-control" name="childName" required> -->
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Child Gender</label>

                        <!-- <select name="childGender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select> -->

                     <select name="childGender" class="form-control" required>
                         <option value="">Select Gender</option>
                         <option value="Male" <?php if($booking['child_gender']=='Male') echo 'selected'; ?>>Male</option>
                         <option value="Female" <?php if($booking['child_gender']=='Female') echo 'selected'; ?>>Female</option>
                     </select>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Child Age</label>
                        <input type="text" class="form-control" name="childAge" value="<?php echo $booking['child_age'] ?? ''; ?>" required>
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
                          foreach($hospitals as $hosp){
                          ?>
                          <option value="<?php echo $hosp['id']; ?>" <?php if(isset($booking['hospital_id']) && $hosp['id'] == $booking['hospital_id']) echo 'selected'; ?>>
                              <?php echo $hosp['name']; ?>
                          </option>
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
                         foreach($vaccines as $vax){
                         ?>
                         <option value="<?php echo $vax['id']; ?>" <?php if(isset($booking['vaccine_id']) && $vax['id'] == $booking['vaccine_id']) echo 'selected'; ?>>
                             <?php echo $vax['name']; ?>
                         </option>
                         <?php
                         }
                          ?>
                     </select>


                         



                    </div>

                    <div class="mb-3">
                        <label class="form-label">Additional Notes</label>
                        <textarea class="form-control" name="notes"><?php echo $booking['notes'] ?? ''; ?></textarea>

                        <!-- <textarea class="form-control" name="notes" placeholder="Any special instructions?"></textarea> -->
                    </div>

                    <button type="submit" name="updateBooking" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('components/footer.php');
?>
