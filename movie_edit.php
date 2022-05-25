<?php
require_once('connexion.php');

$id = $_GET['id'] ?? null;

if ($id != null) {
  $query = $db->query("select * from movie where id=$id");

  $movie = $query->fetch(PDO::FETCH_ASSOC);

  if ($movie == null) {
    header('location: movie_list.php');
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-8 mt-3">
        <form method="post" action="movie_save.php<?= $id != null ? "?id=$id" : '' ?>">
          <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" value="<?= $movie['name'] ?? '' ?>" id="name" name="name">
          </div>

          <div class="mb-3">
            <label for="release" class="form-label">Sortie</label>
            <input type="date" class="form-control" value="<?= $movie['release'] ?? '' ?>" id="release" name="release">
          </div>

          <div class="mb-3">
            <label for="duration" class="form-label">Durée</label>
            <input type="number" class="form-control" value="<?= $movie['duration'] ?? '' ?>" id="duration" name="duration">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-6">
        <?php include('category_movie.php'); ?>
      </div>
      <div class="col-6">AUTRE CHOSE</div>
    </div>

  </div>
</body>

</html>