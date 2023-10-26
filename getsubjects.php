<?php
require($_SERVER["DOCUMENT_ROOT"] . "/../config.php");

if (isset($_POST["opetaja"])) {
  $opetajaId = $_POST["opetaja"];

  $kask = $yhendus->prepare("SELECT id, aine FROM konsultatsioon WHERE opetaja = ?");
  $kask->bind_param("i", $opetajaId);
  $kask->bind_result($id, $aine);
  $kask->execute();

  $ained = array();
  while ($kask->fetch()) {
    $ained[$id] = $aine;
  }

  echo json_encode($ained);
}
