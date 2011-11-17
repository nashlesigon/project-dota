<?php

/**
 * main actions.
 *
 * @package    dota_resource
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{

	}

  public function executeCompute(sfWebRequest $request){
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');

//    $heroId = $request->getParameter('heroId');
    $heroLevel = $request->getParameter('heroLevel');
//    $itemIds = $request->getParameter('itemIds');

    $heroId = 1;
    $itemIds = array(1,2);

    echo json_encode(array('html' => get_partial('main/stats',array('data'=>DotaResourceData::getInstance()->getData($heroId,$heroLevel,$itemIds)))));
    $this->getResponse()->setContentType('text/json');
		exit;
  }
}
