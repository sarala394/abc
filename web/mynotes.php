<script>
    $(document).ready(function() {
        $('.table').on('click', 'td[data-action="selectDay"]', function() {
            var selectedDate = $(this).data('day'); // Get the value of the 'data-day' attribute
            // Show an alert for debugging purposes
            alert('Selected date: ' + selectedDate);

        });
    });
    A
</script>



<?php

extract($_GET);

$date = DateTime::createFromFormat('m/d/Y', $date)->format('Y-m-d');
echo $date;


function setdate() {
            var customDates = <?php echo json_encode($customDates); ?>;
            // Convert each custom date to the same format as used in the data-day attributes
            customDates = customDates.map(function (date) {
                var dateParts = date.split('-');
                return dateParts[1] + '/' + dateParts[2] + '/' + dateParts[0];
            });

            // Iterate through the calendar cells to find the matching dates
            $('.table td[data-action="selectDay"]').each(function () {
                var cellDate = $(this).data('day');
                if (customDates.includes(cellDate)) {
                    // Add a class to highlight the matching date
                    $(this).addClass('highlight');
                }
            });
        }