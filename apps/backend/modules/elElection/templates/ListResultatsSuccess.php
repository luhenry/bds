<?php foreach ($election->getSieges() as $siege) : ?>
    <table>
        <tr>
            <th colspan="2"><?php echo $siege->getPoste() ?></th>
        </tr>
        <?php foreach ($siege->getListes() as $liste) : ?>
            <tr>
                <td>
                    <?php $candidats = $liste->getCoCotisants() ?>
                    <?php $count = $candidats->count() ?>
                    <?php for ($i = 0; $i < $count - 1; $i++) : ?>
                        <?php echo $candidats[$i] ?>,
                    <?php endfor ?>
                    <?php echo $candidats[$i] ?>
                </td>
                <td><?php echo $liste->getVotes()->count() ?></td>
            </tr>
        <?php endforeach ?>
    </table>
<?php endforeach ?>