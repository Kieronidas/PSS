<?php
/* Smarty version 4.3.4, created on 2025-03-28 22:27:36
  from 'C:\xampp\htdocs\Portal\app\views\loginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67e714483ef2a3_54090025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be6ab002a28a75e135ffcc7e5db340372a74b100' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\loginView.tpl',
      1 => 1743169324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67e714483ef2a3_54090025 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_66419394167e714483e9811_47388632', "top");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "top"} */
class Block_66419394167e714483e9811_47388632 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_66419394167e714483e9811_47388632',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="login-form" class="form-container">





  <h3 class="form-title">Logowanie:</h3>
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="pure-form pure-form-stacked">

       <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>
        <label for="pass">Hasło:</label>
        <input type="password" id="pass" name="pass" required>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
        <div class="alert>
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>alert-success<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>alert-warning<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-danger<?php }?>" role="alert">
            <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>





        <button type="submit" class="pure-button pure-button-primary">Zaloguj</button>




    </form>
</section>
<?php
}
}
/* {/block "top"} */
}
