<li <?php echo $current === 'election' ? 'class="current"' : '' ?>>
    <?php echo link_to('Election' . ($elections->count() > 1 ? 's' : ''), 'elections') ?>
    <ul>
        <?php foreach ($elections as $election) : ?>
            <li><?php echo link_to($election, 'election_show', $election) ?></li>
        <?php endforeach ?>
    </ul>
</li>