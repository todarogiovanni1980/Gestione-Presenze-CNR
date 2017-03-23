<?php defined('_JEXEC') or die('Restricted access'); ?>
 
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Details' ); ?></legend>
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="nome">
                    <?php echo JText::_( 'Nome' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="nome" id="nome" size="32" maxlength="250" value="<?php echo $this->item->nome;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="nome">
                    <?php echo JText::_( 'Codice' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="codice" id="codice" size="32" maxlength="250" value="<?php echo $this->item->codice;?>" />
            </td>
        </tr>
    </table>
    </fieldset>
</div>
 
<div class="clr"></div>
 
<input type="hidden" name="option" value="com_todpre" />
<input type="hidden" name="id" value="<?php echo $this->item->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="giustificativo" />
</form>