<?php
/* Smarty version 4.2.1, created on 2025-06-13 22:56:30
  from 'tpl_body:15' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_684c907eeb0916_49757610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05f8bb99cae7f5f57f0441f1c827811819047666' => 
    array (
      0 => 'tpl_body:15',
      1 => '1749723753',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_684c907eeb0916_49757610 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.global_content.php','function'=>'smarty_function_global_content',),));
?>
<body>

    <?php echo smarty_function_global_content(array('name'=>"header"),$_smarty_tpl);?>


    <main id="content">
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array(),$_smarty_tpl); ?>
  </main>

    <?php echo smarty_function_global_content(array('name'=>"footer"),$_smarty_tpl);?>


</body>
</html><?php }
}
