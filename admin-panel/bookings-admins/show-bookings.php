<?php require "../includes/header.php"; ?>
<?php require "../config/database/admin_db.php"; ?>
<?php
$bookings = $adminDB->get_all_bookings();
?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Bookings</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">check in</th>
                            <th scope="col">check out</th>
                            <th scope="col">email</th>
                            <th scope="col">phone number</th>
                            <th scope="col">full name</th>
                            <th scope="col">hotel name</th>
                            <th scope="col">room name</th>
                            <th scope="col">status</th>
                            <th scope="col">payment</th>
                            <th scope="col">created at</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookings as $booking) : ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo $booking["check_in"] ?></td>
                            <td><?php echo $booking["check_out"] ?></td>
                            <td><?php echo $booking["email"] ?></td>
                            <td><?php echo $booking["phone_number"] ?></td>
                            <td><?php echo $booking["username"] ?></td>
                            <td><?php echo $booking["hotel_name"] ?></td>
                            <td><?php echo $booking["room_name"] ?></td>
                            <td><?php echo $booking["status"] ?></td>
                            <td>$<?php echo $booking["payment"] ?></td>
                            <td><?php echo $booking["created_at"] ?></td>

                            <td><a href="delete-booking.php?id=<?php echo $booking["id"]?>"
                                    class="btn btn-danger  text-center ">delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



</div>
<script type="text/javascript">

</script>
</body>

</html>