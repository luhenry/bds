<div class="ga">
    <h2 class="nom_ga"><?php echo link_to($activite, 'activite_show', $activite) ?></h2>
    <div class="resume_ga">
        <div class="info_ga contact"><i>Contact</i> : <?php echo link_to($activite->getContact(), 'cotisant_show', $activite->getContact()) ?></div>
        <div class="info_ga date"><i>Date</i> : du <?php echo format_date($activite->getDateDebut(), 'p') ?> au <?php echo format_date($activite->getDateFin(), 'p') ?></div>
        <div class="info_ga lieu"><i>Lieu</i> : <?php echo $activite->getLieu() ?></div>
        <div class="info_ga participants"><i>Participants</i> : <?php echo $activite->getParticipants()->count() ?></div>
        <div class="info_ga site"><i>Site internet</i> : <a href="<?php echo $activite->getSite() ?>"><?php echo $activite->getSite() ?></a></div>
    </div>
    <div class="desc_ga"><?php echo truncate_text(parse_bbcode($activite->getDescription()), 400, '...', true) ?></div>
    <a class="plus_dinfos" href="<?php echo url_for('activite_show', $activite) ?>">Plus d'infos >>> </a>
</div>