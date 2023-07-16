<?php require "database.php"; ?>
<?php

class RoomDB extends Database
{
    public function get_hotels()
    {
        $statement = $this->conn->prepare(" SELECT * FROM hotels WHERE status= 1 ");
        $statement->execute();
        $hotels = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $hotels;
    }
    public function get_rooms_by_id($hotel_id)
    {
        $statement = $this->conn->prepare(" SELECT * FROM rooms WHERE status= 1 AND hotel_id=:hotel_id ");
        $statement->bindValue("hotel_id", $hotel_id);
        $statement->execute();
        $rooms = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rooms;
    }
    public function get_room_by_id($id)
    {
        $statement = $this->conn->prepare(" SELECT * FROM rooms WHERE status= 1 AND id=:id ");
        $statement->bindValue("id", $id);
        $statement->execute();
        $room = $statement->fetch(PDO::FETCH_ASSOC);
        return $room;
    }
    public function get_rooms()
    {
        $statement = $this->conn->prepare(" SELECT * FROM rooms WHERE status= 1 ");
        $statement->execute();
        $rooms = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rooms;
    }
    public function get_room_utilities($room_id)
    {
        $statement = $this->conn->prepare(" SELECT * FROM utilities WHERE room_id=:room_id ");
        $statement->bindValue("room_id", $room_id);
        $statement->execute();
        $utilities = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $utilities;
    }
    public function get_utilities()
    {
        $statement = $this->conn->prepare("SELECT *
        FROM utilities
        GROUP BY name
        HAVING COUNT(DISTINCT name) = 1 ");
        $statement->execute();
        $utilities = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $utilities;
    }
    public function booking_room($room_id, $username, $email, $hotel_name, $user_id, $phone, $room_name, $payment, $status, $check_in, $check_out)
    {

        $statement = $this->conn->prepare("INSERT INTO
         bookings(username,email,phone_number,hotel_name,user_id,room_name,payment,status,check_in,check_out)
         VALUES(:username,:email,:phone_number,:hotel_name,:user_id,:room_name,:payment,:status,:check_in,:check_out)");
        $statement->bindValue("username", $username);
        $statement->bindValue("email", $email);
        $statement->bindValue("phone_number", $phone);
        $statement->bindValue("hotel_name", $hotel_name);
        $statement->bindValue("user_id", $user_id);
        $statement->bindValue("room_name", $room_name);
        $statement->bindValue("payment", $payment);
        $statement->bindValue("status", $status);
        $statement->bindValue("check_in", $check_in);
        $statement->bindValue("check_out", $check_out);
        $statement->execute();
        header("Location: pay.php?room_id=$room_id");
    }
    public function get_bookings()
    {
        $statement = $this->conn->prepare(" SELECT * FROM bookings WHERE user_id=:user_id ");
        $statement->bindValue("user_id", $_SESSION["user_id"]);
        $statement->execute();
        $allBookings = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $allBookings;
    }
}

$roomDB = new RoomDB();
?>