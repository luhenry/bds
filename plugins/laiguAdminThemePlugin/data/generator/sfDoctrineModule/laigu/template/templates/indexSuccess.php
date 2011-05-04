[?php use_helper('I18N', 'Date') ?]

[?php if(!$sf_request->isXmlHttpRequest()): ?]<div class="laigu" id="sf_admin_container">[?php endif ?]
  <h1>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h1>

  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

  <div id="sf_admin_header">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]
  </div>

<?php if ($this->configuration->hasFilterForm()): ?>
<?php $local_uuid = uniqid() ?>
<div id="filter_win<?php echo $local_uuid ?>" class="x-container" style="visibility: hidden; float: right;">
    <div class="x-panel-header">[?php echo __('Filters', array(), 'sf_admin') ?]</div>
    <div class="x-panel-body" id="filter_div<?php echo $local_uuid ?>">
      [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
    </div>
</div>

<script type="text/javascript">
Ext.onReady(function(){
    var panel;
    panel = new Ext.Panel({
        title: 'Filters',
        collapsible: true,
<?php $filter_params = $this->configuration->getFilterParams(); ?>
<?php if(isset($filter_params["collapsed"]) && $filter_params["collapsed"]): ?>
        collapsed: true,
        expandOnShow: false,
<?php endif ?>
        applyTo:'filter_win<?php echo $local_uuid ?>',
        style: {visibility: 'visible'}
    });
    panel.show();

});
</script>

<?php endif; ?>

  <div id="sf_admin_content">
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
    <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array_merge(array('action' => 'batch'), laiguAdminTheme::xGetArray())) ?]" method="post">
<?php endif; ?>
    [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
    <ul class="sf_admin_actions">
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
    </ul>
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
    </form>
<?php endif; ?>
  </div>

  <div id="sf_admin_footer">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
  </div>
[?php if(!$sf_request->isXmlHttpRequest()): ?]</div>[?php endif ?]

[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]
