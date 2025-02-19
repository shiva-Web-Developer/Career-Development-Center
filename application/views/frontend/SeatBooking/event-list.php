<style>
    #home-header {
        /* background: radial-gradient(var(--primary-color), var(--secondary-color));
        background-image: url('<? //= base_url()
                                ?>assets/img/profilebg.jpg');     */
        background-size: cover;
        background-position: bottom;
        padding: 2rem 1.6rem;
        padding-bottom: 0rem;
        border-radius: 0 0 70px 70px;
    }

    .profile-dp img {
        width: 70px;
        border-radius: 50%;
    }

    #home-search {
        width: 100%;
        margin-top: 0.6rem;
    }

    #home_search {
        width: 97%;
        padding: 0.6rem 0.8rem;
        border-radius: 30px;
        border: 0;
        box-shadow: 0 0 6px grey;
        outline: 0;
    }

    #bmi-icon {
        border-radius: 50%;
        box-shadow: 0 0 6px var(--primary-color);
        height: 120px;
        width: 120px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background: white;
    }

    #bmi-icon img {
        width: 60px;
        height: auto;
    }

    #bmi-icon span {
        text-align: center;
        line-height: 1.2;
    }

    #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

    #myUL {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: none;
    }

    #myUL li a {
        border: 1px solid #ddd;
        margin-top: 1px;
        /* Prevent double borders */
        background-color: #f6f6f6;
        padding: 10px;
        text-decoration: none;
        font-size: 14px;
        color: black;
        display: block;
        width: 321px;
    }

    .col-sm-6 {
        position: relative;
        width: 48%;
        min-height: 1px;
        padding-right: 3px;
        padding-left: 17px;
    }

    .disease-card {
        width: 95%;
        box-sizing: border-box;
    }

    .disease-card div {
        padding: 1rem;
        background: white;
        box-shadow: 0 0 4px grey;
        margin: 0.4rem;
        border-radius: 8px;
    }

    .disease-card div>h6 {
        text-align: center;
        font-weight: 900;
        font-size: 1rem;
        color: var(--text-color);
        height: 20px;
    }

    .disease-card div>a {
        padding: 0.2rem 0.4rem;
        border-radius: 4px;
        font-size: 0.8rem;
        width: fit-content;
        max-width: 68px;
    }

    #myUL li a:hover:not(.header) {
        background-color: #eee;
    }

    h6 {
        line-height: 1.2em;
        /* height: 2.6em; */
        overflow: hidden;
    }

    .card-title {
        margin: 0.75rem 0;
        /*min-height: 70px;*/
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #course_img {
        height: auto;
        width: 100%;
        background-color: white;
    }
</style>
<main>

    <?php $this->load->view('frontend/first-visit'); ?>
    <section id="home-header">
        <div class="flex flex-row space-between flex-column">
            <div class="">
                <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'welcome'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
                </svg>
            </div>
        </div>
        <div>
        </div>
        </div>
    </section>
    <?php
$today = date("Y-m-d");
$month = date("M");
$weekDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

// Get all unique event dates and find min/max date
$eventDates = [];
foreach ($EventList as $row) {
    $eventDates[] = date("Y-m-d", strtotime($row['event_date']));
}
$eventDates = array_unique($eventDates);
sort($eventDates);

// Generate full date range
$startDate = $eventDates[0] ?? $today;
$endDate = end($eventDates) ?: $today;

$dateRange = [];
$currentDate = $startDate;
while (strtotime($currentDate) <= strtotime($endDate)) {
    $dateRange[] = $currentDate;
    $currentDate = date("Y-m-d", strtotime("+1 day", strtotime($currentDate)));
}
?>

<!-- Date Selection -->
<br>
<div class="d-flex align-items-center bg-white shadow-sm p-2 rounded" style="display: flex;overflow-x: scroll;white-space: nowrap;
    scroll-behavior: smooth;-ms-overflow-style: none;scrollbar-width: none;padding-top:10px;">

    <?php foreach ($dateRange as $date) {
        $day = $weekDays[date("w", strtotime($date))];
        $displayDate = date("d", strtotime($date));

        // Set default selected date as today
        $bgColor = ($date == $today) ? "bg-success text-white selected-date" : "text-secondary";
    ?>
        <div class="text-center date-box <?= $bgColor ?> mx-1 px-3 py-2"
            style="border-radius: 8px;font-size: 12px; cursor: pointer;"
            data-date="<?= $date ?>"
            onclick="filterEvents('<?= $date ?>', this)">
            <small class="text-uppercase fw-bold"><?= $day ?></small>
            <h6 class="m-0 fw-bold" style="font-size: 16px;"><?= $displayDate ?></h6>
            <small class="m-0 fw-bold"><?= $month ?></small>
        </div>
    <?php } ?>
</div>

