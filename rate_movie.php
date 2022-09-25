<?php
require_once('connexion.php');
$movieId = $_GET['id'] ?? null;

if ($movieId != null) :
    $query = $db->query('SELECT * from rate where movie_id=' . $movieId);
    $rates = $query->fetchAll(PDO::FETCH_ASSOC);
?>
    <h3>Notes</h3>
    <a href="movie_rate.php?movie_id=<?= $movieId ?>" class="btn btn-success btn-sm mt-3 mb-3">Ajouter</a>

    <ol class="list-group list-group-numbered">
        <?php foreach($rates as $r): ?>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <?= $r['comment']?><br>
                </div>
                
                <?php for($i=1;$i<=5; $i++): ?>
                    <i class="bi bi-star<?= $i<= $r['rating'] ? '-fill' : '' ?> text-warning"></i>
                <?php endfor; ?>
                <!--
                        for ($i = 1; $i <= 5; $i++) {
                            
                            if ($i <= $r['rating']) {
                                echo '<i class="bi bi-star text-warning"></i>';
                                //echo '<i class="fa fa-star rating-color"></i>';
                            } else {
                                echo '<i class="bi bi-star"></i>';
                                //echo '<i class="fa fa-star"></i>';
                            }
                        }
                        ?>
                    -->
            </li>
        <?php endforeach; ?>
    </ol> 

<?php
endif
?>