<div class="sport">
    <h3><?php echo link_to($sport['nom'], 'sport_show', array('slug' => $sport['slug'])) ?></h3>
    <div class="resume_sport">
            <div class="info_sport resp">
                <?php $responsables = $sf_data->getRaw('sport') instanceof spSport ? $sport->getResponsables() : (isset($sport['responsables']) ? $sport['responsables'] : array()) ?>
                <?php $responsables_count = count($responsables) ?>
                
                <i><?php echo format_number_choice('[0,1]Responsable|[2,+Inf]Responsables', array(), $responsables_count) ?></i> :
                <?php if ($responsables_count > 0) : ?>
                    <?php $responsable = $responsables[rand(0, $responsables_count - 1)]['coCotisant'] ?>
                    <?php echo link_to($responsable['prenom'] . ' ' . $responsable['nom'], 'cotisant_show', array('slug' => $responsable['slug'])) ?>
                    <?php if ($responsables_count > 1) : ?>
                        , ...
                    <?php endif ?>
                <?php else : ?>
                    aucun responsable
                <?php endif ?>
            </div>        
            <?php if (isset($horaire) && $horaire !== null) : ?>
                <div class="info_sport horaire"><i>Horaires</i> : <?php echo strtolower(get_jour($horaire['jour'])), ' ', format_date($horaire['heure_debut'], 't'), ' à ', format_date($horaire['heure_fin'], 't') ?></div>
                <div class="info_sport lieu"><i>Lieu</i> : <?php echo $horaire['salle']['nom'] ?></div>
            <?php else : ?>
                <div class="info_sport horaire"><i>Horaires</i> : aucun horaire</div>
                <div class="info_sport lieu"><i>Lieu</i> : aucune salle</div>
            <?php endif ?>
            <div class="info_sport participants"><i>Participants</i> : <?php echo count($sport['participants']) ?></div>
    </div>
    <a class="plus_dinfos" href="<?php echo url_for('sport_show', array('slug' => $sport['slug'])) ?>">Plus d'infos >>> </a>
</div>