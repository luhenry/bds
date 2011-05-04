<?php foreach ($cotisants as $cotisant): ?>
    <div style="float:left;width:150px;height:127.5px;text-align:center" >
        <div>
            <img src="<?php echo $cotisant->getPhPhoto()->getUrl('moyen') ?>" style="max-width:140px;max-height:105px" />
        </div>
        <?php echo link_to($cotisant, 'cotisant_show', $cotisant) ?>
    </div>
<?php endforeach ?>
<div style="clear:both" ></div>