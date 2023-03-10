<?php
//Tableau des fichiers CSS nécessaire
$style = ["main.css", "sideBarre.css", "module.css"];

//Appel de l'header
require_once(PATH_VIEW_COMPONENT.'header.php');


//Appel du composant SideBarre

require_once(PATH_VIEW_COMPONENT.'sideBarre.php');
?>

    <div style="--color: <?=DegreeColorByName($module['NOMMODULE'])?>" class="module-detail">
        <div class="header">
            <h1><?=$module['REFMODULE']?> - <?=$module['NOMMODULE']?></h1>
            <a class="button" href="<?=$router->generate('module')?>">Retour à la liste des modules</a>
        </div>
        <p class="desc"><?=$module['DESCRIPTIONMODULE']?></p>
        <div class="content">
            <div class="prof">
                <h2>Enseignants : </h2>
                <ul>
                    <?php if ($enseignants) {
                        foreach ($enseignants as $prof){ ?>
                            <li><?=$prof['NOMEPROF']?> <?=$prof['PRENOMPROF']?></li>
                        <?php }
                    }?>
                </ul>
            </div>
            <div class="devoirs">
                <h2>Devoirs prochains : </h2>
                <div class="devoir-list">
                    <?php 
                    if ($devoirs){
                        foreach($devoirs as $devoir){
                            echo <<<HTML
                            <div class="devoir-elt">
                                <div>
                                    <h3>{$devoir['CONTENUDEVOIR']}</h3>
                                    <p>{$devoir['DATEDEVOIR']}</p>
                                </div>
                                <p class="salle" >Salle {$devoir['SALLE']}</p>
                                <p class="coef" >Coefficient : {$devoir['COEF']}</p>
                                <p class="desc" >{$devoir['DESCDEVOIR']}</p>
                            </div>
                            HTML;
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="notes">
                <h2>Notes : </h2>
                <div class="notes-list">
                    <?php if (isset($notes) && $notes) {
                        foreach ($notes as $note){ ?>
                            <div class="note-elt">
                                <div>
                                    <h3 class="note"><?=$note['NOTE']?>/20</h3>
                                    <p><?=$note['DATE_ENVOIE']?></p>
                                </div>
                                <p class="comment"><?php if ($note['COMMENTAIRE']) { echo "Commentaire : ".$note['COMMENTAIRE'];}?></p>
                                <p class="coef">Coefficient <?=$note['COEF']?></p>
                                <p class="ds-content"><?=$note['CONTENUDEVOIR']?></p>
                                <p class="ds-date">Devoir du <?=$note['DATEDEVOIR']?></p>
                            </div>
                            <?php
                        }
                    } else {
                        echo "Aucune note";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php if (isset($avg) and $avg){ ?>
            <div class="moyenne">
                <h2>Moyenne</h2>
                <h3 class="note"><?=$avg?> / 20</h3>
            </div>
        <?php } ?>
    </div>

<?php
//Appel du footer
require_once(PATH_VIEW_COMPONENT.'footer.php');
?>