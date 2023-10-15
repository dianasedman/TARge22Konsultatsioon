<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>
  <link href="style.css" rel="stylesheet" type="text/css" />


</head>

<body>
  <header>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhGeNJgDFZQ5WRgX4nTiEGW-2IMH9-VREVH-tb9K9eew&s"
      alt="Logo">
    <div class="menu-links">
      <a href="index.php">KONSULTATSIOONID</a>
      <a href="sisestus.php">KONSULTATSIOONI SISESTUS</a>
      <a href="registreerimine.php">REGISTREERIMINE</a>
      <a href="puuduvad.php">PUUDUVAD KONSULTATSIOONID</a>
      <a href="haldus.php">HALDUS</a>
    </div>
    <a href="http://tthk.ee" target="_blank" class="button">Tagasi kooli</a>
  </header>


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


  <footer>
    <a href="#">Konsultatsioonid</a>
    <a href="#">Konsultatsiooni sisestus</a>
    <a href="#">Registreerimine</a>
    <a href="#">Puuduvad konsultatsioonid</a>
    <a href="#">Haldus</a>
  </footer>
</body>

</html>