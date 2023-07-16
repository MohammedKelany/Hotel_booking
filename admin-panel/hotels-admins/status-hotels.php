<?php require "../includes/header.php"; ?>
<?php require "../config/database/admin_db.php"; ?>
<?php
$hotel_id = $_GET["id"] ?? '';
if (isset($_POST["submit"])) {
  if (isset($_POST["status"]) && $_POST["status"] != "none") {
    $adminDB->update_hotel_status($hotel_id, $_POST["status"]);
  }
}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Update Status</h5>
        <form method="POST" action="status-hotels.php?id=<?php echo $hotel_id ?>" enctype="multipart/form-data">
          <!-- Email input -->
          <select style="margin-top: 15px;" name="status" class="form-control">
            <option value="none">Choose Status</option>
            <option value="1">1</option>
            <option value="0">0</option>
          </select>
          <!-- Submit button -->
          <button style="margin-top: 10px;" type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>
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