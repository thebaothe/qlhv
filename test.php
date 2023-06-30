<?php

	$day = array(
	  "Tiết 1" => null,
	  "Tiết 2" => null,
	  "Tiết 3" => null,
	  "Tiết 4" => null,
	  "Tiết 5" => null,
	  "Tiết 6" => null,
	  "Tiết 7" => null,
	  "Tiết 8" => null,
	  "Tiết 9" => null,
	  "Tiết 10" => null,
	  "Tiết 11" => null,
	  "Tiết 12" => null
	);
	$morning_start = strtotime("07:00:00");
	$morning_end = strtotime("12:00:00");
	$afternoon_start = strtotime("13:00:00");
	$afternoon_end = strtotime("18:00:00");


	if ($time >= $morning_start && $time <= $morning_end) {
	  $session = "Buổi sáng";
	} elseif ($time >= $afternoon_start && $time <= $afternoon_end) {
	  $session = "Buổi chiều";
	} else {
	  $session = "Không xác định";
	}

	if ($session == "Buổi sáng") {
  for ($i = 1; $i <= 6; $i++) {
    if ($day["Tiết " . $i] == null) {
      $day["Tiết " . $i] = $course;
      break;
    }
  }
} elseif ($session == "Buổi chiều") {
  for ($i = 7; $i <= 12; $i++) {
    if ($day["Tiết " . $i] == null) {
      $day["Tiết " . $i] = $course;
      break;
    }
  }
} else {
  // Không phân chia lịch học
}

echo "<h2>Lịch học của bạn:</h2>";
echo "<h3>Buổi sáng</h3>";
echo "<table>";
echo "<tr><th>Tiết</th><th>Môn học</th></tr>";
for ($i = 1; $i <= 6; $i++) {
  echo "<tr><td>Tiết " . $i . "</td><td>" . ($day["Tiết " . $i] ? $day["Tiết " . $i]["subject"] : "") . "</td></tr>";
}
echo "</table>";

echo "<h3>Buổi chiều</h3>";
echo "<table>";
echo "<tr><th>Tiết</th><th>Môn học</th></tr>";
for ($i = 7; $i <= 12; $i++) {
  echo "<tr><td>Tiết " . $i . "</td><td>" . ($day["Tiết " . $i] ? $day["Tiết " . $i]["subject"] : "") . "</td></tr>";
}
echo "</table>";


?>

