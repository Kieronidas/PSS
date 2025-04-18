<?php
/* Smarty version 4.3.4, created on 2025-04-18 15:52:19
  from 'C:\xampp\htdocs\Portal\app\views\partials\eventListPartial.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68025913bd6430_87347617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38b89cb207b68ae2de61153f385d05c7a6f6d026' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\partials\\eventListPartial.tpl',
      1 => 1744984285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68025913bd6430_87347617 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Portal\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
if (smarty_modifier_count($_smarty_tpl->tpl_vars['events']->value) > 0) {?>
<table class="event-table">
    <thead>
        <tr>
            <th>Nazwa wydarzenia</th>
            <th>Lokalizacja</th>
            <th>Data</th>
            <th>Godzina</th>
            <th>Pojemność</th>
            <th>Zapisanych</th>
            <th>Status</th>
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
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['location'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['date'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['time'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['capacity'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['event']->value['registered'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['event']->value['is_verified']) {?>Zatwierdzone<?php } else { ?>Niezatwierdzone<?php }?></td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php } else { ?>
    <p>Brak wydarzeń spełniających podane kryteria.</p>
<?php }
}
}
