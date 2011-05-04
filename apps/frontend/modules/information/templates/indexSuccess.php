<?php $sf_response->setTitle('Bienvenue sur le site du BDS') ?>

<h1>Les dernières actualités du BDS</h1>
<?php include_component('acActualite', 'flux') ?><br/>

<h1>Les sports du jour</h1>
<?php include_component('spSport', 'sportsDuJour') ?>