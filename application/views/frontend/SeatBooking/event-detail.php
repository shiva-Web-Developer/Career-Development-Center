<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>

    <!-- Load jsPDF & html2canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            position: relative;
        }

        /* Download Icon */
        .download-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            font-size: 24px;
            background-color: #ff4d4d;
            color: white;
            padding: 10px;
            border-radius: 50%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .container {
            max-width: 500px;
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 4rem;
            position: relative;
        }

        /* Header Section */
        .header {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .left-section {
            flex: 1;
            text-align: center;
        }

        .left-section img {
            width: 95px;
            height: auto;
            border-radius: 8px;
        }

        .right-section {
            flex: 2;
            padding-left: 15px;
        }

        h5 {
            color: #222;
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .bold {
            font-weight: bold;
            font-size: 12px;
            color: #444;
            margin: 5px 0;
        }

        /* Ticket Information */
        .ticket-info {
            background-color: #f9f9f9;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 15px;
        }

        .ticket-info p {
            margin: 5px 0;
            font-size: 14px;
        }

        .qr-code img {
            width: 80px;
            height: 80px;
            margin-top: 8px;
        }

        /* Booking Summary */
        .booking-summary {
            background-color: #f9f9f9;
            padding-left: 10px;
            border-radius: 8px;
            text-align: left;
            margin-top: 15px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin: 4px 0;
        }

        .summary-row p {
            margin: 0;
            font-size: 14px;
            color: #444;
        }

        .total {
            border-top: 2px solid #ddd;
            padding-top: 5px;
        }

        .highlight {
            color: #ff4d4d;
            font-size: 16px;
            font-weight: bold;
        }

        /* Important Information */
        .important-info {
            background-color: #fff;
            border-radius: 8px;
            text-align: center;
            margin-top: 10px;
        }

        .important-info p {
            font-size: 12px;
            color: #666;
            line-height: 1.5;
        }

        /* Responsive Design */
        @media screen and (max-width: 500px) {
            .container {
                /* max-width: 90%; */
            }
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            margin: 0 !important;
        }
    </style>
</head>

<body>

    <!-- Download Icon -->
    <!-- <div class="download-icon" onclick="downloadPDF()">⬇️</div> -->

    <div class="container" id="pdf-content">
        <?php if (!empty($bookingDetails)) {
            $booking = $bookingDetails[0]; // Assuming there's only one booking entry per user
        ?>
            <!-- Header: Left Image & Right Event Details -->
            <div class="header">
                <div class="left-section">
                    <img src="<?php echo base_url($booking->image); ?>" alt="Event Image">
                </div>
                <div class="right-section">
                    <h5><?php echo htmlspecialchars($booking->title); ?></h5>
                    <p class="bold"><?php echo date("D, M d, h:iA", strtotime($booking->event_date)); ?></p>
                    <p class="bold">Hera Public School</p>
                </div>
            </div>

            <!-- Ticket Information -->
            <div class="ticket-info">
                <p class="bold">Seat: <?php echo htmlspecialchars($booking->seat_id); ?></p>
                <div class="qr-code">
                    <img src="<?php echo base_url($booking->detail_qr); ?>" alt="QR Code">
                </div>
                <p><strong>Booking ID:</strong> <?php echo htmlspecialchars($booking->booking_id); ?></p>
                <p><small>Booking powered by <strong>CDC</strong></small></p>
            </div>

            <!-- Booking Summary -->
            <div class="booking-summary">
                <h5>Booking Summary</h5>
                <div class="summary-row">
                    <p class="bold">Ticket:</p>
                    <p class="bold price">₹
                        <?php if (isset($booking->point_amount) && $booking->point_amount > 0) : ?>
                            <?php echo number_format($booking->fees - $booking->point_amount, 2); ?>
                        <?php else : ?>
                            <?php echo number_format($booking->fees, 2); ?>
                        <?php endif; ?>
                    </p>
                </div>
                <?php if (isset($booking->point_amount) && $booking->point_amount > 0) : ?>
                    <div class="summary-row">
                        <p class="bold">Paid From Wallet:</p>
                        <p class="bold price">₹<?php echo number_format($booking->point_amount, 2); ?></p>
                    </div>
                <?php endif; ?>
                <div class="summary-row total">
                    <p class="bold">Order Total:</p>
                    <p style="color:red;" class="bold highlight">₹<?php echo number_format($booking->fees, 2); ?></p>
                </div>
            </div>
            <!-- Important Information -->
            <div class="important-info">
                <h5>Important Information</h5>
                <p style="text-align:left;font-size:10px;">
                    Wondering how to throw events that college students will actually want to attend?
                    <br>
                    It’s time to shift your perspective. Whether you’re an event planner.
                </p>
            </div>

        <?php } else { ?>
            <p class="text-danger text-center">No Booking Details Found.</p>
        <?php } ?>
    </div>


    <script>
        async function downloadPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const container = document.getElementById("pdf-content");

            // Ensure images load properly before capturing
            const images = container.getElementsByTagName("img");
            for (let img of images) {
                await new Promise((resolve) => {
                    img.onload = resolve;
                    img.onerror = resolve;
                });
            }

            html2canvas(container, {
                scale: 2, // Ensures high-quality rendering
                useCORS: true, // Fixes potential cross-origin issues with images
                scrollY: -window.scrollY, // Ensures full capture of content
            }).then(canvas => {
                const imgData = canvas.toDataURL("image/png");
                const pdf = new jsPDF("p", "mm", "a4");

                const imgWidth = 210; // A4 width in mm
                const pageHeight = 297; // A4 height in mm
                let imgHeight = (canvas.height * imgWidth) / canvas.width;

                if (imgHeight > pageHeight) {
                    pdf.addImage(imgData, "PNG", 0, 0, imgWidth, pageHeight);
                    let heightLeft = imgHeight - pageHeight;
                    let position = 0;

                    while (heightLeft > 0) {
                        position -= pageHeight;
                        pdf.addPage();
                        pdf.addImage(imgData, "PNG", 0, position, imgWidth, pageHeight);
                        heightLeft -= pageHeight;
                    }
                } else {
                    pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);
                }

                pdf.save("Booking_Confirmation.pdf");
            }).catch(error => {
                console.error("PDF Generation Error:", error);
            });
        }
    </script>



</body>

</html>