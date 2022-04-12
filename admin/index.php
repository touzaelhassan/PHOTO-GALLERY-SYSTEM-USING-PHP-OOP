<?php include './includes/head.php'; ?>


<?php

if (!$session->is_signed_in()) {
  redirect("login.php");
}

?>

<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__content">
    <h1>ADMIN DASHBOARD</h1>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>