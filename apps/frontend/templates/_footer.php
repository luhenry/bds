<div id="elements">
    <div class="item one">
        <a href="http://www.utbm.fr/" title="UTBM">
            <img src="/images/utbm.gif" style="margin : auto; margin-top : 25px;" alt="UTBM" />
        </a>
    </div>
    <div class="item two">
        <h4><img src="/images/footer_info.gif" width="124" height="16" alt="EngineHosting" /></h4>

        <div class="details">
            <p>Pour tout problème concernant le site, veuillez contacter l'équipe informatique.</p>
        </div>
        <div class="buttonLinkMed"><?php echo link_to('Signaler un problème', 'information_contact') ?></div>
    </div>
    <div class="item three">
        <h4><img src="/images/rencontre.png" width="128" height="16" alt="Nous rencontrer" /></h4>
        <div class="details">
            <ul id="support">
                <li class="groupOne"><?php echo link_to('Belfort', 'information_adresses') ?></li>
                <li class="groupTwo"><?php echo link_to('Sevenans', 'information_adresses') ?></li>
                <li class="groupOne"><?php echo link_to('Montbéliard', 'information_adresses') ?></li>
            </ul>
        </div>

        <div class="buttonLinkLarge"><?php echo link_to('Les adresses', 'information_adresses') ?></div>
    </div>
    <div class="item four">
        <div class="buttonLinkMed"><?php echo link_to('Mentions légales', 'information_mentions_legales') ?></div>
    </div>
</div>