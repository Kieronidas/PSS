<?php
/* Smarty version 4.3.4, created on 2025-04-18 15:39:05
  from 'C:\xampp\htdocs\Portal\app\views\eventOrganizerPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_680255f95d36f6_35943545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a969900ffa57d0a241d816b9be8888d7881f5685' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\eventOrganizerPanel.tpl',
      1 => 1743173650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680255f95d36f6_35943545 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_287636985680255f95c3bb0_49992289', "top");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "top"} */
class Block_287636985680255f95c3bb0_49992289 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_287636985680255f95c3bb0_49992289',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Portal\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section class="event-list-container">
    <h2 class="event-list-title">Lista Wydarzeń</h2>



    <!-- Wyświetlanie powiadomień -->
    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
        <div class="info-messages">
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>
                        <li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    <?php }?>

  <!-- Formularz dodawania wydarzenia -->
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
eventOrganizerPanel" method="post" class="filter-form">
    <div class="filter-group">
        <label for="name">Nazwa</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" required>
    </div>

    <div class="filter-group">
        <label for="description">Opis</label>
        <input type="text" id="description" name="description" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['description']->value, ENT_QUOTES, 'UTF-8', true);?>
" required>
    </div>

    <div class="filter-group">
        <label for="location">Lokalizacja</label>
        <input type="text" id="location" name="location" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['location']->value, ENT_QUOTES, 'UTF-8', true);?>
" required>
    </div>

  <div class="filter-group date-time-container">
    <label for="date">Data</label>
    <input type="date" id="date" name="date" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['date']->value, ENT_QUOTES, 'UTF-8', true);?>
" required>

    <label for="time">Godzina</label>
    <input type="time" id="time" name="time" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['time']->value, ENT_QUOTES, 'UTF-8', true);?>
" required>
</div>

    <div class="filter-group">
        <label for="capacity">Sloty</label>
        <input type="number" id="capacity" name="capacity" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['capacity']->value ?? null)===null||$tmp==='' ? 300 ?? null : $tmp);?>
" min="1" required>
    </div>

    <div class="filter-group">
        <label for="status_id">Status wydarzenia:</label>
        <select id="status_id" name="status_id" required>
            <option value="">Wybierz status</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['statuses']->value, 'status');
$_smarty_tpl->tpl_vars['status']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['status']->value['id_status'];?>
" <?php if ($_smarty_tpl->tpl_vars['status_id']->value == $_smarty_tpl->tpl_vars['status']->value['id_status']) {?>selected<?php }?>>
                    <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['status']->value['status_name'], ENT_QUOTES, 'UTF-8', true);?>

                </option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>

        <label for="type_id">Typ wydarzenia:</label>
        <select id="type_id" name="type_id" required>
            <option value="">Wybierz typ</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['types']->value, 'type');
$_smarty_tpl->tpl_vars['type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value['id_type'];?>
" <?php if ($_smarty_tpl->tpl_vars['type_id']->value == $_smarty_tpl->tpl_vars['type']->value['id_type']) {?>selected<?php }?>>
                    <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['type']->value['type_name'], ENT_QUOTES, 'UTF-8', true);?>

                </option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <button type="submit" class="filter-button">Stwórz</button>
</form>


    <!-- Tabela wydarzeń -->
    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['events']->value) > 0) {?>
        <table class="event-table">
            <thead>
                <tr>
                    <th>Nazwa wydarzenia</th>
                    <th>Lokalizacja</th>
                    <th>Data</th>
                    <th>Godzina</th>
                    <th>Pojemność</th>
                    <th>Status</th>
                    <th>Akcje</th>
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
                    <td><?php if ($_smarty_tpl->tpl_vars['event']->value['is_verified']) {?>Zatwierdzone<?php } else { ?>Niezatwierdzone<?php }?></td>
          <td class="event-actions">
    <!-- Formularz edycji wydarzenia -->
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
editEvent" method="get">
        <input type="hidden" name="event_id" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['id_event'];?>
">
        <button type="submit">Edytuj</button>
    </form>

    <!-- Formularz zatwierdzania wydarzenia -->
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
verifyEvent" method="post">
        <input type="hidden" name="event_id" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['id_event'];?>
">
        <button type="submit">Zatwierdź</button>
    </form>

    <!-- Formularz zamknięcia zapisów -->
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
closeRegistrations" method="post">
        <input type="hidden" name="event_id" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['id_event'];?>
">
        <button type="submit">Zamknij zapisy</button>
    </form>

    <!-- Formularz usuwania wydarzenia -->
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
deleteEvent" method="post">
        <input type="hidden" name="event_id" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['id_event'];?>
">
        <button type="submit" onclick="return confirm('Czy na pewno chcesz usunąć to wydarzenie?');">
            Usuń
        </button>
    </form>

    <!-- Link do podglądu zgłoszeń -->
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
viewParticipants?event_id=<?php echo $_smarty_tpl->tpl_vars['event']->value['id_event'];?>
" class="pure-button button-secondary">Podgląd zgłoszeń</a>
</td>          
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>Brak wydarzeń spełniających podane kryteria.</p>
    <?php }?>

    <?php if (\core\RoleUtils::inRole("Event Organizer")) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
eventList" class="button">Powrót</a>
    <?php }?>
</section>
<?php
}
}
/* {/block "top"} */
}
