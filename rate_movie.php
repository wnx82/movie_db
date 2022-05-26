<?php
require_once('connexion.php');
$movieId = $_GET['id'] ?? null;


if ($movieId != null) :
    $query = $db->query('select * from rate where movie_id=' . $movieId);


    $rates = $query->fetchAll(PDO::FETCH_ASSOC);
?>

    <h3>Notes</h3>

    <a href="movie_rate.php?movie_id=<?= $movieId ?>" class="btn btn-success btn-sm mt-3 mb-3">Ajouter</A>



    <ol class="list-group list-group-numbered">
        <?php foreach ($rates as $r) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <?= $r['comment'] ?><BR>
                </div>
                <?php
                //couleur note
                $colorrate = "";
                if ($r['rating'] <= 2) : $colorrate = "bg-danger";
                elseif ($r['rating'] > 2 && $r['rating'] < 5) : $colorrate = "bg-warning";
                else : $colorrate = "bg-success";
                endif
                ?>



                <span class="badge <?= $colorrate ?> rounded-pill"><?= $r['rating'] . '/5' ?></span>

                <div class="mt-5 d-flex justify-content-between align-items-center">
                    <div class="small-ratings">
                        <?php

                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $r['rating']) {
                                echo '<i class="fa fa-star rating-color"></i>';
                            } else {
                                echo '<i class="fa fa-star"></i>';
                            }
                        }
                        ?>
                    </div>

                </div>


            </li>

        <?php endforeach; ?>

    </ol>

<?php
endif

?>