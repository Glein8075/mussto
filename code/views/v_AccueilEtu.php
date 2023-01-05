<?php
//Tableau des fichiers CSS nécessaire
$style = ["main.css", "sideBarre.css", "accueilEtu.css", "accueilEtuGrid.css"];

//Appel de l'header
require_once(PATH_VIEW_COMPONENT.'header.php');


// Appel du composant SideBarre
// Définition du contenu de la sideBar

require_once(PATH_VIEW_COMPONENT.'sideBarre.php');
?>
<div class="welcome">
    <img id="student" src="assets/images/etudiant.png">
    <div class="msg">
        <h2>Bonjour <?= $_SESSION["firstname"]?> !</h2>
        <p>Tu as des nouvelles fraîches</p>
    </div>
</div>
<div class="informationEleve">
    <div id="lastMark" class="info">
        <h2>Dernière note</h2>
        <?php
            if (isset($last_devoir) && $last_devoir){?>
                <div class="last">
                    <h3 class="last-name"><?=$last_devoir['NOMMODULE']?></h3>
                    <p class="last-note"><?=$last_devoir['NOTE']?>/20</p>
                </div>
        <?php } else { ?>
            <p>Aucune notes pour le moment</p>
        <?php } ?>
    </div>
    <div id="sondage" class="info">
        <h2>Sondages</h2>
        <?php if(isset($sondages) && $sondages){
            foreach ($sondages as $sondage){?>
                <div style="background-color: <?=CSScolorByName($sondage['NOMMODULE'])?>" class="sondage" id="<?= $sondage['IDSONDAGE'] ?>">
                    <h3 class="sondage-nom"><?=$sondage['NOMMODULE']?></h3>
                    <div class="sondage-header">
                        <p class="sondage-prof"><?=$sondage['NOMEPROF']?></p>
                        <p class="sondage-date"><?=$sondage['DATESONDAGE']?></p>
                    </div>
                    <p class="sondage-message"><?=$sondage['CONTENUSONDAGE']?></p>
                </div>
        <?php } } else { ?>
            <p>Aucun sondage pour le moment</p>
        <?php } ?>
    </div>
    <div id="othersMarks" class="info">
        <h2>Autres notes</h2>
            <?php
            if (isset($other_devoir) && $other_devoir){
                foreach ($other_devoir as $notes){?>
                    <div class="note">
                        <h3 class="note-name"><?=$notes['NOMMODULE']?></h3>
                        <p class="note-date"><?=$notes['DATEDEVOIR']?></p>
                        <p class="note-number">Note : <?=$notes['NOTE']?>/20</p>
                    </div>
                <?php } } else { ?>
                <p>Aucune notes pour le moment</p>
            <?php } ?>
        </div>
    <div id="DS" class="info">
        <h2>DS à venir</h2>
        <?php if (isset($devoir_coming) && $devoir_coming){ //Si il a des devoirs
            foreach($devoir_coming as $devoir) {            //On boucle sur tous les devoirs pour créer la div?>
                <div style="background-color: <?=CSScolorByName($devoir['NOMMODULE'])?>" class="devoir">
                    <h3 class="devoir-module-name"><?=$devoir['NOMMODULE']?></h3>
                    <p class="devoir-content"><?=$devoir['CONTENUDEVOIR']?></p>
                    <p class="devoir-date"><?=$devoir['DATEDEVOIR']?></p>
                    <p class="devoir-salle">SALLE <?=$devoir['SALLE']?></p>
                </div>

        <?php } } else { ?>
            <p>Aucun devoir en prévision</p>
        <?php } ?>
    </div>
</div>
<script src="/assets/scripts/gestionSondage.js"></script>

<?php
//Appel du footer
require_once(PATH_VIEW_COMPONENT.'footer.php');
?>