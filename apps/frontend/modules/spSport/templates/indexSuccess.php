<?php $sf_response->setTitle('BDS - Les sports') ?>
<?php use_stylesheet('sports.css') ?>
<?php use_javascript('jquery.js') ?>

<h1>Les sports actifs ce semestre</h1>

<script type="text/javascript">
    $(document).ready(function() {
        $('.search input[type="submit"]').hide();

        $('#recherche').keyup(function(key) {
            if ((this.value.length > 2 || this.value == '')) {
                $('#recherche').addClass('searchBox');
                
                $.ajax({
                    url: document.URL,
                    data: { recherche: this.value },
                    complete: function() { $('#recherche').removeClass('searchBox'); },
                    success: function(data) { $('#sports').html(data); }
                });
            }
        });
    });
</script>

<div class="search" style="float:right">
    <form action="" method="get">
        <span style="font-size:15px">
            Trier par : <?php echo link_to('nom', '@sports?trier-par=nom') ?>, <?php echo link_to('jour', '@sports?trier-par=jour') ?>&nbsp;&nbsp;&nbsp;
            Recherche : <input type="text" id="recherche" name="recherche" value="<?php echo $sf_request->getParameter('recherche') ?>" style="height:20px"/>
            <input type="submit" value="Rechercher"/>
        </span>
    </form>
</div>

<?php if ($sf_request->getParameter('trier-par') === 'nom') : ?>
    <div style="clear:both"></div>
    <div id="sports">
        <?php include_component('spSport', 'sportsTrierParNom', array(
            'sf_cache_key' => 'sportsTrierParNom' . ($sf_request->hasParameter('recherche') ? '_recherche=' . $sf_request->getParameter('recherche') : '')
        )) ?>
    </div>
<?php else : ?>
    <a href="#lundi">Lundi</a>, <a href="#mardi">Mardi</a>, <a href="#mercredi">Mercredi</a>, <a href="#jeudi">Jeudi</a>, <a href="#vendredi">Vendredi</a>, <a href="#samedi">Samedi</a>, <a href="#dimanche">Dimanche</a><br/><br/>
    <div id="sports">
        <?php include_component('spSport', 'sportsTrierParJour', array(
            'sf_cache_key' => 'sportsTrierParJour' . ($sf_request->hasParameter('recherche') ? '_recherche=' . $sf_request->getParameter('recherche') : '')
        )) ?>
    </div>
<?php endif ?><br/>

<h1>Les sports inactifs ce semestre</h1>
<?php for ($count = count($inactifs), $i = 0 ; $i < $count - 1 ; $i++) : ?>
    <?php echo link_to($inactifs[$i], 'sport_show', $inactifs[$i]) ?>,&nbsp;
<?php endfor ?>
<?php echo link_to($inactifs[$i], 'sport_show', $inactifs[$i]) ?><br/><br/>

<div style="float:right">
    Design by Renaud Joly (Jumper)
</div><br/>