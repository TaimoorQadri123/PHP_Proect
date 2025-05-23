

<?php
include("dbcon.php");
session_start();

// ---------- REGISTER ----------
$userName = $userEmail = $userPassword = $userConfirmPassword = "";
$userNameErr = $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "";

if (isset($_POST['registerUser'])) {
    $userName = $_POST['uName'];
    $userEmail = $_POST['uEmail'];
    $userPassword = $_POST['uPassword'];
    $userConfirmPassword = $_POST['uConfirmPassword'];
    // $userRole = $_POST['uRole'] ?? 2; // Default: Parent

    if (empty($userName)) {
        $userNameErr = "Name is Required";
    }
    if (empty($userEmail)) {
        $userEmailErr = "Email is Required";
    } else {
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :uEmail");
        $query->bindParam('uEmail', $userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $userEmailErr = "Email is already Exist";
        }
    }

    if (empty($userPassword)) {
        $userPasswordErr = "Password is Required";
    }
    if (empty($userConfirmPassword)) {
        $userConfirmPasswordErr = "Confirm Password is Required";
    } else {
        if ($userPassword != $userConfirmPassword) {
            $userConfirmPasswordErr = "Password not matched";
        }
    }

    if (empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userConfirmPasswordErr)) {
        $query = $pdo->prepare("INSERT INTO users(name, email, password, role_id) VALUES (:uName, :uEmail, :uPassword, :uRole)");
        $query->bindParam('uName', $userName);
        $query->bindParam('uEmail', $userEmail);
        $query->bindParam('uPassword', $userPassword);
        $query->bindParam('uRole', $userRole);
        $query->execute();

        echo "<script>alert('User registered successfully'); location.assign('login.php');</script>";
    }
}


// ---------- LOGIN ----------
$userEmailErr = $userPasswordErr = "";
$userEmail = $userPassword = "";

if (isset($_POST['login'])) {
    $userEmail = $_POST['uEmail'];
    $userPassword = $_POST['uPassword'];

    if (empty($userEmail)) {
        $userEmailErr = "Email is Required";
    } else {
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :uEmail");
        $query->bindParam(':uEmail', $userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if($user['password'] == $userPassword){
                if($user['role_id'] == 1){
                    $_SESSION['adminId'] = $user['id'];
                    $_SESSION['adminEmail'] = $user['email'];
                    $_SESSION['adminName'] = $user['name'];
                    $_SESSION['adminRole'] = $user['role_id'];

                    echo "<script>location.assign('adminPanel/index.php?success=login successfully admin')</script>";
                }
                else if($user['role_id'] == 2){
                    $_SESSION['parentId'] = $user['id'];
                    $_SESSION['parentEmail'] = $user['email'];
                    $_SESSION['parentName'] = $user['name'];
                    $_SESSION['parentRole'] = $user['role_id'];

                    echo "<script>location.assign('adminPanel/index.php?success=login successfully parent')</script>";
                }
                else if($user['role_id'] == 3){
                    $_SESSION['hospitalId'] = $user['id'];
                    $_SESSION['hospitalEmail'] = $user['email'];
                    $_SESSION['hospitalName'] = $user['name'];
                    $_SESSION['hospitalRole'] = $user['role_id'];

                    echo "<script>location.assign('adminPanel/index.php?success=login successfully hospital')</script>";
                }
            }
             else {
                $userPasswordErr = "Password does not match";
            }
        } else {
            $userEmailErr = "User not found";
        }
    }

    if (empty($userPassword)) {
        $userPasswordErr = "Password is required";
    }
}
?>


