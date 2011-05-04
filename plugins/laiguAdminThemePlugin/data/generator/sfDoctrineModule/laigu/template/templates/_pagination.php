<script type="text/javascript">
  laigu_update_max_per_page = function (max_per_page, el)
  {
    laiguLoadAjax("[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?max_per_page=" + max_per_page + "&[?php echo laiguAdminTheme::xGet() ?]", el);
  }
</script>

<div class="sf_admin_pagination">

  [?php echo __("Max. per page") ?]
  <select onchange="laigu_update_max_per_page(this.value, this)">
    [?php foreach($pager->getParameter("max_per_page_options") as $option): ?]
      <option value="[?php echo $option ?]" [?php if($option == $pager->getMaxPerPage()): ?]selected="selected"[?php endif ?]>[?php echo $option ?]</option>
    [?php endforeach ?]
  </select>

  <a class="laigu_ajax" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1&[?php echo laiguAdminTheme::xGet() ?]">
    [?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/first.png', array('alt' => __('First page', array(), 'sf_admin'), 'title' => __('First page', array(), 'sf_admin'))) ?]
  </a>

  <a class="laigu_ajax" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]&[?php echo laiguAdminTheme::xGet() ?]">
    [?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/previous.png', array('alt' => __('Previous page', array(), 'sf_admin'), 'title' => __('Previous page', array(), 'sf_admin'))) ?]
  </a>

  [?php foreach ($pager->getLinks() as $page): ?]
    [?php if ($page == $pager->getPage()): ?]
      [?php echo $page ?]
    [?php else: ?]
      <a class="laigu_ajax" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]&[?php echo laiguAdminTheme::xGet() ?]">[?php echo $page ?]</a>
    [?php endif; ?]
  [?php endforeach; ?]

  <a class="laigu_ajax" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]&[?php echo laiguAdminTheme::xGet() ?]">
    [?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/next.png', array('alt' => __('Next page', array(), 'sf_admin'), 'title' => __('Next page', array(), 'sf_admin'))) ?]
  </a>

  <a class="laigu_ajax" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]&[?php echo laiguAdminTheme::xGet() ?]">
    [?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/last.png', array('alt' => __('Last page', array(), 'sf_admin'), 'title' => __('Last page', array(), 'sf_admin'))) ?]
  </a>
</div>
