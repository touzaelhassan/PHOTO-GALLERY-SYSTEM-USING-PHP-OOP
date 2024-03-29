<?php include './includes/head.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php $photos = Photo::get_photos(); ?>

<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__container">
    <h4 class="dashboard__title">PHOTOS</h4>
    <div class="dashboard__content">
      <table class="table table-bordered table__photos">
        <thead>
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Size</th>
            <th>View</th>
            <th>Comments</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($photos as $photo) : ?>
            <tr>
              <td><?php echo $photo->photo_id; ?></td>
              <td><?php echo $photo->photo_title; ?></td>
              <td><img src="<?php echo Photo::$upload_directory . "/" . $photo->photo_file_name; ?>" class="table__photo"></td>
              <td><?php echo $photo->photo_file_name; ?></td>
              <td><?php echo $photo->photo_size; ?></td>
              <td><a href="../photo.php?photo_id=<?php echo $photo->photo_id; ?>" class="btn btn-primary btn-sm">VIEW</a></td>
              <td>
                <a href="photo_comments.php?photo_id=<?php echo $photo->photo_id; ?>">
                  <?php echo count(Comment::get_comments_photo_id($photo->photo_id)) ?>
                </a>
              </td>
              <td><a href="edit_photo.php?photo_id=<?php echo $photo->photo_id; ?>" class="btn btn-success btn-sm">UPDATE</a></td>
              <td><a href="delete_photo.php?photo_id=<?php echo $photo->photo_id; ?>" class="btn btn-danger btn-sm">DELETE</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>