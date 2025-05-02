<?php
/* Smarty version 4.2.1, created on 2025-05-02 18:39:57
  from 'module_file_tpl:News;editcategory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6814f55da93606_64952349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46dfb2f4a86ed20c66d4bcaf5b70c089acf451ad' => 
    array (
      0 => 'module_file_tpl:News;editcategory.tpl',
      1 => 1746202546,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6814f55da93606_64952349 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\modifier.cms_escape.php','function'=>'smarty_modifier_cms_escape',),2=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
if ((isset($_smarty_tpl->tpl_vars['catid']->value))) {?>
<h3><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('editcategory');?>
</h3>
<?php } else { ?>
<h3><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('addcategory');?>
</h3>
<?php }?>
<div class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_categories');?>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
  $('#<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel').click(function(){
    $(this).closest('form').attr('novalidate','novalidate');
  });
});
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->tpl_vars['startform']->value;?>

	<div class="pageoverflow">
		<p class="pagetext"><label for="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
name">*<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('name');?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_category_name','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('name')),$_smarty_tpl);?>
</p>
		<p class="pageinput">
		  <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
name" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
name" value="<?php echo (($tmp = smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['name']->value) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"/ required>
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><label for="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
parent"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('parent');?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_category_parent','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('parent')),$_smarty_tpl);?>
</p>
		<p class="pageinput">
                  <select id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
parent" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
parent">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['categories']->value,'selected'=>$_smarty_tpl->tpl_vars['parent']->value),$_smarty_tpl);?>

                  </select>
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">
                  <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
                  <input type="submit" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
"/>
                </p>
	</div>
<?php echo $_smarty_tpl->tpl_vars['endform']->value;
}
}
