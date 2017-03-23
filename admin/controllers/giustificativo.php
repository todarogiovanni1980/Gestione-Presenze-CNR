<?php
/**
 * Giustificativo Controller for Tod Presenze Component
 * 
 * @package    todarogiovanni.todpre
 * @subpackage Components
 * @license		GNU/GPL
 */
 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
/**
 * Giustificativo Controller
 *
 * @package    todarogiovanni.todpre
 * @subpackage Components
 */
class TodpreControllerGiustificativo extends TodpreController
{
	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();
 
		// Register Extra tasks
		$this->registerTask( 'add'  , 	'edit' );
	}
	
	/**
     * Set the item to be published
     */
    function publish()
    {
    	// Check for request forgeries
    	//JRequest::checkToken() or jexit( 'Invalid Token' );

    	// Get some variables from the request
    	$menutype = JRequest::getVar('menutype', '', 'post', 'menutype');
    	$cid	= JRequest::getVar( 'cid', array(), 'post', 'array' );
    	JArrayHelper::toInteger($cid);

    	$model = $this->getModel( 'giustificativo' );
    	if ($model->setItemState($cid, 1)) {
    		$msg = JText::sprintf( 'Giustificativo Published', count( $cid ) );
    	} else {
    		$msg = $model->getError();
    	}
    	$this->setRedirect('index.php?option=com_todpre&view=giustificativi' . $menutype, $msg);
    }

    /**
     * Set the item to be not published
     */
    function unpublish()
    {
    	// Check for request forgeries
    	//JRequest::checkToken() or jexit( 'Invalid Token' );

    	// Get some variables from the request
    	$menutype = JRequest::getVar('menutype', '', 'post', 'menutype');
    	$cid	= JRequest::getVar( 'cid', array(), 'post', 'array' );
    	JArrayHelper::toInteger($cid);

    	$model = &$this->getModel( 'giustificativo' );
    	if ($model->setItemState($cid, 0)) {
    		$msg = JText::sprintf( 'Giustificativo Unpublished', count( $cid ) );
    	} else {
    		$msg = $model->getError();
    	}
    	$this->setRedirect('index.php?option=com_todpre&view=giustificativi', $msg);
    }
	
	/**
	 * display the edit form
	 * @return void
	 */
	function edit()
	{
		JRequest::setVar( 'view', 'giustificativo' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);
 
		parent::display();
	}
	
	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save()
	{
	    $model = $this->getModel('giustificativo');
	 
	    if ($model->store()) {
	        $msg = JText::_( 'giustificativo Saved!' );
	    } else {
	        $msg = JText::_( 'Error Saving giustificativo' );
	    }
	 
	    // Check the table in so it can be edited.... we are done with it anyway
	    $link = 'index.php?option=com_todpre&view=giustificativi';
	    $this->setRedirect($link, $msg);
	}
	
	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
	    $model = $this->getModel('giustificativo');
	    if(!$model->delete()) {
	        $msg = JText::_( 'Error: One or More giustificativi Could not be Deleted' );
	    } else {
	        $msg = JText::_( 'giustificativo(i) Deleted' );
	    }
	 
	    $this->setRedirect( 'index.php?option=com_todpre&view=giustificativi', $msg );
	}
	
	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
	    $msg = JText::_( 'Operazione Annullata' );
	    $this->setRedirect( 'index.php?option=com_todpre&view=giustificativi', $msg );
	}
}