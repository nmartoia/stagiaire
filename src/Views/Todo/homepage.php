<?php
ob_start();
?>

<section class="homepage">
    <h1>Stagiaire</h1>
    <p>une ambiance nature</p>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
