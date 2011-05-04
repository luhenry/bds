[?php

require_once(dirname(__FILE__).'/../lib/Base<?php echo ucfirst($this->moduleName) ?>GeneratorConfiguration.class.php');
require_once(dirname(__FILE__).'/../lib/Base<?php echo ucfirst($this->moduleName) ?>GeneratorHelper.class.php');

/**
 * <?php echo $this->getModuleName() ?> actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 */
abstract class <?php echo $this->getGeneratedModuleName() ?>Actions extends sfActions
{
  public function redirectAjax($url, $delay = 0, $statusCode = 302)
  {
    $url = $this->getController()->genUrl($url, true);
    $xGet = laiguAdminTheme::xGet();
    if(!empty($xGet))
    {
      if(strpos($url, '?') !== false) $this->_redirectAjax($url.'&'.laiguAdminTheme::xGet());
      else $this->_redirectAjax($url.'?'.laiguAdminTheme::xGet());
    }
    else $this->_redirectAjax($url);

    throw new sfStopException();
  }

  private function _redirectAjax($url)
  {
    if (empty($url))
    {
      throw new InvalidArgumentException('Cannot redirect to an empty URL.');
    }

    if (sfConfig::get('sf_logging_enabled'))
    {
      $this->dispatcher->notify(new sfEvent($this, 'application.log', array(sprintf('Redirect to "%s"', $url))));
    }

    // redirect
    echo ('<div id="div_redirect"></div><script type="text/javascript">laiguLoadAjax("'.$url.'", "div_redirect");</script>');
    exit();
  }


  public function preExecute()
  {
    // disable layout if is an ajax request
    if($this->getRequest()->isXmlHttpRequest())
    {
      $this->setLayout(false);
    }

    $xGet = $this->getRequest()->getParameter('xget');

    // uuid used to keep divs separated
    $this->uuid = uniqid();
    
    $this->configuration = new <?php echo $this->getModuleName() ?>GeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new <?php echo $this->getModuleName() ?>GeneratorHelper();
  }

  public function postExecute()
  {
    $xGet = $this->getRequest()->getParameter('xget');

    if(!empty($xGet))
    {
      if(!empty($this->form))
      {
        foreach($xGet as $key => $value)
        {
          // form model
          $this->form->setWidget($key, new sfWidgetFormInputHidden());
          $this->form->setDefault($key, $value);
        }
      }
      if(!empty($this->filters))
      {
        foreach($xGet as $key => $value)
        {
          // form filter
          unset($this->filters[$key]);
        }
      }
      $this->setLayout(false);
    }

    parent::postExecute();
  }

<?php include dirname(__FILE__).'/../../parts/indexAction.php' ?>

<?php if ($this->configuration->hasFilterForm()): ?>
<?php include dirname(__FILE__).'/../../parts/filterAction.php' ?>
<?php endif; ?>

<?php include dirname(__FILE__).'/../../parts/newAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/createAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/editAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/updateAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/deleteAction.php' ?>

<?php if ($this->configuration->getValue('list.batch_actions')): ?>
<?php include dirname(__FILE__).'/../../parts/batchAction.php' ?>
<?php endif; ?>

<?php include dirname(__FILE__).'/../../parts/processFormAction.php' ?>

<?php if ($this->configuration->hasFilterForm()): ?>
<?php include dirname(__FILE__).'/../../parts/filtersAction.php' ?>
<?php endif; ?>

<?php include dirname(__FILE__).'/../../parts/paginationAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/sortingAction.php' ?>
}