<!-- Event Cards -->
<div id="eventContainer" style="align-items:stretch;padding:10px;">
    <?php
    $hasTodayEvents = false;
    foreach ($EventList as $row) {
        $eventDate = date("Y-m-d", strtotime($row['event_date']));
        $displayStyle = ($eventDate == $today) ? "block" : "none"; // Show only today's events initially
        if ($eventDate == $today) {
            $hasTodayEvents = true;
        }
    ?>
        <div class="event-card card p-2 shadow-sm mb-1" data-event-date="<?= $eventDate ?>" style="border-radius: 1rem !important;padding: 1.1rem !important; display: <?= $displayStyle ?>;">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h6 class="m-0" style="font-size: 14px; font-weight: bold;">
                        <?= $row['title']; ?>
                    </h6>
                </div>
                <span style="cursor: pointer; font-size: 14px; color: gray;"
                    data-bs-toggle="modal"
                    data-bs-target="#infoModal"
                    data-event-id="<?= $row['event_id']; ?>"
                    data-event-dsc="<?= $row['description']; ?>"
                    data-event-date="<?= $row['event_date']; ?>"
                    data-event-time="<?= $row['event_time']; ?>"
                    data-event-name="<?= $row['title']; ?>">
                    ⓘ INFO
                </span>
            </div>

            <!-- Subtitle -->
            <p class="text-muted mb-2 mt-2" style="font-size: 12px;">
                <strong>Event ID:</strong> <?= $row['event_id']; ?>
            </p>

            <!-- Show Timings -->
            <div class="d-flex flex-wrap">
                <button class="btn btn-light text-success border m-1" style="width: 105px; font-size: 14px; border-radius: 0;">
                    <?= date("h:i A", strtotime($row['event_time'])); ?>
                </button>
            </div>
        </div>
    <?php } ?>

    <!-- No Events Message Card -->
    <div id="noEventsMessage" class="card p-3 shadow-sm text-center" style="border-radius: 1rem; display: <?= $hasTodayEvents ? 'none' : 'block'; ?>;">
        <p class="text-muted m-0">No events available for this date.</p>
    </div>
</div>


</div>
    </div>

</main>

<!-- Modal -->
<!-- <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="infoModalLabel">Event Details</h5>
            </div>
            <div class="modal-body">
                <p><strong>Event ID:</strong> <span id="eventId"></span></p>
                <p><strong>Date & Time:</strong> <span id="eventDate"></span> <span id="eventTime"></span> </p>
                <p><strong>Title:</strong> <span id="eventName"></span></p>
                <p><strong>Description:</strong> <span id="eventDsc"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Header Section -->
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="infoModalLabel"><i class="fas fa-calendar-alt"></i> Event Details</h5>
                <!-- <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>

            <!-- Body Section -->
            <div class="modal-body p-4">
                <div class="mb-2">
                    <h6 class="fw-bold text-success"><i class="fas fa-hashtag"></i> Event ID:</h6>
                    <p id="eventId" class="m-0 text-dark"></p>
                </div>
                <div class="mb-2">
                    <h6 class="fw-bold text-success"><i class="fas fa-calendar-day"></i> Date & Time:</h6>
                    <p class="m-0 text-dark">
                        <span id="eventDate"></span> at <span id="eventTime"></span>
                    </p>
                </div>
                <div class="mb-2">
                    <h6 class="fw-bold text-success"><i class="fas fa-file-alt"></i> Title:</h6>
                    <p id="eventName" class="m-0 text-dark"></p>
                </div>
                <div class="mb-2">
                    <h6 class="fw-bold text-success"><i class="fas fa-align-left"></i> Description:</h6>
                    <p id="eventDsc" class="m-0 text-dark" style="text-align: justify;"></p>
                </div>
            </div>

            <!-- Footer Section -->
            <div class="modal-footer d-flex justify-content-between">
                <small class="text-muted">Powered by CDC</small>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <!-- <i class="fas fa-times"></i> -->
                     Close
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var infoModal = document.getElementById('infoModal');

        infoModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var eventId = button.getAttribute('data-event-id');
            var eventName = button.getAttribute('data-event-name');
            var eventDsc = button.getAttribute('data-event-dsc');
            var eventDate = button.getAttribute('data-event-date'); // In YYYY-MM-DD format
            var eventTime = button.getAttribute('data-event-time'); // In HH:MM:SS format

            // Convert Date to d-m-Y format
            let dateObj = new Date(eventDate);
            let formattedDate = dateObj.toLocaleDateString('en-GB');

            // Convert Time to 12-hour format with AM/PM
            let [hours, minutes, seconds] = eventTime.split(':');
            hours = parseInt(hours);
            let amPm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12; // Convert 0 to 12-hour format
            let formattedTime = `${hours}:${minutes} ${amPm}`;

            // Update Modal Content
            document.getElementById('eventId').textContent = eventId;
            document.getElementById('eventName').textContent = eventName;
            document.getElementById('eventDsc').textContent = eventDsc;
            document.getElementById('eventDate').textContent = formattedDate;
            document.getElementById('eventTime').textContent = formattedTime;
        });
    });
</script>

<!-- JavaScript for Filtering Events -->
<script>
function filterEvents(selectedDate, clickedElement) {
    // Remove the previous selection and apply highlight to the clicked date
    document.querySelectorAll('.date-box').forEach(box => {
        box.classList.remove('bg-success', 'text-white', 'selected-date');
        box.classList.add('text-secondary');
    });
    clickedElement.classList.remove('text-secondary');
    clickedElement.classList.add('bg-success', 'text-white', 'selected-date');

    let hasEvents = false;

    // Hide all event cards and show only the ones matching the selected date
    document.querySelectorAll('.event-card').forEach(eventCard => {
        if (eventCard.getAttribute('data-event-date') === selectedDate) {
            eventCard.style.display = 'block';
            hasEvents = true;
        } else {
            eventCard.style.display = 'none';
        }
    });

    // Show or hide the "No events" message
    document.getElementById('noEventsMessage').style.display = hasEvents ? 'none' : 'block';
}
</script>

<!-- Bootstrap 5 CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>