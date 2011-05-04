<?php $sf_response->setTitle('BDS - ' . $actualite->getTitre()) ?>

<h1><?php echo $actualite->getTitre() ?></h1>
Ecrit par <?php echo link_to($actualite->getCoCotisant(), 'cotisant_show', $actualite->getCoCotisant()) ?> le <?php echo format_date($actualite->getCreatedAt(), 'D') ?><br/><br><br/>
<?php echo parse_bbcode($actualite->getContenu()) ?><br/><br/><br/>

<?php include_component('acCommentaire', 'list', array( 'actualite' => $actualite, 'page' => $sf_params->get('page'))) ?>