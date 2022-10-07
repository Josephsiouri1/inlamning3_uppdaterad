<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbserverprogrammering";

$conn = new mysqli($servername, $username, $password, $dbname);

$anvandarnamn = $_SESSION["användarnamn"];
$filen = $_POST["filAttLaddaUpp"];

if ($anvandarnamn && $filen) {
  $loginHistory = fopen("logins.txt", "a") or die("Filen gick inte att öppnas!");
  fwrite($loginHistory, "$anvandarnamn: $filen<br>");
  fclose($loginHistory);
  $loginfilen = fopen("logins.txt", "r") or die("Unable to open file!");
  echo fread($loginfilen, filesize("logins.txt"));
  fclose($loginfilen);

  if ($anvandarnamn == "holros") {
    $sql = "INSERT INTO uploads (filename, user, uploadtime, snuskig)
    VALUES ('$filen', '" . $anvandarnamn . "', NOW(), TRUE)";
    $conn->query($sql);
  } else {
    $sql = "INSERT INTO uploads (filename, user, uploadtime) VALUES ('$filen', '" . $anvandarnamn . "', NOW())";
    $result = $conn->query($sql);
  }
} else {
  echo "filen saknas!";
}
