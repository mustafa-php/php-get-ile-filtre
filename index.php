<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Veri Filtreleme</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />

</head>

<body>

  <?php
  try {
    $_deney = new PDO("mysql:host=localhost;dbname=deney", "root", "");
  } catch (PDOException $e) {
    print $e->getMessage();
  }


  if (isset($_GET["ara"])) {
    $ara_get = $_GET["ara"];
    $ara = $_deney->prepare("SELECT * FROM ara where aranan like '%$ara_get%' ");
    $ara->execute();
    $araniyor = $ara->fetchAll(PDO::FETCH_OBJ);
  } else {
    $liste = $_deneme->prepare("SELECT * FROM ara");
    $liste->execute();
    $listeleniyor = $liste->fetchAll(PDO::FETCH_OBJ);
  }

  ?>

  <form action="" method="get">
    <input type="text" name="ara" placeholder="ara...">
    <button type="submit" name="">Ara</button>
  </form>

  <?php
  if (isset($_GET["ara"])) {
    foreach ($araniyor as $sonuc) {
  ?>
      <div class="liste">
        <h2><?php echo $sonuc->aranan; ?></h2>
      </div>
    <?php
    }
  } else {
    foreach ($listeleniyor as $sonuc) {
    ?>
      <div class="liste">
        <h2><?php echo $sonuc->aranan; ?></h2>
      </div>
  <?php
    }
  }
  ?>
</body>

</html>