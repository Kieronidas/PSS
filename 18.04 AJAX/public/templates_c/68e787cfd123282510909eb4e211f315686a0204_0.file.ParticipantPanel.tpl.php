<?php
/* Smarty version 4.3.4, created on 2025-04-04 23:40:35
  from 'C:\xampp\htdocs\Portal\app\views\ParticipantPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67f051d34468b8_20786932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68e787cfd123282510909eb4e211f315686a0204' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\ParticipantPanel.tpl',
      1 => 1743169324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f051d34468b8_20786932 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_105204967267f051d3411ce4_94713806', "top");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "top"} */
class Block_105204967267f051d3411ce4_94713806 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_105204967267f051d3411ce4_94713806',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Portal\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section class="participant-panel">
    <h2>Panel Uczestnika</h2>

    <!-- Wyświetlanie komunikatów -->
    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
        <ul class="message-list error">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
        <ul class="message-list info">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    <?php }?>

    <!-- Formularz zmiany hasła -->
    <h3>Zmień swoje hasło</h3>
    <form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>'changePassword'),$_smarty_tpl ) );?>
" method="post" class="change-password-form">
        <label for="old_password">Obecne hasło:</label>
        <input type="password" id="old_password" name="old_password" placeholder="Obecne hasło" required>
        
        <label for="new_password">Nowe hasło:</label>
        <input type="password" id="new_password" name="new_password" placeholder="Nowe hasło" required minlength="6">
        
        <label for="confirm_password">Potwierdź nowe hasło:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Potwierdź nowe hasło" required minlength="6">
        
        <button type="submit">Zmień hasło</button>
    </form>

    <!-- Lista dostępnych wydarzeń -->
    <h3>Lista dostępnych wydarzeń</h3>
    <table class="event-table participant-table">
    <thead>
        <tr>
            <th>Nazwa wydarzenia</th>
            <th>Lokalizacja</th>
            <th>Data</th>
            <th>Godzina</th>
            <th>Pojemność</th>
            <th>Zapisani</th>
            <th>Akcja</th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['events']->value, 'event');
$_smarty_tpl->tpl_vars['event']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->do_else = false;
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['location'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['date'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['time'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['capacity'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['registered'];?>
</td>
        <td>
            <div class="button-container">
                <form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>'registerForEvent'),$_smarty_tpl ) );?>
" method="post">
                    <input type="hidden" name="id_event" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['id_event'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['event']->value['capacity'] == 0) {?>
                        <button type="button" class="button-disabled" disabled>Zapisy zamknięte</button>
                    <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['event']->value['registered'] < $_smarty_tpl->tpl_vars['event']->value['capacity']) {?>
                            <button type="submit" class="button-success">Zapisz się</button>
                        <?php } else { ?>
                            <button type="button" class="button-disabled" disabled>Brak miejsc</button>
                        <?php }?>
                    <?php }?>
                </form>
            </div>
        </td>
    </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
    </table>

    <!-- Moje zapisane wydarzenia -->
    <h3>Moje zapisane wydarzenia</h3>
    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['my_events']->value) > 0) {?>
    <table class="event-table participant-table">
    <thead>
        <tr>
            <th>Nazwa wydarzenia</th>
            <th>Lokalizacja</th>
            <th>Data</th>
            <th>Godzina</th>
            <th>Pojemność</th>
            <th>Zapisani</th>
            <th>Akcja</th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['my_events']->value, 'event');
$_smarty_tpl->tpl_vars['event']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->do_else = false;
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['location'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['date'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['time'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['capacity'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['registered'];?>
</td>
        <td>
            <div class="button-container">
                <form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>'unregisterFromEvent'),$_smarty_tpl ) );?>
" method="post">
                    <input type="hidden" name="id_event" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['id_event'];?>
">
                    <button type="submit" class="button-warning">Rezygnuj</button>
                </form>
                <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>'showConfirmation','id_event'=>$_smarty_tpl->tpl_vars['event']->value['id_event']),$_smarty_tpl ) );?>
" class="button-secondary">Zobacz potwierdzenie</a>
            </div>
        </td>
    </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
    </table>
    <?php } else { ?>
        <p class="no-events-message">Nie jesteś zapisany na żadne wydarzenia.</p>
    <?php }?>

    <!-- Powrót do panelu -->
    <div class="back-button-container">
        <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>'participantPanel'),$_smarty_tpl ) );?>
" class="button-secondary">Powrót</a>
    </div>
</section>
<?php
}
}
/* {/block "top"} */
}
