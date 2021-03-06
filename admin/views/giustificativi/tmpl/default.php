<?php defined('_JEXEC') or die('Restricted access'); ?>

<form action="index.php" method="post" name="adminForm">
	<div id="editcell">
	    <table class="adminlist">
	    <thead>
	        <tr>
		    <th width="20"> <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" /> </th>
	            <th width="5"> <?php echo JHTML::_('grid.sort', JText::_('ID'), 'id', $this->lists['order_Dir'], $this->lists['order'] ); ?> </th>
	            <th width="5"> <?php echo JText::_( 'Codice' ); ?> </th>
	            <th> <?php echo JHTML::_('grid.sort', JText::_('Nome'), 'nome', $this->lists['order_Dir'], $this->lists['order'] ); ?> </th>
	            <th width="5"> <?php echo JText::_( 'Stato' ); ?> </th>
	        </tr>
	    </thead>

			<tfoot>
				<tr>
					<td colspan="9"><?php echo $this->pagination->getListFooter(); ?></td>
				</tr>
			</tfoot>

	    <?php
	    $k = 0;
	    foreach ($this->items as $i => $row)
	    {
		    $checked    = JHTML::_( 'grid.id', $i, $row->id );
		    $link 		= JRoute::_( 'index.php?option=com_todpre&controller=giustificativo&task=edit&cid[]='. $row->id );
		    $published 	= JHTML::_('grid.published', $row , $i);
	        ?>
	        <tr class="<?php echo "row" . $k; ?>">
		        <td> <?php echo $checked; ?> </td>
	            <td> <?php echo $row->id; ?> </td>
	            <td> <?php echo $row->codice; ?> </td>
	            <td> <a href="<?php echo $link; ?>"><?php echo $row->nome; ?></a> </td>
	            <td> <?php echo $published; ?> </td>
	        </tr>
	        <?php
	        $k = 1 - $k;
	    }
	    ?>
	    </table>
	</div>

	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="" />
	<input type="hidden" name="option" value="com_todpre" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="controller" value="giustificativo" />
	<input type="hidden" name="view" value="giustificativi" />

</form>
