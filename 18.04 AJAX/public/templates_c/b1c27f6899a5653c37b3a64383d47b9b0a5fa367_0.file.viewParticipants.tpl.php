<?php
/* Smarty version 4.3.4, created on 2025-04-18 15:39:07
  from 'C:\xampp\htdocs\Portal\app\views\viewParticipants.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_680255fb5a80e0_63327886',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1c27f6899a5653c37b3a64383d47b9b0a5fa367' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\viewParticipants.tpl',
      1 => 1743165724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680255fb5a80e0_63327886 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1391638672680255fb59f004_64720357', "top");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "top"} */
class Block_1391638672680255fb59f004_64720357 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1391638672680255fb59f004_64720357',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Portal\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section class="participant-list-container">
    <h2 class="event-list-title">Lista Uczestników - <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2>

    <p>Data: <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['date'], ENT_QUOTES, 'UTF-8', true);?>
</p>
    <p>Godzina: <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['time'], ENT_QUOTES, 'UTF-8', true);?>
</p>
    <p>Lokalizacja: <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['location'], ENT_QUOTES, 'UTF-8', true);?>
</p>

    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['participants']->value) > 0) {?>
        <!-- Tabela z klasami podobnymi do widoku "Lista Wydarzeń" -->
        <table class="event-table participant-table">
            <thead>
                <tr>
                    <th>ID Uczestnictwa</th>
                    <th>ID Wydarzenia</th>
                    <th>ID Użytkownika</th>
                    <th>Data Zapisania</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['participants']->value, 'participant');
$_smarty_tpl->tpl_vars['participant']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['participant']->value) {
$_smarty_tpl->tpl_vars['participant']->do_else = false;
?>
                <tr>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['participant']->value['id_participant'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['participant']->value['id_event'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['participant']->value['id_user'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['participant']->value['registered_at'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>Brak zapisanych uczestników.</p>
    <?php }?>

    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
eventOrganizerPanel" class="button">Powrót</a>
</section>
<?php
}
}
/* {/block "top"} */
}
