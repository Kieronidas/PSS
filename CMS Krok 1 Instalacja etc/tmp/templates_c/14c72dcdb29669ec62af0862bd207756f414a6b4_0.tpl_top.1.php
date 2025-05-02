<?php
/* Smarty version 4.2.1, created on 2025-05-02 18:39:41
  from 'tpl_top:1' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6814f54de991d6_58906975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14c72dcdb29669ec62af0862bd207756f414a6b4' => 
    array (
      0 => 'tpl_top:1',
      1 => '1746202641',
      2 => 'tpl_top',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6814f54de991d6_58906975 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.cms_get_language.php','function'=>'smarty_function_cms_get_language',),));
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['process_pagedata'][0], array( array(),$_smarty_tpl ) );?>
<!doctype html>
<html lang="<?php echo smarty_function_cms_get_language(array(),$_smarty_tpl);?>
"><?php }
}
