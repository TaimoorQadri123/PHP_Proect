<?php
include("php/query.php");
include("components/header.php");
// if(!isset($_SESSION['adminEmail'])){
//     echo "<script>location.assign('../login.php')</script>";
//     }
?>

<?php
if(isset($_GET['hId'])){
    $hospitalId = $_GET['hId'];
    $query = $pdo->prepare("select * from hospitals where id = :hosId");
    $query->bindParam(':hosId', $hospitalId);
    $query->execute();
    $hospital = $query->fetch(PDO::FETCH_ASSOC);
    // print_r($category); 
}
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded mx-0">
                    <div class="col-md-6 ">
                    <!-- <div class="col-sm-12 col-xl-6"> -->
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">update hospital Form</h6>
                            <form method ="post"  enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Hospital Name</label>
                                    <input value="<?php echo $hospital['name']?>" name="hName" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        <small class="text-danger"><?php echo $hospitalNameErr?></small>
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div> -->
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-control">hospital Locaion</label>

                                          <textarea name="hLocation" class="form-control" type="text" id=""><?php echo $hospital['location']?></textarea>
                                        <small class="text-danger"><?php echo $hospitalLocationErr?></small>

                                    <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Hospital Image</label>

                                    <small class="text-danger"><?php echo $hospitalImageErr?></small>
                                    <img height ="100"; src="images/<?php echo $hospital['image']?>" alt="">

                                    <input type="file" class="form-control" name ="hImage">
                                    <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                                </div>
                                <!-- <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
                                <button name="updateHospital" type="submit" class="btn btn-primary">update Hospital</button>
                            </form>
                        </div>
                    <!-- </div> -->
                    </div>
                </div>
            </div>
            <!-- Blank End -->



<?php
include("components/footer.php")
?>