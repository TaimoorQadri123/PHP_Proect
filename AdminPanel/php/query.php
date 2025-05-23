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
// if (isset($_POST['updateHospital'])) {
//     $hospitalId = $_GET['hId'];
//     $hospitalName = $_POST['hName'];
//     $hospitalLocation = $_POST['hLocation'];

//     $query = $pdo->prepare("UPDATE hospitals SET name = :hName, location = :hLocation WHERE id = :hId");

//     if (!empty($_FILES['hImage']['name'])) {
//         $hospitalImage = $_FILES['hImage']['name'];
//         $hospitalTmp = $_FILES['hImage']['tmp_name'];
//         $extension = pathinfo($hospitalImage, PATHINFO_EXTENSION);
//         $destination = "images/" . $hospitalImage;
//         $allowed = ["jpg", "jpeg", "png", "webp", "svg"];

//         if (in_array($extension, $allowed)) {
//             if (move_uploaded_file($hospitalTmp, $destination)) {
//                 $query = $pdo->prepare("UPDATE hospitals SET name = :hName, location = :hLocation, image = :hImage WHERE id = :hId");
//                 $query->bindParam(':hImage', $hospitalImage);
//             }
//         } else {
//             echo "<script>alert('Invalid image format')</script>";
//         }
//     }

//     $query->bindParam(':hName', $hospitalName);
//     $query->bindParam(':hLocation', $hospitalLocation);
//     $query->bindParam(':hId', $hospitalId);
//     $query->execute();

//     echo "<script>alert('Hospital updated'); location.assign('manage-hospitals.php');</script>";
// }

// ------------------- Delete Hospital --------------------
// if (isset($_GET['deleteHospitalId'])) {
//     $hospitalId = $_GET['deleteHospitalId'];
//     $query = $pdo->prepare("DELETE FROM hospitals WHERE id = :hId");
//     $query->bindParam(':hId', $hospitalId);
//     $query->execute();
//     echo "<script>alert('Hospital deleted'); location.assign('manage-hospitals.php');</script>";
// }
?>
?>
