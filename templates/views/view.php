<?php

	/*
	** Generated by Joomla Admin Generator
	** Author: {AUTHOR_NAME}
	** Email: {AUTHOR_EMAIL}
	** 
	** Component:  {COMPONENT_PATH}
	** View: Render_HTML
	** File: {FILE_NAME}
	** Time: {TIME}
	*/

	class Render_HTML
	{
		function editRecord($edit, $row, $image_path_from_select = '/images/')
		{
			{GET_EDITOR}
			?>
			<form action="index.php" method="post" name="adminForm" enctype="multipart/form-data">
				<div class="col width-60">
					<fieldset class="adminform">
						<legend><?php echo JText::_( 'Details' ); ?></legend>
						<table class="admintable">
							{FORM_FIELDS}
						</table>
					</fieldset>
				</div>

				<div class="col width-40"></div>
				<div class="clr"></div>
				<input type="hidden" name="c" value="<?php echo JRequest::getVar('c')?>" />
				<input type="hidden" name="option" value="<?php echo JRequest::getVar('option')?>" />
				<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
				<input type="hidden" name="task" value="<?php echo JRequest::getVar('task')?>" />
				<input type="hidden" name="action" value="<?php echo $edit==true?'edit':'add'?>" />
				<?php echo JHTML::_( 'form.token' ); ?>
				<?php JHTML::_('behavior.calendar'); ?>
			</form>
			<?
		}

		function showRecord($rows, $page, $list = array())
		{
			?>
				<form action="index.php" method="post" name="adminForm">
					<table>
						<tr>
							<td align="left">Find <input type="text" name="keywords" /></td>
							<td align="right">{FILTER}</td>
						</tr>
					</table>
					<table class="adminlist">
					<thead>
						<tr>
							<th width="10">
								<?php echo JText::_( 'NUM' ); ?>
							</th>
							<th width="10">
								<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows );?>);" />
							</th>
							{TABLE_FIELDS_NAME}
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td colspan="7">
								<?php echo $page->getListFooter(); ?>
							</td>
						</tr>
					</tfoot>
					<tbody>
						<?php
							$i=0; 
						if(count($rows)>=1){
							foreach($rows as $k=>$v){
								$checked 	= JHTML::_('grid.checkedout',   $v, $i );
								?>
								<tr>
									<td><?php echo $page->getRowOffset( $i ); ?></td>
									<td><?php echo $checked?></td>
									{TABLE_FIELDS_VALUE}
								<?php 
								$i++;
							}
						}
						?>
					</tbody>
					</table>
				<input type="hidden" name="c" value="<?php echo JRequest::getVar('c')?>" />
				<input type="hidden" name="option" value="<?php echo JRequest::getVar('option')?>" />
				<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
				<input type="hidden" name="task" value="<?php echo JRequest::getVar('task')?>" />
				<input type="hidden" name="boxchecked" value="0" />
				<?php echo JHTML::_( 'form.token' ); ?>
				</form>
			<?
		}

	}
?>
