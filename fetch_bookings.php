<?php
header('Content-Type: application/json');
require_once __DIR__ . '/inc/connection.php';

$year  = isset($_GET['year'])  ? intval($_GET['year'])  : date('Y');
$month = isset($_GET['month']) ? intval($_GET['month']) : date('m');

$sql = "
SELECT check_in, check_out
FROM bookings
WHERE status = 'Approved'
AND (
    (YEAR(check_in) = $year AND MONTH(check_in) = $month)
    OR
    (YEAR(check_out) = $year AND MONTH(check_out) = $month)
    OR
    (check_in < '$year-$month-01' AND check_out >= '$year-$month-01')
)
";

$result = $conn->query($sql);
$dates = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $start = new DateTime($row['check_in']);
        $end   = new DateTime($row['check_out']);

        while ($start <= $end) {
            $dates[] = $start->format('Y-m-d');
            $start->modify('+1 day');
        }
    }
}

echo json_encode(array_values(array_unique($dates)));
$conn->close();
