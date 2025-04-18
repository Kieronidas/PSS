<?php
/* Smarty version 4.3.4, created on 2025-04-18 15:56:25
  from 'C:\xampp\htdocs\Portal\app\views\about.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68025a096f88d3_22118050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '324f1a497c6e9b87e55eeaffdceb8286a96e7309' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\about.tpl',
      1 => 1743165724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68025a096f88d3_22118050 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_180150179768025a096f8445_88161417', "top");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "top"} */
class Block_180150179768025a096f8445_88161417 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_180150179768025a096f8445_88161417',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="about">
    <h2>O nas</h2>
    <p>Witamy w naszym serwisie zarządzania wydarzeniami. Jesteśmy platformą, która umożliwia organizację i uczestnictwo w różnorodnych wydarzeniach.</p>
</section>
<?php
}
}
/* {/block "top"} */
}
