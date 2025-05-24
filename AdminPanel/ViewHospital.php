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
                                            <th scope="col">Hospital Name</th>
                                            <th scope="col">Hospital Location</th>
                                            <th scope="col">Category Image</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       $query = $pdo->query("select * from hospitals");
                                       $allHospitals = $query->fetchAll(PDO::FETCH_ASSOC);
                                       foreach($allHospitals as $hospital){
                                       ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $hospital['name'] ?></td>
                                            <td><?php echo $hospital['location'] ?></td>
                                            <td><img height="80px" width="200px" src="images/<?php echo $hospital['image'] ?>"alt=""> </td>

                                            <td><a href="edithospital.php?hId=<?php echo $hospital['id'] ?>" class="btn btn-info">Edit</a></td>
                                            <td><a href="?hospitalId=<?php echo $hospital['id']?>" class="btn btn-danger">Delete</a></td>
                                            
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