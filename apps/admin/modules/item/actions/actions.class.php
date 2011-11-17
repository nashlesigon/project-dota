<?php

/**
 * item actions.
 *
 * @package    dota_resource
 * @subpackage item
 * @author     Your name here
 */
class itemActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->Items = ItemPeer::doSelect(new Criteria());        
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new ItemForm();    
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ItemForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($Item = ItemPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Item does not exist (%s).', $request->getParameter('id')));
        $this->form = new ItemForm($Item);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($Item = ItemPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Item does not exist (%s).', $request->getParameter('id')));
        $this->form = new ItemForm($Item);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($Item = ItemPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Item does not exist (%s).', $request->getParameter('id')));
        $Item->delete();

        $this->redirect('item/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
                
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));        
        if ($form->isValid())
        {
            $Item = $form->save();
            //sfContext::getInstance()->getEventDispatcher()->notify(new sfEvent($university, 'university.on_create'));
//            ImageUploaderUtility::processUploadImage("image_filename", "item_images");
            $this->redirect('item/edit?id='.$Item->getId());
        }
    }
}
