<?php require __DIR__ . "/includes/header.php"; ?>
<?php require __DIR__ . "/config/databases/rooms_db.php"; ?>

<?php
if (isset($_GET["hotel_id"])) {
    $rooms = $roomDB->get_rooms_by_id($_GET["hotel_id"]);
} else {
    header("Location: 404.php");
}
?>


<section class="hero-wrap hero-wrap-2" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Rooms <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Apartment Room</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">
            <?php foreach ($rooms as $room) : ?>
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="#" class="img" style="background-image: url(images/room-1.jpg);"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                <p class="mb-0"><span class="price mr-1">$<?php echo $room["price"] ?>.00</span> <span class="per">per night</span>
                                </p>
                                <h3 class="mb-3"><a href="rooms.php"><?php echo $room["name"] ?></a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Max:</span> <?php echo $room["max_num"] ?> Persons</li>
                                    <li><span>Size:</span> <?php echo $room["size"] ?></li>
                                    <li><span>View:</span> <?php echo $room["view"] ?></li>
                                    <li><span>Bed:</span> <?php echo $room["bed_num"] ?></li>
                                </ul>
                                <p class="pt-1"><a href="rooms/room-single.php?room_id=<?php echo $room["id"] ?>" class="btn-custom px-3 py-2">View Room
                                        Details
                                        <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . "/includes/footer.php"; ?>