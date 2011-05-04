<?php $sf_response->setTitle('BDS - Les actualités') ?>

<?php foreach ( $actualites as $actualite ) : ?>
    <br/><div>
        <span><b><?php echo link_to($actualite->getTitre(), 'actualite_show', $actualite) ?></b></span>
        par <?php include_partial('coCotisant/linkTo', array('cotisant' => $actualite->getCoCotisant())) ?>
        le <?php echo format_date($actualite->getCreatedAt(), 'D') ?>
        <span style="float:right"><?php include_partial('acCommentaire/formatedNumber', array('count' => $actualite->getCommentaires()->count())) ?></span><br/>
        Tags: <?php echo $actualite->getTags()->count() > 0 ? $actualite->printTags() : 'aucun' ?>
    </div><br/><hr/>
<?php endforeach ?>

<?php include_partial('composant/pager', array('route' => 'actualites', 'pager' => $pager, 'args' => null)) ?>