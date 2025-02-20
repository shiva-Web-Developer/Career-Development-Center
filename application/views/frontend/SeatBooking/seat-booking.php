<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        .container {
            width: 95%;
            max-width: 600px;
            background: white;
            padding: 10px;
            border-radius: 6px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        h2 {
            margin-bottom: 10px;
        }

        .seat-map-wrapper {
            width: 100%;
            overflow: auto;
            padding-bottom: 10px;
            height: 219px;
   scrollbar-width: none; /* Hide scrollbar in Firefox */
            -ms-overflow-style: none; /* Hide scrollbar in IE and Edge */
        }

        .seat-grid {
            display: grid;
            grid-template-columns: 30px repeat(25, 1fr);
            /* First column for row labels */
            gap: 6px;
            align-items: center;
            justify-items: center;
        }

        .row-label {
            font-weight: bold;
            text-align: center;
            font-size: 14px;
            color: black;
        }

        .seat {
            width: 22px;
            height: 22px;
            background-color: white;
            border: 1px solid #1bc015;
            border-radius: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
        }

        .seat.selected {
            background-color: #28a745;
            color: white;
            border-color: #28a745;
        }

        .seat.booked {
            background-color: #ccc;
            color: white;
            border-color: #ccc;
            cursor: not-allowed;
        }

        .empty-seat {
            visibility: hidden;
        }

        .screen-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .screen {
            width: 80%;
            height: 50px;
            background: linear-gradient(to bottom, #cde3fc, #e3f2fd);
            border-top: 5px solid #aac8e4;
            border-left: 3px solid #aac8e4;
            border-right: 3px solid #aac8e4;
            transform: perspective(300px) rotateX(30deg);
            box-shadow: 0px -4px 8px rgba(0, 0, 0, 0.3);
        }

        .screen-text {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }

        .legend {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }

        .legend div {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            color: #555;
        }

        .legend-box {
            width: 15px;
            height: 15px;
            border-radius: 4px;
            border: 2px solid #ccc;
        }

        .available {
            background-color: white;
        }

        .selected {
            background-color: #28a745;
        }

        .sold {
            background-color: #ccc;
        }

        .seat-info {
            margin: 23px;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .alertMessage {
            position: fixed;
            left: 50%;
            top: -50px;
            transform: translateX(-50%);
            background-color: #28a745;
            color: white;
            padding: 5px 11px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transition: top 0.6s ease-out, opacity 0.6s ease-out;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $sql = "SELECT * FROM `event_list` WHERE is_Active = 1 AND id = $EventID";
        $EventDetails = $this->Admin_model->getAllData($sql);
        ?>
        <h2>Choose Seat</h2>
        <div class="seat-info">
            Available: <span id="available-seats"><?php echo $totalSeats - $BookedSeat ?></span> | Booked: <span id="selected-seats"><?php echo $BookedSeat ?></span>
            <input type="text" value="<?php echo  $EventDetails[0]['id']; ?>" id="planID" hidden>
        </div>
        <div class="seat-map-wrapper">
            <div class="seat-grid" id="seat-map"></div>
        </div>
        <div class="screen-container">
            <div class="screen"></div>
            <div class="screen-text">All eyes this way please!</div>
        </div>
        <div class="legend">
            <div>
                <div class="legend-box available"></div> Available
            </div>
            <div>
                <div class="legend-box sold"></div> Sold
            </div>
        </div>

        <div id="paymentButton" style="display: none; margin-top: 20px;">
            <button id="payButton" style="
                background-color:#009900;
                color: white;
                border: none;
                padding: 10px 110px;
                font-size: 14px;
                font-weight: bold;
                border-radius: 8px;
                max-width: 400px;
                cursor: pointer;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            " onclick="initiatePayment()">
                Pay Rs. <?php echo  $EventDetails[0]['fees']; ?>
            </button>
        </div>

        </div>

        <div id="showMessage" class="alertMessage">✅ Added Successfully</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const seatMap = document.getElementById('seat-map');
            const paymentButton = document.getElementById("paymentButton");
            let seatData = <?= $seatData ?>;
            let bookedSeats = <?= $bookedSeats ?>;
            let selectedSeat = null;
            let planId = <?= $EventDetails[0]['id']; ?>;
            let eventFees = <?= $EventDetails[0]['fees']; ?> * 100; // Convert to paise

            function createSeat(seatNumber, isEmpty = false) {
                const seat = document.createElement('div');
                seat.classList.add('seat');
                seat.innerText = isEmpty ? "" : seatNumber.replace(/^\D+/g, '');

                if (isEmpty) {
                    seat.classList.add('empty-seat');
                } else if (bookedSeats.includes(seatNumber)) {
                    seat.classList.add('booked');
                } else {
                    seat.dataset.seatNumber = seatNumber;
                    seat.addEventListener('click', () => {
                        if (!seat.classList.contains('booked')) {
                            if (selectedSeat) {
                                selectedSeat.classList.remove('selected');
                            }

                            seat.classList.add('selected');
                            selectedSeat = seat;
                            paymentButton.style.display = "block"; // ✅ Show the Pay button immediately
                        }
                    });
                }
                return seat;
            }

            Object.keys(seatData).forEach(rowLabel => {
                const rowLabelElement = document.createElement('div');
                rowLabelElement.classList.add('row-label');
                rowLabelElement.innerText = rowLabel;
                seatMap.appendChild(rowLabelElement);

                let rowSeats = seatData[rowLabel] || [];
                for (let i = 1; i <= 25; i++) {
                    let seatNumber = rowSeats.find(seat => seat.endsWith(i.toString()));
                    seatMap.appendChild(createSeat(seatNumber || "", seatNumber ? false : true));
                }
            });
        });
    </script>



<!-- code test  -->


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var base_url = "<?= base_url(); ?>";
var csrf_token = "<?= $this->security->get_csrf_hash(); ?>";

function initiatePayment() {
    let planID = document.getElementById("planID").value;
    let amount = <?= $EventDetails[0]['fees']; ?> * 100;
    $.ajax({
        type: 'POST',
        url: base_url + "getStudentDetails",
        data: { csrf_token: csrf_token },
        dataType: "json",
        success: function(student) {
            if (!student || student.error) {
                alert("Failed to fetch student details.");
                return;
            }

            let options = {
                "key": "rzp_test_Hs4FpdUrKOz3v0",
                "amount": amount,
                "currency": "INR",
                "name": "Career Development Center",
                "description": "Seat Booking Payment",
                "image": "your-logo-url.png",
                "handler": function(response) {
                    $.ajax({
                        type: 'POST',
                        url: base_url + "SavePayment",
                        data: {
                            eventId: planID,
                            paymentId: response.razorpay_payment_id,
                            amount: amount,
                            status: "success",
                            student_id: student.student_id,
                            csrf_token: csrf_token
                        },
                        dataType: "json",
                        success: function(saveResponse) {
                            if (saveResponse.status === "success") {
                                alert("Payment successful! Payment ID: " + response.razorpay_payment_id);
                                window.location.href = base_url + "EventBooking";
                            } else {
                                alert("Payment recorded, but database update failed!");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Database Save Error:", error);
                            alert("Payment successful, but an error occurred while saving details.");
                        }
                    });
                },
                "prefill": {
                    "name": student.name,
                    "email": student.email,
                    "contact": student.contact
                },
                "theme": { "color": "#009900" }
            };

            let rzp1 = new Razorpay(options);
            rzp1.open();
        },
        error: function(xhr, status, error) {
            console.error("Fetch Student Data Error:", error);
            alert("Unable to retrieve student details.");
        }
    });
}
</script>


</body>


</html>