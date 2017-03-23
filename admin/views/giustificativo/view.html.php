<?php
/**
 * Giustificativo View for Tod Presenze Component
 * 
 * @package    todarogiovanni.todpre
 * @subpackage Components
 * @license		GNU/GPL
 */
 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view' );
 
/**
 * Giustificativo View
 *
 * @package    todarogiovanni.todpre
 * @subpackage Components
 */
class TodpreViewGiustificativo extends JView
{
	/**
	 * display method of Giustificativo view
	 * @return void
	 **/
	function display($tpl = null)
	{
		//get the Giustificativo item
		$item		=& $this->get('Data');
		$isNew		= ($item->id < 1);
 
		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'Giustificativo' ).': <small><small>[ ' . $text.' ]</small></small>' );
		JToolBarHelper::save();
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}
 
		$this->assignRef('item',		$item);
 
		parent::display($tpl);
	}
}