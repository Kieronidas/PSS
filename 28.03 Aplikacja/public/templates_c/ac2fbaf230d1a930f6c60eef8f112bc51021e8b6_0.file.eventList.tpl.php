<?php
/* Smarty version 4.3.4, created on 2025-03-28 22:27:49
  from 'C:\xampp\htdocs\Portal\app\views\eventList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67e714559ad001_38244309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac2fbaf230d1a930f6c60eef8f112bc51021e8b6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\eventList.tpl',
      1 => 1743177025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67e714559ad001_38244309 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_205156750667e7145599d3b5_98151585', "top");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "top"} */
class Block_205156750667e7145599d3b5_98151585 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_205156750667e7145599d3b5_98151585',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Portal\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section class="event-list-container">
    <h2 class="event-list-title">Lista Wydarzeń</h2>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
eventList" method="get" class="filter-form">

    <!-- Największe pola na górze -->
    <div class="filter-group-large">
        <div>
            <label for="type">Typ wydarzenia:</label>
            <input type="text" id="type" name="type" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['filters']->value['type'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Wpisz typ">
        </div>
        <div>
            <label for="name">Nazwa:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['filters']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Wpisz nazwę">
        </div>
        <div>
            <label for="location">Lokalizacja:</label>
            <input type="text" id="location" name="location" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['filters']->value['location'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Wpisz lokalizację">
        </div>
        <div>
            <label for="description">Opis:</label>
            <input type="text" id="description" name="description" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['filters']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Wpisz opis">
        </div>
    </div>

    <!-- Data i godzina -->
    <div class="filter-group-datetime-container">
        <div class="filter-group-date">
            <div class="filter-group-small">
                <label for="date_from">Od daty:</label>
                <input type="date" id="date_from" name="date_from" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['filters']->value['date_from'], ENT_QUOTES, 'UTF-8', true);?>
">
            </div>
            <div class="filter-group-small">
                <label for="date_to">Do daty:</label>
                <input type="date" id="date_to" name="date_to" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['filters']->value['date_to'], ENT_QUOTES, 'UTF-8', true);?>
">
            </div>
        </div>
        <div class="filter-group-time">
            <div class="filter-group-small">
                <label for="time_from">Od godz.:</label>
                <input type="time" id="time_from" name="time_from" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['filters']->value['time_from'], ENT_QUOTES, 'UTF-8', true);?>
">
            </div>
            <div class="filter-group-small">
                <label for="time_to">Do godz.:</label>
                <input type="time" id="time_to" name="time_to" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['filters']->value['time_to'], ENT_QUOTES, 'UTF-8', true);?>
">
            </div>
        </div>
    </div>

    <!-- Status nad Sortuj i Kierunek -->
    <div class="filter-group-status">
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="">Wszystkie</option>
            <option value="verified" <?php if ($_smarty_tpl->tpl_vars['filters']->value['status'] == 'verified') {?>selected<?php }?>>Zatwierdzone</option>
            <option value="unverified" <?php if ($_smarty_tpl->tpl_vars['filters']->value['status'] == 'unverified') {?>selected<?php }?>>Niezatwierdzone</option>
        </select>
    </div>

    <!-- Sortowanie i Kierunek -->
    <div class="filter-group-sort-container">
        <div class="filter-group-sort">
            <label for="sort">Sortuj wg:</label>
            <select id="sort" name="sort">
                <option value="date" <?php if ($_smarty_tpl->tpl_vars['currentSort']->value == 'date') {?>selected<?php }?>>Data</option>
                <option value="time" <?php if ($_smarty_tpl->tpl_vars['currentSort']->value == 'time') {?>selected<?php }?>>Godzina</option>
                <option value="name" <?php if ($_smarty_tpl->tpl_vars['currentSort']->value == 'name') {?>selected<?php }?>>Nazwa</option>
                <option value="capacity" <?php if ($_smarty_tpl->tpl_vars['currentSort']->value == 'capacity') {?>selected<?php }?>>Pojemność</option>
                <option value="location" <?php if ($_smarty_tpl->tpl_vars['currentSort']->value == 'location') {?>selected<?php }?>>Lokalizacja</option>
            </select>
        </div>
        <div class="filter-group-sort">
            <label for="order">Kierunek:</label>
            <select id="order" name="order">
                <option value="ASC" <?php if (mb_strtoupper((string) $_smarty_tpl->tpl_vars['currentOrder']->value ?? '', 'UTF-8') == 'ASC') {?>selected<?php }?>>Rosnąco</option>
                <option value="DESC" <?php if (mb_strtoupper((string) $_smarty_tpl->tpl_vars['currentOrder']->value ?? '', 'UTF-8') == 'DESC') {?>selected<?php }?>>Malejąco</option>
            </select>
        </div>
    </div>

    <!-- Przycisk Filtruj na dole -->
    <button type="submit" class="filter-button">Filtruj</button>
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
                <th>Zapisanych</th> <!-- Nowa kolumna -->
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
</td> <!-- Wyświetlamy zarejestrowanych -->
                <td><?php if ($_smarty_tpl->tpl_vars['event']->value['is_verified']) {?>Zatwierdzone<?php } else { ?>Niezatwierdzone<?php }?></td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
<?php } else { ?>
    <p>Brak wydarzeń spełniających podane kryteria.</p>
<?php }?>

    <!-- PRZYCISKI NAWIGACYJNE -->
    <?php if (\core\RoleUtils::inRole("Admin")) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminPanel" class="button">Panel Administracyjny</a>
    <?php }?>

    <?php if (\core\RoleUtils::inRole("Event Organizer")) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
eventOrganizerPanel" class="button">Panel Organizatora Wydarzeń</a>
    <?php }?>

    <?php if (\core\RoleUtils::inRole("Participant")) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
participantPanel" class="button">Panel Uczestnika</a>
    <?php }?>

</section>
<?php
}
}
/* {/block "top"} */
}
