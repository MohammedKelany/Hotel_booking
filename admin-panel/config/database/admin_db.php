<?php require "database.php"; ?>
<?php
class AdminDB extends Database
{
    function get_num_hotel()
    {
        $statement = $this->conn->prepare("SELECT COUNT(*) AS num FROM hotels");
        $statement->execute();
        $num = $statement->fetch(PDO::FETCH_ASSOC);
        return $num["num"];
    }
    function get_num_admin()
    {
        $statement = $this->conn->prepare("SELECT COUNT(*) AS num FROM admins");
        $statement->execute();
        $num = $statement->fetch(PDO::FETCH_ASSOC);
        return $num["num"];
    }
    function get_num_rooms()
    {
        $statement = $this->conn->prepare("SELECT COUNT(*) AS num FROM rooms");
        $statement->execute();
        $num = $statement->fetch(PDO::FETCH_ASSOC);
        return $num["num"];
    }

    function get_all_admins()
    {
        $statement = $this->conn->prepare("SELECT * FROM admins");
        $statement->execute();
        $admins = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $admins;
    }
    function get_all_bookings()
    {
        $statement = $this->conn->prepare("SELECT * FROM bookings");
        $statement->execute();
        $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $bookings;
    }
    function get_all_hotels()
    {
        $statement = $this->conn->prepare("SELECT * FROM hotels");
        $statement->execute();
        $hotels = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $hotels;
    }
    function update_hotel_status($id, $status)
    {
        $statement = $this->conn->prepare("UPDATE hotels SET status=:status WHERE id =:id ");
        $statement->execute([
            ":id" => $id,
            ":status" => $status,
        ]);
        header("Location: show-hotels.php");
    }
    function update_hotel_data($id, $name, $description, $location)
    {
        $statement = $this->conn->prepare("UPDATE hotels SET description=:description,name=:name,location=:location WHERE id =:id ");
        $statement->execute([
            ":id" => $id,
            ":name" => $name,
            ":description" => $description,
            ":location" => $location,
        ]);
        header("Location: show-hotels.php");
    }
    function create_hotel($name, $description, $location, $image)
    {
        $statement = $this->conn->prepare("INSERT INTO hotels(name,description,location,image) VALUES(:name,:description,:location,:image)");
        $statement->execute([
            ":name" => $name,
            ":description" => $description,
            ":location" => $location,
            ":image" => $image,
        ]);
        header("Location: show-hotels.php");
    }
    function delete_hotel($id)
    {
        $statement = $this->conn->prepare("DELETE FROM hotels WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        header("Location: show-hotels.php");
    }
    function create_room($name, $price, $num_person, $size, $view, $num_bed, $hotel_name, $image)
    {
        $statement = $this->conn->prepare("INSERT INTO rooms(name,price,max_num,size,view,bed_num,hotel_name,image) VALUES(:name,:price,:max_num,:size,:view,:bed_num,:hotel_name,:image)");
        $statement->execute([
            ":name" => $name,
            ":price" => $price,
            ":max_num" => $num_person,
            ":image" => $image,
            ":size" => $size,
            ":view" => $view,
            ":bed_num" => $num_bed,
            ":hotel_name" => $hotel_name,
        ]);
        header("Location: show-rooms.php");
    }
    function update_room_status($id, $status)
    {
        $statement = $this->conn->prepare("UPDATE rooms SET status=:status WHERE id =:id ");
        $statement->execute([
            ":id" => $id,
            ":status" => $status,
        ]);
        header("Location: show-rooms.php");
    }
    function delete_room($id)
    {
        $statement = $this->conn->prepare("DELETE FROM rooms WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        header("Location: show-rooms.php");
    }
    function get_all_rooms()
    {
        $statement = $this->conn->prepare("SELECT * FROM rooms");
        $statement->execute();
        $rooms = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rooms;
    }
    function delete_booking($id)
    {
        $statement = $this->conn->prepare("DELETE FROM bookings WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        header("Location: show-bookings.php");
    }
}
$adminDB = new AdminDB();
?>