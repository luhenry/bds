  public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirectAjax('@<?php echo $this->getUrlForAction('list') ?>');
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirectAjax('@<?php echo $this->getUrlForAction('list') ?>');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

<?php if(version_compare(SYMFONY_VERSION, "1.3.0") >= 0): ?>
    $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => '<?php echo $this->getModelClass() ?>'));
<?php else: ?>
    $validator = new sfValidatorDoctrineChoiceMany(array('model' => '<?php echo $this->getModelClass() ?>'));
<?php endif ?>    
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items as some items do not exist anymore.');
    }

    $this->redirectAjax('@<?php echo $this->getUrlForAction('list') ?>');
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('<?php echo $this->getModelClass() ?>')
      ->whereIn('<?php echo $this->getPrimaryKeys(true) ?>', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $record->delete();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    $this->redirectAjax('@<?php echo $this->getUrlForAction('list') ?>');
  }
