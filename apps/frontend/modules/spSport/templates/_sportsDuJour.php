<?php $count = $horaires->count() ?>
<?php for ($i = 0; $i < $count;) : ?>
    <table style="float:left;margin-right:25px" >
        <?php $ville = $horaires[$i]->getSalle()->getVille() ?>
        <tr>
            <th colspan="2" style="text-align:center"><?php echo $ville ?></th>
        </tr>
        <?php for (; $i < $count && $horaires[$i]->getSalle()->getVille() === $ville; $i++) : ?>
            <?php $sport = $horaires[$i]->getSport() ?>
            <tr>
                <td style="text-align:right"><?php echo link_to($sport, 'sport_show', $sport) ?></td>
                <td><?php echo format_date($horaires[$i]->getHeureDebut(), 't') ?> - <?php echo format_date($horaires[$i]->getHeureFin(), 't') ?></td>
            </tr>
        <?php endfor?>
    </table>
<?php endfor ?>