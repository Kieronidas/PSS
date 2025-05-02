<?php
/* Smarty version 4.2.1, created on 2025-05-02 18:39:54
  from 'module_file_tpl:News;customfieldstab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6814f55a1fde55_03510044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7dbe5564f99f7cd80695ccb8d1fd5581e2292d1' => 
    array (
      0 => 'module_file_tpl:News;customfieldstab.tpl',
      1 => 1746202546,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6814f55a1fde55_03510044 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\smarty\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\admin\\plugins\\function.admin_icon.php','function'=>'smarty_function_admin_icon',),));
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
  $('a.del_fielddef').click(function(ev){
    var self = $(this);
    ev.preventDefault();
    cms_confirm('<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('areyousure');?>
').done(function(){
       window.location = self.attr('href');
    })
  })
})
<?php echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['itemcount']->value > 0) {?>
<table class="pagetable">
	<thead>
		<tr>
			<th><?php echo $_smarty_tpl->tpl_vars['fielddeftext']->value;?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['typetext']->value;?>
</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'entry');
$_smarty_tpl->tpl_vars['entry']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->do_else = false;
?>
	<?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

		<tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
">
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->name;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->type;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->uplink;?>
</td>
	                <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->downlink;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
</td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->delete_url;?>
" class="del_fielddef"><?php echo smarty_function_admin_icon(array('icon'=>'delete.gif','alt'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('delete')),$_smarty_tpl);?>
</a></td>
		</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</tbody>
</table>
<?php }?>

<div class="pageoptions">
  <a href="<?php echo $_smarty_tpl->tpl_vars['addurl']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('addfielddef');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'newobject.gif'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('addfielddef');?>
</a>
</div>
<?php }
}
