<?php require "../includes/header.php"; ?>
<?php require "../config/database/admin_db.php"; ?>
<?php
$hotels = $adminDB->get_all_hotels();
if (isset($_POST["submit"])) {
  if (isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["price"]) && !empty($_POST["price"]) && isset($_POST["num_persons"]) && !empty($_POST["num_persons"]) && isset($_POST["num_beds"]) && !empty($_POST["num_beds"]) && isset($_POST["size"]) && !empty($_POST["size"]) && isset($_POST["view"]) && !empty($_POST["view"]) && isset($_POST["hotel_name"]) && $_POST["hotel_name"] != "none" && $_POST["hotel_name"] == $_POST["hotel_name_repeat"] && isset($_FILES["image"])) {
    $dir = "../../images/" . $_FILES["image"]["name"];
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $dir)) {
      $adminDB->create_room($_POST["name"], $_POST["price"], $_POST["num_persons"], $_POST["size"], $_POST["view"], $_POST["num_beds"], $_POST["hotel_name"], $_FILES["image"]["name"]);
    }
  }
}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Rooms</h5>
        <form method="POST" action="" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />

          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="file" name="image" id="form2Example1" class="form-control" />

          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />

          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="num_persons" id="form2Example1" class="form-control" placeholder="num_persons" />

          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="num_beds" id="form2Example1" class="form-control" placeholder="num_beds" />

          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="size" id="form2Example1" class="form-control" placeholder="size" />

          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="view" id="form2Example1" class="form-control" placeholder="view" />

          </div>
          <select name="hotel_name" class="form-control">
            <option value="none">Choose Hotel Name</option>
            <?php foreach ($hotels as $hotel) : ?>
              <option value="<?php echo $hotel["name"] ?>"><?php echo $hotel["name"] ?></option>
            <?php endforeach; ?>
          </select>
          <br>

          <select name="hotel_name_repeat" class="form-control">
            <option value="none">Choose Same Hotel Once Again</option>
            <?php foreach ($hotels as $hotel) : ?>
              <option value="<?php echo $hotel["name"] ?>"><?php echo $hotel["name"] ?></option>
            <?php endforeach; ?>
          </select>
          <br>

          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
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