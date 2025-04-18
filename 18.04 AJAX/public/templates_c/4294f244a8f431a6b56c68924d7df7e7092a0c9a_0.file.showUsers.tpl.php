<?php
/* Smarty version 4.3.4, created on 2025-04-04 23:40:45
  from 'C:\xampp\htdocs\Portal\app\views\showUsers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67f051dd57f211_19893422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4294f244a8f431a6b56c68924d7df7e7092a0c9a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\showUsers.tpl',
      1 => 1743717960,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f051dd57f211_19893422 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_67745401467f051dd574d96_90111932', "top");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "top"} */
class Block_67745401467f051dd574d96_90111932 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_67745401467f051dd574d96_90111932',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Portal\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section class="admin-panel-container">
    <h2>Lista wszystkich użytkowników</h2>

    <?php if ((isset($_smarty_tpl->tpl_vars['users']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['users']->value) > 0) {?>
        <table class="event-table user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>E-mail</th>
                    <th>Data utworzenia</th>
                    <th>Ostatnia modyfikacja</th>
                    <th>Czy aktywny</th>
                </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['id_user'];?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['login'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['created_at'];?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['user']->value['modified_at']) {
echo $_smarty_tpl->tpl_vars['user']->value['modified_at'];
} else { ?>-<?php }?></td>
                    <td><?php if ($_smarty_tpl->tpl_vars['user']->value['is_active']) {?>Tak<?php } else { ?>Nie<?php }?></td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

        <div class="pagination">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php if ($_smarty_tpl->tpl_vars['currentPage']->value > 1) {?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
showUsers?page=1">Pierwsza</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
showUsers?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value-1;?>
">Poprzednia</a>
                        </li>
                    <?php } else { ?>
                        <li class="page-item disabled">
                            <span class="page-link">Pierwsza</span>
                        </li>
                        <li class="page-item disabled">
                            <span class="page-link">Poprzednia</span>
                        </li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['currentPage']->value < $_smarty_tpl->tpl_vars['totalPages']->value) {?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
showUsers?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value+1;?>
">Następna</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
showUsers?page=<?php echo $_smarty_tpl->tpl_vars['totalPages']->value;?>
">Ostatnia</a>
                        </li>
                    <?php } else { ?>
                        <li class="page-item disabled">
                            <span class="page-link">Następna</span>
                        </li>
                        <li class="page-item disabled">
                            <span class="page-link">Ostatnia</span>
                        </li>
                    <?php }?>
                </ul>
            </nav>
        </div>

    <?php } else { ?>
        <p>Brak użytkowników w bazie.</p>
    <?php }?>

    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminPanel" class="button">Powrót do Panelu Administratora</a>
</section>
<?php
}
}
/* {/block "top"} */
}
