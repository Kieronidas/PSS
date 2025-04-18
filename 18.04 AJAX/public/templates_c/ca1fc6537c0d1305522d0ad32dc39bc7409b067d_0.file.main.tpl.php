<?php
/* Smarty version 4.3.4, created on 2025-04-18 15:51:34
  from 'C:\xampp\htdocs\Portal\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_680258e6d25965_51335471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca1fc6537c0d1305522d0ad32dc39bc7409b067d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Portal\\app\\views\\templates\\main.tpl',
      1 => 1744984232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680258e6d25965_51335471 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Portal Wydarzeń Lokalnych</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
        integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Portal Wydarzeń Lokalnych</h1>
            <nav>
                <ul class="pure-menu pure-menu-horizontal bottom-margin">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
eventList" class="pure-menu-link">Lista Wydarzeń</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
about" class="pure-menu-link">O Nas</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
contact" class="pure-menu-link">Kontakt</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gallery" class="pure-menu-link">Galeria</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) == 0) {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registerShow" class="pure-menu-link">Zarejestruj</a>
                <?php }?>
                <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                    <?php if ((isset($_smarty_tpl->tpl_vars['conf']->value->user_role)) && $_smarty_tpl->tpl_vars['conf']->value->user_role == 2) {?>
                        <?php if ($_smarty_tpl->tpl_vars['conf']->value->action == 'eventList') {?>
                            <!-- Przycisk dla administratora na stronie eventList -->
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminPanel" class="pure-menu-link">Panel Administracyjny</a>
                        <?php } elseif ($_smarty_tpl->tpl_vars['conf']->value->action == 'adminPanel') {?>
                            <!-- Przycisk powrotny do listy wydarzeń na stronie adminPanel -->
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
eventList" class="pure-menu-link">Powrót do wydarzeń</a>
                        <?php }?>
                    <?php }?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="pure-menu-link">Wyloguj</a>
                <?php } else { ?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow" class="pure-menu-link">Zaloguj</a>
                <?php }?>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h3>Odkryj lokalne wydarzenia i dołącz do społeczności!</h3>
            <p>Zarejestruj się, aby mieć możliwość rezerwacji na wybrane wydarzenia.</p>
        </div>
    </section>

    <section id="main-content" class="background-section">
        <div class="container">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1914504477680258e6d24d99_17742414', 'top');
?>

        </div>
    </section>

   

    <footer>
        <div class="container">
            <p>&copy; 2025 Portal Wydarzeń Lokalnych. Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/ajax-utils.js"><?php echo '</script'; ?>
>
</body>

</html>
<?php }
/* {block 'top'} */
class Block_1914504477680258e6d24d99_17742414 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1914504477680258e6d24d99_17742414',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'top'} */
}
