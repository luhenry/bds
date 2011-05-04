<?php $count = $sports->count() ?>
<?php if ($count > 0) : ?>
    <?php foreach ($sports as $sport) : ?>
        <?php $horaire = $sport->getHoraires()->getFirst() ?>

        <?php if (!isset($ville) || $horaire->getSalle()->getVille() !== $ville) : ?>
            <?php if (isset($ville)) : ?>
                </table>
            <?php endif ?>

            <?php $ville = $horaire->getSalle()->getVille() ?>

            <table style="float:left;margin-right:25px">
                <tr>
                    <th colspan="2" style="text-align:center"><?php echo $ville ?></th>
                </tr>
        <?php endif ?>

        <tr>
            <td style="text-align:right"><?php echo link_to($sport, 'sport_show', $sport) ?></td>
            <td><?php echo format_date($horaire->getHeureDebut(), 't') ?> - <?php echo format_date($horaire->getHeureFin(), 't') ?></td>
        </tr>
    <?php endforeach ?>
    </table>
    <div class="clear"></div>
<?php else : ?>
    Aucun sport aujourd'hui
<?php endif ?>