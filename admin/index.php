<?php
session_start();
include('../database/connection.php');
// cek sesi
if (isset($_SESSION['logged_in'])) {
    header('Location: dashboard.php');
    die();
}

$status = "";
// cek post
if (isset($_POST['username'])) {
    //cek username
    $queryCekUser = "SELECT * FROM admin WHERE username = '" . $_POST['username'] . "'";
    $resultCekUser = mysqli_query(connection(), $queryCekUser);
    $dataCekUser = mysqli_fetch_array($resultCekUser);
    if ($dataCekUser) {
        // verif password
        if (password_verify($_POST['password'], $dataCekUser['password'])) {
            $_SESSION['logged_in'] = array(
                'id' => $dataCekUser['id_admin'],
                'user' => $dataCekUser['username'],
            );
            header('Location: dashboard.php');
        } else {
            $status = "err";
        }
    } else {
        $status = "err";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Logo -->
    <link rel="icon" href="../image/logoatas.png" type="image/x-icon" />

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin.css" />
</head>

<body>
    <div class="container-login">
        <div class="layer-1"></div>
        <div class="layer-2"></div>
        <div class="login-boxs">
            <?php
            if ($status == "err") {
                echo '<div class="alert alert-danger">
                                <p><strong>Username</strong> atau <strong>Password</strong>  salah!</p>
                                <button type="button" onclick="closeAlert(this)" class="btn-close">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>';
            }
            ?>
            <div class="login-box">
                <h2>Login as Admin</h2>
                <form action="" method="post">
                    <div class="input-group">
                        <span class="input-group-icon" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                        <input class="input-form-login" type="text" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-icon" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                        <input class="input-form-login" type="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" />
                    </div>
                    <div class="button-box w-100 d-flex justify-content-center mt-5">
                        <button type="submit" class="button button-login">Login</button>
                    </div>
                </form>
            </div>
            <img class="logo-login" src="../image/logo2.png" alt="logo2">
        </div>
    </div>

    <!-- Close alert -->
    <script src="../javascript/closeAlert.js"></script>

    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/ee9e0f07f2.js" crossorigin="anonymous"></script>
</body>

</html>
<?php //} 
?>