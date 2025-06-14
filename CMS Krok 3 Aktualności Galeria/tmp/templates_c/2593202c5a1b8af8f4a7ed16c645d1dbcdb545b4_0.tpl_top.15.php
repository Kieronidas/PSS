<?php
/* Smarty version 4.2.1, created on 2025-06-13 22:56:30
  from 'tpl_top:15' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_684c907edf3314_14238519',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2593202c5a1b8af8f4a7ed16c645d1dbcdb545b4' => 
    array (
      0 => 'tpl_top:15',
      1 => '1749723753',
      2 => 'tpl_top',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_684c907edf3314_14238519 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.cms_get_language.php','function'=>'smarty_function_cms_get_language',),));
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['process_pagedata'][0], array( array(),$_smarty_tpl ) );?>

<!doctype html>
<html lang="<?php echo smarty_function_cms_get_language(array(),$_smarty_tpl);?>
"><?php }
}
