<?php if ( $actualites->count() > 0 ) : ?>
    <table style="width:100%">
    <?php foreach ( $actualites as $actualite ) : ?>
        <tr>
            <td style="width:85px;text-align:right"><?php echo date('j/n/Y', strtotime($actualite->getCreatedAt())) === date('j/n/Y') ? date('H:i', strtotime($actualite->getCreatedAt())) : date('d/m H:i', strtotime($actualite->getCreatedAt())) ?></td>
            <td><?php echo link_to($actualite->getTitre(), 'actualite_show', $actualite) ?>
                <span style="float:right"><?php include_partial('acCommentaire/formatedNumber', array('count' => $actualite->getCommentaires()->count())) ?></span>
            </td>
        </tr>
    <?php endforeach ?>
    </table>
<?php else : ?>
    <?php if (isset($message) && isset($message['none'])) : ?>
        <?php echo $message['none'] ?>
    <?php else : ?>
        <i>Aucune actualité pour le moment</i>
    <?php endif ?>
<?php endif ?>