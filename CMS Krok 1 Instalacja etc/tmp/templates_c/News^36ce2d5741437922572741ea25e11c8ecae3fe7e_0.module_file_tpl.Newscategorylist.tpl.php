<?php
/* Smarty version 4.2.1, created on 2025-05-02 18:39:54
  from 'module_file_tpl:News;categorylist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6814f55a0a4347_02375895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36ce2d5741437922572741ea25e11c8ecae3fe7e' => 
    array (
      0 => 'module_file_tpl:News;categorylist.tpl',
      1 => 1746202546,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6814f55a0a4347_02375895 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.cms_action_url.php','function'=>'smarty_cms_function_cms_action_url',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\admin\\plugins\\function.admin_icon.php','function'=>'smarty_function_admin_icon',),2=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.repeat.php','function'=>'smarty_function_repeat',),3=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\modifier.cms_escape.php','function'=>'smarty_modifier_cms_escape',),));
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
  $('a.del_cat').click(function(ev){
    var self = $(this);
    ev.preventDefault();
    cms_confirm('<?php echo strtr((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('areyousure'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S" ));?>
').done(function(){
      window.location = self.attr('href');
    });
  });
});
<?php echo '</script'; ?>
>

<div class="pageoptions"><p class="pageoptions">
  <a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'addcategory'),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('addcategory');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'newobject.gif'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('addcategory');?>
</a>
  &nbsp;
  <?php if ($_smarty_tpl->tpl_vars['itemcount']->value > 1) {?><a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_reorder_cats'),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('reorder');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'reorder.gif'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('reorder');?>
</a><?php }?>
</p></div>

<?php if ($_smarty_tpl->tpl_vars['itemcount']->value > 0) {?>
<table class="pagetable">
	<thead>
		<tr>
			<th><?php echo $_smarty_tpl->tpl_vars['categorytext']->value;?>
</th>
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
		<tr class="<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
">
			<td><?php echo smarty_function_repeat(array('string'=>'&nbsp;&gt;&nbsp','times'=>$_smarty_tpl->tpl_vars['entry']->value->depth),$_smarty_tpl);?>
<a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->edit_url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit');?>
"><?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['entry']->value->name);?>
</a></td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->edit_url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'edit.gif'),$_smarty_tpl);?>
</a></td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->delete_url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('delete');?>
" class="del_cat"><?php echo smarty_function_admin_icon(array('icon'=>'delete.gif'),$_smarty_tpl);?>
</a></td>
		</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</tbody>
</table>
<?php }
}
}
