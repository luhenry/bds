<?php echo link_to('< Retourner au sport', 'sport_show', $sport) ?><br/><br/>

<textarea style="width:100%" rows="20" ><?php for ( $i = 0 ; $i < $cotisants->count() - 1 ; $i++ ) { echo $cotisants[$i]->getEmail(), ', '; } ?><?php echo $cotisants[$i]->getEmail() ?></textarea>