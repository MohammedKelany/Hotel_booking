<?php require "includes/header.php"; ?>
<?php require "config/database/admin_db.php"; ?>
<?php
$admin_num = $adminDB->get_num_admin();
$hotel_num = $adminDB->get_num_hotel();
$rooms_num = $adminDB->get_num_rooms();
?>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Hotels</h5>
                <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
                <p class="card-text">number of hotels: <?php echo $hotel_num?></p>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rooms</h5>

                <p class="card-text">number of rooms: <?php echo $rooms_num?></p>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admins</h5>

                <p class="card-text">number of admins: <?php echo $admin_num?></p>

            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">

</script>
</body>

</html>