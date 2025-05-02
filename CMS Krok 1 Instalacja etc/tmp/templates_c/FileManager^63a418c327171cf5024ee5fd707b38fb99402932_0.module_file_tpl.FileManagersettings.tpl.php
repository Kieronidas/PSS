<?php
/* Smarty version 4.2.1, created on 2025-05-02 18:38:19
  from 'module_file_tpl:FileManager;settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6814f4fb31e889_82279569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63a418c327171cf5024ee5fd707b38fb99402932' => 
    array (
      0 => 'module_file_tpl:FileManager;settings.tpl',
      1 => 1746202543,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6814f4fb31e889_82279569 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),2=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.cms_yesno.php','function'=>'smarty_cms_function_cms_yesno',),3=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),4=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
echo smarty_function_form_start(array('action'=>'savesettings'),$_smarty_tpl);?>


<div class="pageoverflow">
  <p class="pagetext"><label for="advancedmode"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('enableadvanced');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_advancedmode','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('enableadvanced')),$_smarty_tpl);?>
</p>
  <p class="pageinput">
    <select id="advancedmode" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
advancedmode">
      <?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['advancedmode']->value),$_smarty_tpl);?>

    </select>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext"><label for="showhidden"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('showhiddenfiles');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_showhiddenfiles','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('showhiddenfiles')),$_smarty_tpl);?>
</p>
  <p class="pageinput">
    <select id="showhidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
showhiddenfiles">
      <?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['showhiddenfiles']->value),$_smarty_tpl);?>

    </select>
</div>

<div class="pageoverflow">
  <p class="pagetext"><label for="showthumbnails"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('showthumbnails');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_showthumbnails','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('showthumbnails')),$_smarty_tpl);?>
</p>
  <p class="pageinput">
    <select id="showthumbnails" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
showthumbnails">
      <?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['showthumbnails']->value),$_smarty_tpl);?>

    </select>
</div>

<div class="pageoverflow">
  <p class="pagetext"><label for="createthumbs"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('create_thumbnails');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_create_thumbnails','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('create_thumbnails')),$_smarty_tpl);?>
</p>
  <p class="pageinput">
    <select id="createthumbs" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
create_thumbnails">
      <?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['create_thumbnails']->value),$_smarty_tpl);?>

    </select>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext"><label for="iconsize"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('iconsize');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_iconsize','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('iconsize')),$_smarty_tpl);?>
</p>
  <p class="pageinput">
    <select id="iconsize" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
iconsize">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['iconsizes']->value,'selected'=>$_smarty_tpl->tpl_vars['iconsize']->value),$_smarty_tpl);?>

    </select>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext"><label for="permstyle"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('permissionstyle');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_permissionstyle','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('permissionstyle')),$_smarty_tpl);?>
</p>
  <p class="pageinput">
    <select id="permstyle" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
permissionstyle">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['permstyles']->value,'selected'=>$_smarty_tpl->tpl_vars['permissionstyle']->value),$_smarty_tpl);?>

    </select>
  </p>
</div>
<div class="pageoverflow">
  <p class="pageinput">
    <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
  </p>
</div>
<?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
}
