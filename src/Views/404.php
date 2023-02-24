<?php
ob_start();

?>

<section class="error">
    <h1>aucun stagiaire n'existe</h1>
    <p><a href="/dashboard/nouveau">en creer un</a></p>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
