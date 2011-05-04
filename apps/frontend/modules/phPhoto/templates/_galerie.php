<?php foreach ( $photos as $photo ) : ?>
    <div class="photo" style="width:160px;height:120px;float:left;text-align:center;">
        <a href="<?php echo $photo->getUrl('grand') ?>" >
            <img src="<?php echo $photo->getUrl('moyen') ?>" style="max-height:112.5px;max-width:150px" />
        </a>
    </div>
<?php endforeach ?>
<div style="clear:both" ></div>