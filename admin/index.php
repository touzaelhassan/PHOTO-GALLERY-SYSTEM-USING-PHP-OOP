<?php include './includes/head.php'; ?>

<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__container">
    <h4 class="dashboard__title">DASHBOARD</h4>
    <div class="dashboard__content">
      <?php

      $user = new User();
      $db_user = $user->get_users();
      echo "<pre>";
      print_r($db_user);
      echo "</pre>";

      ?>
    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>