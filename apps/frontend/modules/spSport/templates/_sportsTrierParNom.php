<div class="lst_sports">
    <?php foreach ($sports as $sport) : ?>
        <?php include_partial('spSport/sport', array('sport' => $sport, 'horaire' => count($sport['horaires']) > 0 ? $sport['horaires'][0] : null)) ?>
    <?php endforeach ?>

    <div class="clear" ></div>
</div>