<?php
/* Smarty version 4.2.1, created on 2025-06-13 22:56:31
  from 'cms_template:header' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_684c907f039a01_75794831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00361b3e053c83d9d28628b21b36c15198aa4554' => 
    array (
      0 => 'cms_template:header',
      1 => '1749724632',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_684c907f039a01_75794831 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.root_url.php','function'=>'smarty_function_root_url',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.sitename.php','function'=>'smarty_function_sitename',),));
?>
<div id="header-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-12">

        <header id="header">
            
          <h1><a href="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/" id="logo"><?php echo smarty_function_sitename(array(),$_smarty_tpl);?>
</a></h1>

       

          <nav id="menu">
            <?php echo Navigator::function_plugin(array('template'=>'menu_nav'),$_smarty_tpl);?>

          </nav>
        </header>

      </div>
    </div>
  </div>
</div><?php }
}
