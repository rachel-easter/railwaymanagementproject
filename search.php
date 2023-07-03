<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve user input
    $from = $_POST["from"];
    $to = $_POST["to"];

    // Perform database query to retrieve matching train routes
    $conn = new mysqli("localhost", "root", "root", "book");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT *
        FROM trains 
        WHERE from_station = '$from' AND to_station = '$to'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display table header
        echo "<table class='spt' border= 2px >";
        echo "<tr>";
        echo "<th>Train No</th>";
        echo "<th>Train Name</th>";
        echo "<th>Time</th>";
        echo "<th>Cost</th>";
        echo "<th>From</th>";
        echo "<th>To</th>";
        echo "<th>General Seats</th>";
        echo "<th>Reserved Seats</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        // Display table rows with train routes
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["TrainNo"] . "</td>";
            echo "<td>" . $row["TrainName"] . "</td>";
            echo "<td>" . $row["Time"] . "</td>";
            echo "<td>" . $row["Cost"] . "</td>";
            echo "<td>" . $row["from_station"] . "</td>";
            echo "<td>" . $row["to_station"] . "</td>";
            echo "<td>" . $row["GeneralSeats"] . "</td>";
            echo "<td>" . $row["ReservedSeats"] . "</td>";
            echo "<td><a href='bookings.php?train_id=" . $row["TrainNo"] . "'>Book Now</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No available trains found.";
    }

    $conn->close();
}
?>
