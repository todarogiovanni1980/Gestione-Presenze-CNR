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
        JToolBarHelper::title( JText::_( 'Gestione Giustificativi' ), 'generic.png' );
        JToolBarHelper::publishList();
        JToolBarHelper::unpublishList();
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();

        // Get data from the model
        $items =& $this->get( 'Data');
        $pagination =& $this->get('Pagination');

        // push data into the template
        $this->assignRef( 'items', $items );
        $this->assignRef('pagination', $pagination);

        parent::display($tpl);
    }
}
