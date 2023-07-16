<?php require "../includes/header.php"; ?>
<?php require "../config/database/admin_db.php"; ?>
<?php
$hotel_id = $_GET["id"] ?? '';
if (isset($_POST["submit"])) {
  if (isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["description"]) && !empty($_POST["description"]) && isset($_POST["location"]) && !empty($_POST["location"])) {
    $adminDB->update_hotel_data($hotel_id, $_POST["name"], $_POST["description"], $_POST["location"]);
  }
}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Update Hotel</h5>
        <form method="POST" action="update-hotels.php?id=<?php echo $hotel_id ?>" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />

          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <div class="form-outline mb-4 mt-4">
            <label for="exampleFormControlTextarea1">Location</label>

            <input type="text" name="location" id="form2Example1" class="form-control" />

          </div>
          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


        </form>

      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">

</script>
</body>

</html>