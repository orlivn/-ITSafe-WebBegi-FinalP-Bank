<?php
session_start();
if(!isset($_SESSION['userId'])){ header('location:login.php');}

 ?>
<!DOCTYPE html>
<html>
<head>
<title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
</head>
<body style="background:#96D678;background-size: 100%">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
    <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    <?php
    if (isset($_POST['saveAccount']))
    {
      if (!$con->query("UPDATE `useraccounts` SET `email`='$_POST[email]',`password`='$_POST[password]',`name`='$_POST[name]',`number`='$_POST[number]',`city`='$_POST[city]',`address`='$_POST[address]' WHERE `id`='$_SESSION[userId]'")) {
        echo "<div claass='alert alert-success'>Failed. Error is:".$con->error."</div>";
      }
      else
        echo "<script>alert('Update Successfull');window.location.href='accounts.php'</script>";
    
    }
    
    ?>
   <!--  <i class="d-inline-block  fa fa-building fa-fw"></i> --><?php echo bankname; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="accounts.php">Accounts</a></li>
      <li class="nav-item ">  <a class="nav-link" href="statements.php">Account Statements</a></li>
      <li class="nav-item ">  <a class="nav-link" href="transfer.php">Funds Transfer</a></li>
      <li class="nav-item ">  <a class="nav-link" href="update.php">Update Profile</a></li>
      


    </ul>
    <?php include 'sideButton.php'; ?>
    
  </div>
</nav><br><br><br>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
<div class="card-body bg-dark text-white">
    <table class="table">
      <tbody>
        <tr>
          <form method="POST">
          <th>Name</th>
          <td><input type="text" name="name" class="form-control input-sm" required></td>
          <th>Contact Number</th>
          <td><input type="number" name="number"  class="form-control input-sm" required></td>
        </tr>
        <tr>
          <th>City</th>
          <td><input type="text" name="city" class="form-control input-sm" required></td>
          <th>Address</th>
          <td><input type="text" name="address" class="form-control input-sm" required></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><input type="email" name="email" class="form-control input-sm" required></td>
          <th>Password</th>
          <td><input type="password" name="password" class="form-control input-sm" required></td>
        </tr>
        <tr>
          </td>
        </tr>
        <tr>
          <td colspan="4">
            <button type="submit" name="saveAccount" class="btn btn-primary btn-sm">Update Account</button>
          </td>
        </tr>
      </tbody>
    </table>
    

  </div>