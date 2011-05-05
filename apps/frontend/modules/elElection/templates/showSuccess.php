<?php if ($sieges->count() > 0) : ?>
    <?php foreach ($sieges as $siege) : ?>
        <h2><?php echo $siege->getPoste() ?></h2><br/>
        <table class="table">
            <thead>
                <tr>
                    <th>Candidats</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siege->getListes() as $liste) : ?>
                    <tr>
                        <td>
                            <?php $cotisants = $liste->getCoCotisants() ?>
                            <?php $count = count($cotisants) ?>
                            <?php for ($i = 0; $i < $count - 1; $i++) : ?>
                                <?php echo link_to($cotisants[$i], 'cotisant_show', $cotisants[$i]) ?>,
                            <?php endfor ?>
                            <?php echo link_to($cotisants[$i], 'cotisant_show', $cotisants[$i]) ?>
                        </td>
                        <td><?php echo parse_bbcode($liste->getDescription()) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?php include_partial('elElection/vote', array('form' => $forms[$siege['id']], 'siege' => $siege)) ?><br/>
    <?php endforeach ?>
<?php else : ?>
    Merci pour votre participation à cette élection
<?php endif ?>