<?php
include("dbcon.php");
session_start();

// ------------------- Add Hospital --------------------
$hospitalName = $hospitalLocation = $hospitalImage = "";
$hospitalNameErr = $hospitalLocationErr = $hospitalImageErr = "";

if (isset($_POST['addHospital'])) {
    $hospitalName = $_POST['hName'];
    $hospitalLocation = $_POST['hLocation'];
    $hospitalImage = strtolower($_FILES['hImage']['name']);
    $hospitalTmp = $_FILES['hImage']['tmp_name'];
    $extension = pathinfo($hospitalImage, PATHINFO_EXTENSION);
    $destination = "images/" . $hospitalImage;

    if (empty($hospitalName)) {
        $hospitalNameErr = "Hospital Name is required";
    }
    if (empty($hospitalLocation)) {
        $hospitalLocationErr = "Location is required";
    }
    if (empty($hospitalImage)) {
        $hospitalImageErr = "Image is required";
    } else {
        $allowed = ["jpg", "jpeg", "png", "webp", "svg"];
        if (!in_array($extension, $allowed)) {
            $hospitalImageErr = "Invalid image format";
        }
    }

    if (empty($hospitalNameErr) && empty($hospitalLocationErr) && empty($hospitalImageErr)) {
        if (move_uploaded_file($hospitalTmp, $destination)) {
            $query = $pdo->prepare("INSERT INTO hospitals (name, location, image) VALUES (:hName, :hLocation, :hImage)");
            $query->bindParam(':hName', $hospitalName);
            $query->bindParam(':hLocation', $hospitalLocation);
            $query->bindParam(':hImage', $hospitalImage);
            $query->execute();

            echo "<script>alert('Hospital added successfully'); location.assign('add-hospital.php');</script>";
        }
    }
}
// ------------------- Update Hospital --------------------
if (isset($_POST['updateHospital'])) {
    $hospitalId = $_GET['hId'];
    $hospitalName = $_POST['hName'];
    $hospitalLocation = $_POST['hLocation'];

    $query = $pdo->prepare("UPDATE hospitals SET name = :hName, location = :hLocation WHERE id = :hId");

    if (!empty($_FILES['hImage']['name'])) {
        $hospitalImage = $_FILES['hImage']['name'];
        $hospitalTmp = $_FILES['hImage']['tmp_name'];
        $extension = pathinfo($hospitalImage, PATHINFO_EXTENSION);
        $destination = "images/" . $hospitalImage;
        $allowed = ["jpg", "jpeg", "png", "webp", "svg"];

        if (in_array($extension, $allowed)) {
            if (move_uploaded_file($hospitalTmp, $destination)) {
                $query = $pdo->prepare("UPDATE hospitals SET name = :hName, location = :hLocation, image = :hImage WHERE id = :hId");
                $query->bindParam(':hImage', $hospitalImage);
            }
        } else {
            echo "<script>alert('Invalid image format')</script>";
        }
    }

    $query->bindParam(':hName', $hospitalName);
    $query->bindParam(':hLocation', $hospitalLocation);
    $query->bindParam(':hId', $hospitalId);
    $query->execute();

    echo "<script>alert('Hospital updated'); location.assign('ViewHospital.php');</script>";
}

// ------------------- Delete Hospital --------------------
// if (isset($_GET['deleteHospitalId'])) {
//     $hospitalId = $_GET['deleteHospitalId'];
//     $query = $pdo->prepare("DELETE FROM hospitals WHERE id = :hId");
//     $query->bindParam(':hId', $hospitalId);
//     $query->execute();
//     echo "<script>alert('Hospital deleted'); location.assign('manage-hospitals.php');</script>";
// }
if (isset($_GET['hospitalId'])) {
    $hospitalId = $_GET['hospitalId'];
    $query = $pdo->prepare("DELETE FROM hospitals WHERE id = :hId");
    $query->bindParam(':hId', $hospitalId);
    $query->execute();

    echo "<script>alert('Hospital deleted'); location.assign('ViewHospital.php');</script>";
}

// addVaccine work

$vaccineName = $vaccinedesc = $vaccineDose = $vaccineage = $vaccinedisease = $vaccineStatus = "";
$vaccineNameErr = $vaccinedescErr = $vaccineDoseErr = $vaccineageErr = $vaccinediseaseErr = $vaccineStatusErr= "";

if (isset($_POST['addVaccine'])) {
    $vaccineName = $_POST['vaccineName'];
    $vaccinedesc = $_POST['vaccineDesc'];
    $vaccineDose = $_POST['doseNumber'];
    $vaccineage = $_POST['ageGroup'];
    $vaccinedisease = $_POST['diseaseTargeted'];
    $vaccineStatus = $_POST['status'];

    if (empty($vaccineName)) {
        $vaccineNameErr = "vaccine Name is required";
    }
    if (empty($vaccinedesc)) {
        $vaccinedescErr = "vaccine desc is required";
    }
    if (empty($vaccineDose)) {
        $vaccineDoseErr = "vaccine Dose is required";
    }
    if (empty($vaccineage)) {
        $vaccineageErr = "vaccine age is required";
    }
    if (empty($vaccinedisease)) {
        $vaccinediseaseErr = "vaccine disease is required";
    }
    if (empty($vaccineStatus)) {
        $vaccineStatusErr = "vaccine Status is required";
    }

    if (empty($vaccineNameErr) && empty($vaccinedescErr) && empty($vaccineDoseErr) && empty($vaccineageErr) && empty($vaccinediseaseErr) && empty($vaccineStatusErr)) {

        $query = $pdo->prepare("insert into vaccines (name, description , dose , age , disease , status ) VALUES (:Vname, :Vdescription , :Vdose , :Vage , :Vdisease , :Vstatus )");
            $query->bindParam(':Vname', $vaccineName);
            $query->bindParam(':Vdescription', $vaccinedesc);
            $query->bindParam(':Vdose', $vaccineDose);
            $query->bindParam(':Vage', $vaccineage);
            $query->bindParam(':Vdisease', $vaccinedisease);
            $query->bindParam(':Vstatus', $vaccineStatus);

            $query->execute();

            echo "<script>alert('Vaccine added successfully'); location.assign('addVaccine.php');</script>";
    }
}








?>

