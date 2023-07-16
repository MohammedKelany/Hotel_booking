<?php require __DIR__ . "/../includes/header.php"; ?>
<?php require __DIR__ . "/../config/databases/rooms_db.php"; ?>
<?php
if (isset($_SESSION["user_id"])) {
    $allBookings = $roomDB->get_bookings();
} else {
    header("Location: ../index.php");
}
?>
<?php if (empty($allBookings)) : ?>
    <table class="table mx-auto my-4 container">
        <thead>
            <th scope="col">check in</th>
            <th scope="col">check out</th>
            <th scope="col">email</th>
            <th scope="col">phone number</th>
            <th scope="col">full name</th>
            <th scope="col">hotel name</th>
            <th scope="col">room name</th>
            <th scope="col">status</th>
            <th scope="col">payment</th>
        </thead>
        <tbody>
            <?php foreach ($allBookings as $booking) : ?>
                <tr>
                    <td scope="row"><?php echo $booking["check_in"] ?></td>
                    <td scope="row"><?php echo $booking["check_out"] ?></td>
                    <td scope="row"><?php echo $booking["email"] ?></td>
                    <td scope="row"><?php echo $booking["phone_number"] ?></td>
                    <td scope="row"><?php echo $booking["username"] ?></td>
                    <td scope="row"><?php echo $booking["hotel_name"] ?></td>
                    <td scope="row"><?php echo $booking["room_name"] ?></td>
                    <td scope="row"><?php echo $booking["status"] ?></td>
                    <td scope="row">$<?php echo $booking["payment"] ?>.00</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <div class="alert alert-primary mx-auto my-4 container" role="alert">
        You need to add rooms first !!
    </div>
<?php endif; ?>

<?php require __DIR__ . "/../includes/footer.php"; ?>