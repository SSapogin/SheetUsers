<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="app">
    <div id="table">
      <h1>Данные пользователей</h1>
      <div class="block_btn">
        <button onclick="addbtn();" type="button">Добавить нового пользователя</button>
        <button onclick="showbtn();" type="button">Показать пользователей</button>
      </div>
      <form id="addform" action="/add.php" method="post">
        <input type="text" name="name" placeholder="Ваше имя">
        <input type="text" name="surname" placeholder="Ваша фамилия">
        <input type="text" name="pass" placeholder="Введите пароль">
        <input type="text" name="city" placeholder="Ваш город">
        <input type="text" name="animal" placeholder="Любимое животное">
        <button type="submit" name="send">OK</button>
      </form>
      <table id="showtable" >
        <thead>
          <tr>
            <th>id</th>
            <th>name</th>
            <th>surname</th>
            <th>password</th>
            <th>city</th>
            <th>animal</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require 'config.php';
            $query = $connect->query('SELECT * FROM `user` ORDER BY `id` DESC');
            while($row = $query->fetch(PDO::FETCH_OBJ)) {
              echo '<tr><td>'.$row->id.'</td>';
              echo '<td>'.$row->name.'</td>';
              echo '<td>'.$row->surname.'</td>';
              echo '<td>'.$row->pass.'</td>';
              echo '<td>'.$row->city.'</td>';
              echo '<td>'.$row->animal.'<a href="delete.php?id='.$row->id.'">Х</a></td></tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
<script src="js/script.js" type="text/javascript"></script>
</html>
