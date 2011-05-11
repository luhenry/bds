<?php foreach ($cotisants as $cotisant): ?>
    <div style="float:left;width:150px;height:127.5px;text-align:center" >
        <div>
            <img src="/uploads/cotisants/photos/<?php echo $cotisant->getPhoto() ?>" style="max-width:140px;max-height:105px" />
        </div>
        <?php echo link_to($cotisant, 'cotisant_show', $cotisant) ?>
    </div>
<?php endforeach ?>
<div style="clear:both" ></div>