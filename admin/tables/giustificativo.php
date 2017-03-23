<?php
/**
 * Giustificativo table class
 * 
 * @package    todarogiovanni.todpre
 * @subpackage Components
 * @license        GNU/GPL
 */
 
// No direct access
defined('_JEXEC') or die('Restricted access');
 
/**
 * Giustificativo Table class
 *
 * @package    todarogiovanni.todpre
 * @subpackage Components
 */
class TableGiustificativo extends JTable
{
    /**
     * Primary Key
     *
     * @var int
     */
    var $id = null;
 
    /**
     * @var string
     */
    var $nome = null;
    
    /**
     * @var string
     */
    var $codice = null;
 
    /**
     * Primary Key
     *
     * @var int
     */
    var $published = null;

    /**
     * Constructor
     *
     * @param object Database connector object
     */
    function __construct( &$db ) {
        parent::__construct('#__todpre_giustificativi', 'id', $db);
    }
    
	
}