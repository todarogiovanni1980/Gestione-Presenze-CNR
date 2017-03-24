<?php
/**
 * Giustificativi View for Tod Presenze Component
 *
 * @package    todarogiovanni.todpre
 * @subpackage Components
 * @license        GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

/**
 * Giustificativi View
 *
 * @package    todarogiovanni.todpre
 * @subpackage Components
 */
class TodpreViewGiustificativi extends JView
{
    /**
     * Giustificativi view display method
     * @return void
     **/
    function display($tpl = null)
    {
        global $mainframe;

    	    // Prepare list array
    		$lists = array();

    		// Get the user state
    		$filter_order = $mainframe->getUserStateFromRequest(
    		                 $option.'filter_order',
    		                 'filter_order', 'published');
    		$filter_order_Dir = $mainframe->getUserStateFromRequest(
    		                      $option.'filter_order_Dir',
    		                      'filter_order_Dir', 'ASC');

    		// Build the list array for use in the layout
    		$lists['order'] = $filter_order;
    		$lists['order_Dir'] = $filter_order_Dir;

        JToolBarHelper::title( JText::_( 'Gestione Giustificativi' ), 'generic.png' );
        JToolBarHelper::publishList();
        JToolBarHelper::unpublishList();
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();
        JToolBarHelper::preferences('com_todpre', '200');

        // Get data from the model
        $items =& $this->get( 'Data');
        $pagination =& $this->get('Pagination');

        // push data into the template
        $this->assignRef( 'items', $items );
        $this->assignRef('pagination', $pagination);
        $this->assignRef('lists', $lists);

        parent::display($tpl);
    }
}
