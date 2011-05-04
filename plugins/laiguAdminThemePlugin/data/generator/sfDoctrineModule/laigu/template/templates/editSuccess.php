[?php use_helper('I18N', 'Date', 'Url') ?]

[?php if(!$sf_request->isXmlHttpRequest()): ?]<div class="laigu" id="sf_admin_container">[?php endif ?]
  <h1>[?php echo <?php echo $this->getI18NString('edit.title') ?> ?]</h1>

  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

  <div id="sf_admin_header">
    [?php include_partial('<?php echo $this->getModuleName() ?>/form_header', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
  </div>

  <div id="sf_admin_content">
    [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
  </div>

  <div id="sf_admin_footer">
    [?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
  </div>

[?php foreach($configuration->getEditDetail() as $k => $v): ?]
<div id="detail_[?php echo $k ?]" class="laigu"></div>
<script type="text/javascript">
  [?php $xget = array(); foreach($v["params"] as $paramk => $paramv) $xget[] = "xget[$paramk]=".$<?php echo $this->getSingularName() ?>->$paramv() ?]
  Ext.get("detail_[?php echo $k ?]").load({url: "[?php echo url_for($v["module"]."/index") ?]?[?php echo implode("&", $xget) ?]", scripts: true});
</script>
[?php endforeach ?]

[?php if(!$sf_request->isXmlHttpRequest()): ?]</div>[?php endif ?]

[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]
