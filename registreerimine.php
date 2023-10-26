<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../config.php");
global $yhendus;



?>
<?php
require("header.php");
?>

<body style="background-color: #ffffff">


  <form>
    <h1>REGISTREERI ENNAST KONSULTATSIOONILE</h1>
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
        <select id="opetaja" name="opetaja" required>
          <?php
          $opetajad = array();
          $kask = $yhendus->prepare("SELECT Id, opetajanimi FROM opetaja");
          $kask->bind_result($id, $opetajanimi);
          $kask->execute();

          while ($kask->fetch()) {
            echo "<option value=\"$id\">$opetajanimi</option>";
          }


          ?>
        </select>
        <select id="aine" name="aine" required>
          <?php
          $kask = $yhendus->prepare("SELECT Id, aine FROM konsultatsioon");
          $kask->bind_result($id, $aine);
          $kask->execute();

          while ($kask->fetch()) {
            echo "<option value=\"$id\">$aine</option>";
          }


          ?>
        </select>
        <input type="date" id="date" name="date">
        <input type="email" id="email" name="email" required>
      </div>
    </div>
    <button class="column-btn" onclick="checkAndShowAlert()">Saada</button>
    <script>
      function checkAndShowAlert() {
        // Check if all required fields are filled
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;

        if (name !== "" && email !== "") {
          alert("Registreerimine õnnestus!");
        } else {
          alert("Palun täitke kõik vajalikud lahtrid!");
        }
      }
    </script>
  </form>


</body>
<?php
require("footer.php");
?>

</html>
<?php
$yhendus->close();
?>