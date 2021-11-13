<?

// CHMOD this file to 666
// If it doesn't work, try 777
$log = 'uniquehits.log';

// No need to edit anything below this line
// ----------------------------------------

$IP = getenv (REMOTE_ADDR);
$add = true;
$hits = 0;

if (!file_exists ($log)) {
	echo "Error: $log does not exist.";
	exit;
}

$h = fopen ($log, 'r');
while (!feof ($h)) {
	$line = fgets ($h, 4096);
	$line = trim ($line);
	if ($line != '')
		$hits++;

	if ($line == $IP)
		$add = false;
}

fclose($h);

if ($add == true) {
	$h = fopen ($log, 'a');
	fwrite($h, "
$IP");
	fclose($h);
	$hits++;
}

//echo "<div style='text-align:center'>". $hits . " Unikalnych wejsć </div>";

?>