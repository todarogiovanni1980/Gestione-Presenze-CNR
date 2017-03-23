<?php
/**
 * @package    todarogiovanni.todpre
 * @subpackage Components
 * @license    GNU/GPL
 */
 
// no direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');
 
/**
 * HTML View class for the Tod Presenze Component
 *
 * @package    todpre
 */
 
class TodpreViewRichieste extends JView
{
    function display($tpl = null)
    {
        //$greeting = "Richieste";
        
        $model = &$this->getModel();
		$greeting = $model->getGreeting();
		
        $this->assignRef( 'greeting', $greeting );
 
        parent::display($tpl);
    }
}