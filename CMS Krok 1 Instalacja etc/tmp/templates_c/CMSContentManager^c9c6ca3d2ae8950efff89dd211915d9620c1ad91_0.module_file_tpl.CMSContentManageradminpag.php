<?php
/* Smarty version 4.2.1, created on 2025-05-02 18:38:21
  from 'module_file_tpl:CMSContentManager;admin_pagedefaults_tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6814f4fd958394_86895411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9c6ca3d2ae8950efff89dd211915d9620c1ad91' => 
    array (
      0 => 'module_file_tpl:CMSContentManager;admin_pagedefaults_tab.tpl',
      1 => 1746202540,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6814f4fd958394_86895411 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),2=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),3=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\modifier.cms_escape.php','function'=>'smarty_modifier_cms_escape',),4=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.cms_yesno.php','function'=>'smarty_cms_function_cms_yesno',),5=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
echo smarty_function_form_start(array('action'=>'admin_pagedefaults_tab','pagedefaults'=>1),$_smarty_tpl);?>

<div class="information">
	<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_pagedflt');?>

</div>
<div class="pageoverflow">
	<p class="pagetext"></p>
	<p class="pageinput">
		<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
	</p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="contenttype"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_contenttype');?>
</label>:&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_contenttype','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_contenttype')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<select id="contenttype" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
contenttype">
			<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['all_contenttypes']->value,'selected'=>$_smarty_tpl->tpl_vars['page_prefs']->value['contenttype']),$_smarty_tpl);?>

		</select></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="design_id"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_design_id');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_design_id','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_design_id')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<select id="design_id" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
design_id">
			<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['design_list']->value,'selected'=>$_smarty_tpl->tpl_vars['page_prefs']->value['design_id']),$_smarty_tpl);?>

		</select></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="template_id"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_template_id');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_template_id','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_template_id')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<select id="template_id" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
template_id">
			<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['template_list']->value,'selected'=>$_smarty_tpl->tpl_vars['page_prefs']->value['template_id']),$_smarty_tpl);?>

		</select></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="metadata"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_metadata');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_metadata','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_metadata')),$_smarty_tpl);?>
</p>
	<p class="pageinput">		<textarea id="metadata" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
metadata" rows="5" cols="80"><?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['page_prefs']->value['metadata']);?>
</textarea></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="content"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_content');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_content','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_content')),$_smarty_tpl);?>
</p>
	<p class="pageinput">		<textarea id="content" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
content" rows="5" cols="80"><?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['page_prefs']->value['content']);?>
</textarea></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="secure"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_secure');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_secure','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_secure')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<select id="secure" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
secure">
			<?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['page_prefs']->value['secure']),$_smarty_tpl);?>

		</select></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="cachable"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_cachable');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_cachable','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_cachable')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<select id="cachable" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cachable">
			<?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['page_prefs']->value['cachable']),$_smarty_tpl);?>

		</select></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="active"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_active');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_active','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_active')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<select id="active" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
active">
			<?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['page_prefs']->value['active']),$_smarty_tpl);?>

		</select></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="showinmenu"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_showinmenu');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_showinmenu','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_showinmenu')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<select id="showinmenu" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
showinmenu">
			<?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['page_prefs']->value['showinmenu']),$_smarty_tpl);?>

		</select></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="searchable"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_searchable');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_searchable','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_searchable')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<select id="searchable" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
searchable">
			<?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['page_prefs']->value['searchable']),$_smarty_tpl);?>

		</select></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="addteditors"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_addteditors');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_addteditors','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_addteditors')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<select id="addteditors" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
addteditors[]" multiple="multiple" size="6">
			<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['addteditor_list']->value,'selected'=>$_smarty_tpl->tpl_vars['page_prefs']->value['addteditors']),$_smarty_tpl);?>

		</select></p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="extra1"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_extra1');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_extra1','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_extra1')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<input id="extra1" type="text" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
extra1" value="<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['page_prefs']->value['extra1']);?>
" size="80" maxlength="255"/>
	</p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="extra2"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_extra2');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_extra2','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_extra2')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<input id="extra2" type="text" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
extra2" value="<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['page_prefs']->value['extra2']);?>
" size="80" maxlength="255"/>
	</p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><label for="extra3"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_extra3');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_pagedflt_extra3','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_pagedflt_extra3')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
		<input id="extra3" type="text" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
extra3" value="<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['page_prefs']->value['extra3']);?>
" size="80" maxlength="255"/>
	</p>
</div>
<div class="pageoverflow">
	<p class="pagetext"></p>
	<p class="pageinput">
		<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
	</p>
</div>
<?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
}
