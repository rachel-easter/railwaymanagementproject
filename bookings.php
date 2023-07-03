<?php
// ...

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["train_id"])) {
        $trainId = $_GET["train_id"];

        // Connect to the database
        $conn = new mysqli("localhost", "root", "root", "book");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve train details from the database
        $sql = "SELECT TrainNo, TrainName, Time, Cost, from_station, to_station, GeneralSeats, ReservedSeats FROM trains WHERE TrainNo = '$trainId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $trainName = $row["TrainName"];
            $time = $row["Time"];
            $cost = $row["Cost"];
            $fromStation = $row["from_station"];
            $toStation = $row["to_station"];
            $generalSeats = $row["GeneralSeats"];
            $reservedSeats = $row["ReservedSeats"];
            echo "<html>";
            echo "<head>";
            echo "<style>";
            echo "
                body {
                    font-family: Arial, serif;
                    background-color: #f2f2f2;
                }
                h1 {
                    color: #333;
                    font-size: 24px;
                    margin-bottom: 10px;
                }
                p {
                    margin: 0;
                    line-height: 1.5;
                }
                label {
                    display: block;
                    margin-bottom: 5px;
                }
                input[type='text'], select {
                    padding: 5px;
                    border: 1px solid #ccc;
                    border-radius: 3px;
                    width: 200px;
                    margin-bottom: 10px;
                }
                input[type='submit'] {
                    padding: 10px 20px;
                    background-color: #333;
                    color: #fff;
                    border: none;
                    border-radius: 3px;
                    cursor: pointer;
                }
            ";
            echo "</style>";
            echo "</head>";
            echo "<body>";

            // Display train details and seat selection form
            echo "<h1>Train Details</h1>";
            echo "<p>Train Name: $trainName</p>";
            echo "<p>Time: $time</p>";
            echo "<p>Cost: $cost</p>";
            echo "<p>From: $fromStation</p>";
            echo "<p>To: $toStation</p>";
            echo "<p>Available General Seats: $generalSeats</p>";
            echo "<p>Available Reserved Seats: $reservedSeats</p>";

            
            echo "<form method='POST' action='process_booking.php'>";
            echo "<input type='hidden' name='train_id' value='$trainId'>";
            
            echo "<label for='passenger_name'>Passenger Name:</label>";
            echo "<input type='text' name='passenger_name' id='passenger_name'>";

            echo "<label for='seatType'>Seat Type:</label>";
            echo "<select name='seatType' id='seatType'>";
            echo "<option value='general'>General</option>";
            echo "<option value='reserved'>Reserved</option>";
            echo "</select>";

            echo "<label for='paymentMode'>Payment Mode:</label>";
            echo "<select name='paymentMode' id='paymentMode'>";
            echo "<option value='Credit Card'>Credit Card</option>";
            echo "<option value='PayPal'>PayPal</option>";
            echo "<option value='Bank Transfer'>Bank Transfer</option>";
            echo "</select>";

            echo "<br><br>";
            echo "<input type='submit' value='Proceed to Payment'>";
            echo "</form>";
            echo "</body>";
            echo "</html>";
        } else {
            echo "Invalid train ID";
        }

        $conn->close();
    } else {
        echo "Invalid train ID";
    }
}
?>
