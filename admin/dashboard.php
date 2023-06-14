<?php
ob_start();
session_start();
include "../database/connection.php";
if (empty($_SESSION['logged_in'])) {
  header('Location: index.php');
  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>

  <!-- Logo -->
  <link rel="icon" href="../image/logoatas.png" type="image/x-icon" />

  <!-- CSS -->
  <link rel="stylesheet" href="../css/admin.css" />
</head>

<body>
  <div class="grid-dashboard">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="image-box">
        <img src="../image/logo2.png" alt="logo" />
      </div>

      <!-- menu -->
      <div class="menu-box">
        <ul class="menu-list">
          <li class="menu-item">
            <a class="menu-link <?= (empty($_GET['page']) ? 'active' : '') ?>" href="./"><i class="fa-solid fa-house me-3 ps-2"></i>Dashboard</a>
          </li>
          <li class="menu-item">
            <a class="menu-link <?= (isset($_GET['page']) && $_GET['page'] == 'addAdmin' ? 'active' : '') ?>" href="?page=addAdmin"><i class="fa-solid fa-user-gear me-3 ps-2"></i>Admin</a>
          </li>
          <li class="menu-item dropdown">
            <a class="menu-link <?= (isset($_GET['page']) && ($_GET['page'] == 'addProperty' || $_GET['page'] == 'showProperty' || $_GET['page'] == 'detailProperty') ? 'active' : '') ?>" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-building-circle-check me-3 ps-2"></i>Property</a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-link" href="?page=addProperty">Insert Property</a>
              </li>
              <li>
                <a class="dropdown-link" href="?page=showProperty">Show Property</a>
              </li>
            </ul>
          </li>
          <li class="menu-item dropdown">
            <a class="menu-link <?= (isset($_GET['page']) && ($_GET['page'] == 'addSale' || $_GET['page'] == 'showSale' || $_GET['page'] == 'detailPenjualan') ? 'active' : '') ?>" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-cart-shopping me-3 ps-2"></i>Sale</a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-link" href="?page=addSale">Insert Sale</a>
              </li>
              <li>
                <a class="dropdown-link" href="?page=showSale">Show Sale</a>
              </li>
            </ul>
          </li>
          <li class="menu-item dropdown">
            <a class="menu-link <?= (isset($_GET['page']) && ($_GET['page'] == 'addAgent' || $_GET['page'] == 'showAgent') ? 'active' : '') ?>" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user me-3 ps-2"></i>Agent</a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-link" href="?page=addAgent">Insert Agent</a>
              </li>
              <li>
                <a class="dropdown-link" href="?page=showAgent">Show Agent</a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="menu-list">
          <li class="menu-item">
            <a class="menu-link" href="dashboard.php?page=logout"><i class="fa-solid fa-right-from-bracket me-3 ps-2"></i>Logout</a>
          </li>
        </ul>
      </div>
      <!-- Akhir menu -->
    </div>
    <!-- Akhir saidbar -->

    <!-- Content -->
    <div class="main col-10 p-0">
      <div class="container-content m-5">
        <?php
        if (isset($_GET['page'])) {
          switch ($_GET['page']) {
            case 'addAdmin':
              include 'addAdmin.php';
              break;
            case 'addProperty':
              include 'properti/addProperty.php';
              break;
            case 'showProperty':
              include 'properti/showProperty.php';
              break;
            case 'detailProperty':
              include 'properti/detailProperty.php';
              break;
            case 'updateProperty':
              include 'properti/updateProperty.php';
              break;
            case 'addSale':
              include 'penjualan/addSale.php';
              break;
            case 'showSale':
              include 'penjualan/showSale.php';
              break;
            case 'detailPenjualan':
              include 'penjualan/detailPenjualan.php';
              break;
            case 'updateSale':
              include 'penjualan/updateSale.php';
              break;
            case 'addAgent':
              include 'agen/addAgent.php';
              break;
            case 'showAgent':
              include 'agen/showAgent.php';
              break;
            case 'updateAgent':
              include 'agen/updateAgent.php';
              break;
            case 'logout':
              session_destroy();
              header('location: index.php');
              break;
            default:
              include 'main.php';
              break;
          }
        } else {
          include 'main.php';
        }
        ?>
      </div>
    </div>
    <!-- Akhir content -->
  </div>

  <!-- Close alert -->
  <script src="../javascript/closeAlert.js"></script>

  <!-- Fontawsome -->
  <script src="https://kit.fontawesome.com/ee9e0f07f2.js" crossorigin="anonymous"></script>
</body>

</html>