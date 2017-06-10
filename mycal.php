<!DOCTYPE html>
<html>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = test_input($_POST["salary"]);
	$epf_rate = test_input($_POST["epf_rate"]);
    $epf = cal_epf($base, $epf_rate);
	$net = cal_net($base, $epf);
	echo "salary(RM): $base<br>";
	echo "epf($epf_rate%): $epf<br>";
    echo "net salary(RM): $net<br>";
}

function cal_epf($base, $epf_rate) {
	$epf = round(($base * $epf_rate / 100), 2);
	return $epf;
}

function cal_net($base, $epf) {
	$net = round(($base - $epf), 2);
	return $net;
}
	
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}	
?>
</body>
</html>