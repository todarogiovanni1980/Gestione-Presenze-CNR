<?php
/**
 * Todpre Model for Tod Presenze Component
 * 
 * @package    todarogiovanni.todpre
 * @subpackage Components
 * @license    GNU/GPL
 */
 
// No direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.model' );
 
/**
 * Todpre Model
 *
 * @package    todarogiovanni.todpre
 * @subpackage Components
 */
class TodpreModelTodpre extends JModel
{
    /**
    * Gets the greeting
    * @return string The greeting to be displayed to the user
    */
    function getGreeting()
    {
        return 'Default da Modello';
    }
}