<?php
ob_start();
?>

<section class="dashboard">
    <div class="topDashBoard">
        <h1><i class="fas fa-list-alt"></i> Stagiaire :</h1>
    </div>

    <div class="blockAllList" id="masonry">

        <?php
        foreach ($formateurTab as $todo) {
        ?>
            <div class="blockCard">
                <div class="card index">
                    <div class="top">
                        <div class="flex border">
                            <p class="titre">Nom : <?php echo escape($todo->getNom()); ?></p>
                            <p class="titre">Prenom : <?php echo escape($todo->getPrenom()); ?></p>
                            <p class="titre">nation : <?php echo $todo->getNat(); ?></p>
                            <p class="titre">formation : <?php echo $todo->getForm(); ?></p>
                            <ul>
                                <?php
                                foreach ($todo->allForm() as $taches) {
                                ?>
                                    <li>
                                        <div class="blockCard">
                                            <p>
                                                <span><?php echo escape($taches->getNOMFORM()); ?></span>
                                                <span>- <?php echo escape($taches->getSalle()); ?></span>
                                                <span>- <?php echo escape($taches->getDateDeb()); ?></span>
                                                <span>- <?php echo escape($taches->getDateFin()); ?></span>
                                            </p>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                        <div class="flex alignes">
                            <a class="oeil" href="/dashboard/<?php echo escape($todo->getPersone()); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="trash" href="/dashboard/<?php echo escape($todo->getPersone()); ?>/delete"><i class="fas fa-trash"></i></a>
                        </div>


                        <div class="separateur"></div>
                    </div>
                </div>

            <?php
        }
            ?>

            </div>
    </div>
    </div>


</section>

<script>
    let container = document.getElementById('masonry');

    let nb_col = window.innerWidth > 1024 ? 3 : window.innerWidth > 768 ? 3 : 1;

    let col_height = [];

    for (var i = 0; i <= nb_col; i++) {
        col_height.push(0);
    }

    for (var i = 0; i < container.children.length; i++) {
        let order = (i + 1) % nb_col || nb_col;
        container.children[i].style.order = order;
        col_height[order] += container.children[i].clientHeight;
    }
    container.style.height = Math.max.apply(Math, col_height) + 50 + 'px';
</script>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
