<?php
/* Smarty version 4.3.4, created on 2025-04-04 23:40:44
  from 'C:\xampp\htdocs\Portal\app\views\adminPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67f051dc4c45d2_92423676',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b07e0587a695ef39ee0a08d7b76472f24657e941' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\adminPanel.tpl',
      1 => 1743715626,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f051dc4c45d2_92423676 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_120642461067f051dc4b8bd8_90815538', "top");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "top"} */
class Block_120642461067f051dc4b8bd8_90815538 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_120642461067f051dc4b8bd8_90815538',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Portal\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section class="admin-panel-container">
    <h2 class="admin-panel-title">Panel Administratora</h2>

    <section class="admin-panel-actions">
        <?php if (\core\RoleUtils::inRole("Admin")) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageCatalogs" class="button">Zarządzanie Katalogami</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
viewHistory" class="button">Historia Zmian</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
showUsers" class="button">Lista użytkowników</a>
        <?php } else { ?>
            <p>Brak uprawnień do panelu administratora.</p>
        <?php }?>
    </section>

    <?php if ((isset($_smarty_tpl->tpl_vars['users']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['users']->value) > 0) {?>
        <table class="event-table user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>E-mail</th>
                    <th>Czy aktywny</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['u']->value['id_user'];?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['u']->value['login'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['u']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['u']->value['is_active']) {?>Tak<?php } else { ?>Nie<?php }?></td>
                    <td>
                        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
changePasswordek" method="post" class="change-password-form">
                            <input type="hidden" name="id_user" value="<?php echo $_smarty_tpl->tpl_vars['u']->value['id_user'];?>
">
                            <input type="password" name="new_password" placeholder="PASS" required minlength="6">
                            <input type="password" name="confirm_password" placeholder="PASS" required minlength="6">

                            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                                    <div class="
                                        alert
                                        <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?> alert-success<?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?> alert-warning<?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?> alert-danger<?php }?>"
                                        role="alert">
                                        <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>

                            <button type="submit">Zmień hasło</button>
                        </form>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>Brak użytkowników w bazie.</p>
    <?php }?>

    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
eventList" class="button">Powrót do Listy Wydarzeń</a>
</section>
<?php
}
}
/* {/block "top"} */
}
