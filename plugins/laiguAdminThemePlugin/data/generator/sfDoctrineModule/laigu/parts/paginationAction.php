  protected function getPager()
  {
    $pager = $this->configuration->getPager('<?php echo $this->getModelClass() ?>');
    $pager->setQuery($this->buildQuery());
    $pager->setPage($this->getPage());
    $pager->setMaxPerPage($this->getMaxPerPage()); // laigu
    $pager->setParameter("max_per_page_options", array(10, 20, 50, 100));
    $pager->init();

    return $pager;
  }

  protected function setMaxPerPage($max_per_page)
  {
    $this->getUser()->setAttribute('laigu.max_per_page', $max_per_page, 'admin_module');
  }

  protected function getMaxPerPage()
  {
    return $this->getUser()->getAttribute('laigu.max_per_page', 20, 'admin_module');
  }

  protected function setPage($page)
  {
    $this->getUser()->setAttribute('<?php echo $this->getModuleName() ?>.page', $page, 'admin_module');
  }

  protected function getPage()
  {
    return $this->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.page', 1, 'admin_module');
  }

  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
<?php if ($this->configuration->hasFilterForm()): ?>
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $this->filters->setTableMethod($tableMethod);

    $query = $this->filters->buildQuery($this->getFilters());
<?php else: ?>
    $query = Doctrine::getTable('<?php echo $this->getModelClass() ?>')
      ->createQuery('a');

    if ($tableMethod)
    {
      $query = Doctrine::getTable('<?php echo $this->getModelClass() ?>')->$tableMethod($query);
    }
<?php endif; ?>

    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();


    // LAIGU
    $xGet = $this->getRequest()->getParameter('xget');
    if(!empty($xGet))
    {
      foreach($xGet as $key => $value)
      {
         $query->andWhere($key.' = ?', $value);
      }
    }

    return $query;
  }
