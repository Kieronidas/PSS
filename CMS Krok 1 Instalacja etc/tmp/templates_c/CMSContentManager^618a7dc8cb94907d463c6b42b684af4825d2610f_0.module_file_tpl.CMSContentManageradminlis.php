<?php
/* Smarty version 4.2.1, created on 2025-05-02 18:38:21
  from 'module_file_tpl:CMSContentManager;admin_listsettings_tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6814f4fd825ed5_15746714',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '618a7dc8cb94907d463c6b42b684af4825d2610f' => 
    array (
      0 => 'module_file_tpl:CMSContentManager;admin_listsettings_tab.tpl',
      1 => 1746202540,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6814f4fd825ed5_15746714 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),2=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),3=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
echo smarty_function_form_start(array('action'=>'admin_listsettings_tab'),$_smarty_tpl);?>

<div class="pageoverflow">
	<p class="pagetext"></p>
	<p class="pageinput">
		<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
" accesskey="s"/>
	</p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="namecolumn"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_list_namecolumn');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_listsettings_namecolumn','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_list_namecolumn')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<select id="namecolumn" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
list_namecolumn">
			<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['namecolumnopts']->value,'selected'=>$_smarty_tpl->tpl_vars['list_namecolumn']->value),$_smarty_tpl);?>

		</select></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="visiblecolumns"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_list_visiblecolumns');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_listsettings_visiblecolumns','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_list_visiblecolumns')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<select id="visiblecolumns" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
list_visiblecolumns[]" multiple="multiple" size="5">
			<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['visible_column_opts']->value,'selected'=>$_smarty_tpl->tpl_vars['list_visiblecolumns']->value),$_smarty_tpl);?>

		</select></p>
</div>
<?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
}
