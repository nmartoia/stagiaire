<?php

use Stagiaire\Models\Formateur;

ob_start();
?>

<section class="create">
    <h1><i class="fas fa-list-alt"></i> Création stagiaires :</h1>

    <div>
        <div class="list">
            <div class="top">
                <form action="/dashboard/nouveau" method="post">
                    <input type="text" name="name" value="<?php echo old("name"); ?>" placeholder="nom" class="nompre">
                    <input type="text" name="prenom" value="<?php echo old("prenom"); ?>" placeholder="prenom" class="nompre">
                    <label for="nation">nationalité:</label>

                    <select name="nat" id="nation">
                        <?php
                        foreach ($nat as $nats) {
                        ?>
                            <option value='<?php echo $nats->getIdNat(); ?>'> <?php echo $nats->getNat(); ?> </option>
                        <?php
                        }
                        ?>
                    </select><br>
                    <label for="form">formation:</label>

                    <select name="form" id="form">
                        <?php
                        foreach ($formation as $formations) {
                        ?>
                            <option value='<?php echo $formations->getIdForm(); ?>'><?php echo $formations->getForm(); ?></option>
                        <?php
                        }
                        ?>
                    </select><br>
                    <label>formateurs par date:</label><br>
                    <?php
                    foreach ($formateur as $formateurs) {
                    ?>
                        <p class="margin"><input value='<?= $formateurs->getIdFormateur(); ?>' class='formateurs' type='checkbox' name='formateurs[]'>
                            <?=
                            $formateurs->getNomFormateur() . " " .
                                $formateurs->getPrenomFormateur();
                            ?>
                            dans la salle
                            <?=
                            $formateurs->getLibelle()
                            ?> début :
                            <input class='datedeb' type='date' name='datedeb[]'>
                            fin :
                            <input class='datefin' type='date' name='datefin[]'>
                            <input class='hidde' type='hidden' value='<?php foreach ($formateur2->getAllFormateur2($formateurs->getIdFormateur()) as $formateurs2) { ?><?= $formateurs2->getIdDuFormateur() . "_" ?><?php } ?>'>
                        </p><br>
                    <?php
                    }
                    ?>
                    <span class="error"><?php echo error("name"); ?></span>
                    <button type="submit" name="button"><i class="fas fa-plus"></i></button>
                </form>
            </div>
        </div>


    </div>

</section>
<script src="/js/app.js"></script>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
