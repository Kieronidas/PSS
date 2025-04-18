<?php
/* Smarty version 4.3.4, created on 2025-04-18 15:52:47
  from 'C:\xampp\htdocs\Portal\app\views\editEvent.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6802592fe96403_18186289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59093c82a9716b58e91b74f2d8491ad84799da22' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\editEvent.tpl',
      1 => 1743165724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6802592fe96403_18186289 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2303860416802592fe8fe48_23509090', "top");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "top"} */
class Block_2303860416802592fe8fe48_23509090 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_2303860416802592fe8fe48_23509090',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Edytuj Wydarzenie</h2>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
editEvent" method="post">
    <input type="hidden" name="event_id" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['id_event'];?>
">

    <label for="name">Nazwa wydarzenia:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" required>

    <label for="description">Opis:</label>
    <textarea id="description" name="description" required><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>

    <label for="location">Lokalizacja:</label>
    <input type="text" id="location" name="location" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['location'], ENT_QUOTES, 'UTF-8', true);?>
" required>

    <label for="date">Data:</label>
    <input type="date" id="date" name="date" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['date'], ENT_QUOTES, 'UTF-8', true);?>
" required>

    <label for="time">Godzina:</label>
    <input type="time" id="time" name="time" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['time'], ENT_QUOTES, 'UTF-8', true);?>
" required>

    <label for="capacity">Pojemność:</label>
    <input type="number" id="capacity" name="capacity" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['capacity'], ENT_QUOTES, 'UTF-8', true);?>
" min="1" required>

    <label for="is_verified">Status wydarzenia:</label>
    <select id="is_verified" name="is_verified">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['event']->value['is_verified'] == 1) {?>selected<?php }?>>Zatwierdzone</option>
        <option value="0" <?php if ($_smarty_tpl->tpl_vars['event']->value['is_verified'] == 0) {?>selected<?php }?>>Niezatwierdzone</option>
    </select>

    <button type="submit" class="save-button">Zapisz zmiany</button>
</form>

<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
eventOrganizerPanel" class="button">Anuluj</a>
<?php
}
}
/* {/block "top"} */
}
