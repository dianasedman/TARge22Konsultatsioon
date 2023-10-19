<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<?php
require("header.php");
?>

<body>


  <form>
    <h1>Registreeri ennast konsultatsioonile</h1>
    <div class="container">
      <div class="column">
        <label for="name">Nimi:</label>
        <label for="teacher">Õpetaja:</label>
        <label for="aine">Aine:</label>
        <label for="date">Kuupäev:</label>
        <label for="email">E-post:</label>
      </div>

      <div class="column">
        <input type="text" id="name" name="name" required>
        <select id="teacher" name="teacher">
          <option value="sedman">Sedman</option>
        </select>
        <select id="aine" name="aine">
          <option value="programmeerimine">Programmeerimine</option>
        </select>
        <input type="date" id="date" name="date">
        <input type="email" id="email" name="email" required>
      </div>
    </div>
    <button class="column-btn">Saada</button>
  </form>
</body>

</html>

<?php
require("footer.php");
?>