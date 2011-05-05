<li <?php echo $current === 'elections' ? 'class="current"' : '' ?>>
    <?php if ($elections->count() > 1) : ?>
        <?php // echo link_to('Elections', 'elections') ?>
        <a href>Elections</a>
        <ul>
            <?php foreach ($elections as $election) : ?>
                <li><?php echo link_to($election, 'election_show', $election) ?></li>
            <?php endforeach ?>
        </ul>
    <?php else : ?>
        <?php echo link_to('Elections', 'election_show', $elections->getFirst()) ?>
    <?php endif ?>
</li>