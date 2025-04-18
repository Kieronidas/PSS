<?php
/* Smarty version 4.3.4, created on 2025-04-18 15:56:24
  from 'C:\xampp\htdocs\Portal\app\views\contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68025a08e6cfd7_12577306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f7c00588c4815a6ab5dd1792b0e875f72d30c54' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\contact.tpl',
      1 => 1743165724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68025a08e6cfd7_12577306 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_159149301168025a08e6cab1_40627347', "top");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "top"} */
class Block_159149301168025a08e6cab1_40627347 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_159149301168025a08e6cab1_40627347',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="contact">
    <h2>Kontakt:</h2>
    <p>Masz pytania? Skontaktuj się z nami:</p>
    <ul>
        <li>Email: kontakt@example.com</li>
        <li>Telefon: +48 123 456 789</li>
    </ul>
</section>
<?php
}
}
/* {/block "top"} */
}
