<?php

require_once('connexion.php');

$movieId = $_GET['movie_id'] ?? null;
if ($movieId == null) {
    header('location: movie_list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mt-3">
                <form method="POST" action="movie_rate_save.php?movie_id=<?= $movieId ?>">
                    <div class="mb-3">
                        <label for="rating" class="form-label">Note</label>
                        <input type="number" min="0" max="5" class="form-control" value="" id="rating" name="rating">
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Commentaires</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>