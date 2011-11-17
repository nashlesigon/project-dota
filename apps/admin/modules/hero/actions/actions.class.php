<?php

/**
 * hero actions.
 *
 * @package    dota_resource
 * @subpackage hero
 * @author     Your name here
 */
class heroActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Heros = HeroPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new HeroForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new HeroForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Hero = HeroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Hero does not exist (%s).', $request->getParameter('id')));
    $this->form = new HeroForm($Hero);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Hero = HeroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Hero does not exist (%s).', $request->getParameter('id')));
    $this->form = new HeroForm($Hero);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Hero = HeroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Hero does not exist (%s).', $request->getParameter('id')));
    $Hero->delete();

    $this->redirect('hero/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Hero = $form->save();

      $this->redirect('hero/edit?id='.$Hero->getId());
    }
  }
}
