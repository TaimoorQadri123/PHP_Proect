<?php 
include('php/query.php');
include('components/header.php');
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded mx-0">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Bookings</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Child Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Booked Hospital</th>
                                <th>Booked Vaccine</th>
                                <th>Additional Notes</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = $pdo->query("
                                SELECT 
                                    bookings.*, 
                                    hospitals.name AS hospital_name, 
                                    vaccines.name AS vaccine_name 
                                FROM bookings
                                JOIN hospitals ON bookings.hospital_id = hospitals.id
                                JOIN vaccines ON bookings.vaccine_id = vaccines.id
                            ");
                            $allbookings = $query->fetchAll(PDO::FETCH_ASSOC);
                            $i = 1;
                            foreach($allbookings as $booking){
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $booking['child_name'] ?></td>
                                <td><?php echo $booking['child_gender'] ?></td>
                                <td><?php echo $booking['child_age'] ?></td>
                                <td><?php echo $booking['hospital_name'] ?></td>
                                <td><?php echo $booking['vaccine_name'] ?></td>
                                <td><?php echo $booking['notes'] ?></td>
                                <td><?php echo $booking['status'] ?></td>

                                <td><a href="editbook.php?bId=<?php echo $booking['id'] ?>" class="btn btn-info">Edit</a></td>
                                <td><a href="?bookingId=<?php echo $booking['id']?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->

<?php 
include('components/footer.php');
?>
