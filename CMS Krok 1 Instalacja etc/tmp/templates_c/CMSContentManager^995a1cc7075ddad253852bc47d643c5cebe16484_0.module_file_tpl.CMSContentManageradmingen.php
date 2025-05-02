<?php
/* Smarty version 4.2.1, created on 2025-05-02 18:38:21
  from 'module_file_tpl:CMSContentManager;admin_general_tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6814f4fd706103_53915875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '995a1cc7075ddad253852bc47d643c5cebe16484' => 
    array (
      0 => 'module_file_tpl:CMSContentManager;admin_general_tab.tpl',
      1 => 1746202540,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6814f4fd706103_53915875 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),2=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),3=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
echo smarty_function_form_start(array('action'=>'admin_general_tab'),$_smarty_tpl);?>

<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
    <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
" accesskey="s"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><label for="locktimeout"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_locktimeout');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_general_locktimeout','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_locktimeout')),$_smarty_tpl);?>
</p>
  <p class="pageinput">
    <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
locktimeout" value="<?php echo $_smarty_tpl->tpl_vars['locktimeout']->value;?>
" size="3" maxlength="3"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><label for="lockrefresh"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_lockrefresh');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_general_lockrefresh','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_lockrefresh')),$_smarty_tpl);?>
</p>
  <p class="pageinput">
    <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
lockrefresh" value="<?php echo $_smarty_tpl->tpl_vars['lockrefresh']->value;?>
" size="4" maxlength="4"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><label for="lockrefresh"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_template_list_mode');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_general_templatelistmode','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_template_list_mode')),$_smarty_tpl);?>
</p>
  <p class="pageinput">
    <select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
template_list_mode">
    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['template_list_opts']->value,'selected'=>$_smarty_tpl->tpl_vars['template_list_mode']->value),$_smarty_tpl);?>

    </select>
  </p>
</div>
<?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
}
