<?php
$name = $_POST['name'];
$surname = $_POST['surname'];
$pass = $_POST['pass'];
$city = $_POST['city'];
$animal = $_POST['animal'];

if ($name == '' || $surname == '' || $pass == '' || $city == '' || $animal == '') {
  echo 'Error: Пожалуйста, заполните все поля.';
  exit();
}

require 'config.php';

$sql = 'INSERT INTO user(name,surname,pass,city,animal) VALUES(:name,:surname,:pass,:city,:animal)';
$query = $connect->prepare($sql);
$query->execute(['name' => $name, 'surname' => $surname, 'pass' => $pass, 'city' => $city, 'animal' => $animal]);

include 'vendor/autoload.php';
if (isset($_POST['name'])) {
  try {
      $googleAccountKeyFilePath = "myKey.json"; // Ключ который мы получили при регистрации приложения

      putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $googleAccountKeyFilePath);

      $client = new Google_Client();

      $client->useApplicationDefaultCredentials();
      $client->addScope('https://www.googleapis.com/auth/spreadsheets');
      $service = new Google_Service_Sheets($client);
      $spreadsheetId = "1yUvk8EM_MoR0TdvQTVUv5feeFQQoYYR8SiY9biFrCOc";
      $spreadsheetName = "list1";

      $values = [
          [$_POST['name'], $_POST['surname'], $_POST['pass'], $_POST['city'], $_POST['animal']],
      ];
      $body = new Google_Service_Sheets_ValueRange(['values' => $values]);

      $options = array('valueInputOption' => 'USER_ENTERED');

      $service->spreadsheets_values->append($spreadsheetId, $spreadsheetName, $body, $options);
  } catch (\Throwable $th) {
      echo $th->getMessage();
  }
} else {
   echo "Ошибка: no data";
}

header('Location: /');
?>
