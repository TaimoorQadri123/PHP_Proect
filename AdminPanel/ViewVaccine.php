<?php 
include('php/query.php');
include('components/header.php');

?>


  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  mx-0">
                  
                
              

                <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Vaccine Name</th>
                                            <th scope="col">Vaccine Description </th>
                                            <th scope="col">Vaccine Dose</th>
                                            <th scope="col">Vaccine Age</th>
                                            <th scope="col">Vaccine Diseased targeted</th>
                                            <th scope="col">Vaccine status</th>

                                            <th scope="col">Action</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       $query = $pdo->query("select * from vaccines");
                                       $allVaccines = $query->fetchAll(PDO::FETCH_ASSOC);
                                       foreach($allVaccines as $vaccine){
                                       ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $vaccine['name'] ?></td>
                                            <td><?php echo $vaccine['description'] ?></td>
                                            <td><?php echo $vaccine['dose'] ?></td>
                                            <td><?php echo $vaccine['age'] ?></td>
                                            <td><?php echo $vaccine['disease'] ?></td>
                                            <td><?php echo $vaccine['status'] ?></td>


                                            <td><a href="editvaccine.php?vId=<?php echo $vaccine['id'] ?>" class="btn btn-info">Edit</a></td>
                                            <td><a href="?vaccineId=<?php echo $vaccine['id']?>" class="btn btn-danger">Delete</a></td>
                                            
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

              
            </div>
            <!-- Blank End -->

<?php 
include('components/footer.php')
?>