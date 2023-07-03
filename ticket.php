<!-- ticket.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }

        .ticket {
            background-color: #a7d7f9; /* Light blue background color */
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }

        .ticket h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .ticket p {
            font-size: 16px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <h1>Ticket</h1>

        <?php
        // Retrieve the values from the query parameters
        $bookingId = $_GET["bookingId"];
        $trainId = $_GET["trainId"];
        $seatType = $_GET["seatType"];
        $passengerName = $_GET["passengerName"];
        ?>

        <p><strong>Booking ID:</strong> <?php echo $bookingId; ?></p>
        <p><strong>Train ID:</strong> <?php echo $trainId; ?></p>
        <p><strong>Seat Type:</strong> <?php echo $seatType; ?></p>
        <p><strong>Passenger Name:</strong> <?php echo $passengerName; ?></p>
        <p><strong>Payment Status:</strong> Completed</p>
    </div>
</body>
</html>
