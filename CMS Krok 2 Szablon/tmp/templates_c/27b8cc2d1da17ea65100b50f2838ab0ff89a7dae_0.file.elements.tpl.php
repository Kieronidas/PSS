<?php
/* Smarty version 4.2.1, created on 2025-05-16 18:24:44
  from 'C:\xampp\htdocs\ms\assets\templates\elements.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_682766cc624ce4_71780100',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27b8cc2d1da17ea65100b50f2838ab0ff89a7dae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ms\\assets\\templates\\elements.tpl',
      1 => 1747412668,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682766cc624ce4_71780100 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.root_url.php','function'=>'smarty_function_root_url',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.title.php','function'=>'smarty_function_title',),2=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.cms_selflink.php','function'=>'smarty_function_cms_selflink',),));
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['process_pagedata'][0], array( array(),$_smarty_tpl ) );?>

<?php echo smarty_function_root_url(array('assign'=>'base_url'),$_smarty_tpl);?>

<?php $_smarty_tpl->_assignInScope('theme_path', ($_smarty_tpl->tpl_vars['base_url']->value).('/assets/templates/spatial'));?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
  <title><?php echo smarty_function_title(array(),$_smarty_tpl);?>
 – e-Sport Arena</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['theme_path']->value;?>
/assets/css/main.css">
</head>
<body>

  <!-- Header -->
  <header id="header">
    <h1><strong><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">e-Sport Arena</a></strong></h1>
    <nav id="nav">
      <ul>
        <li><?php echo smarty_function_cms_selflink(array('page'=>'home','text'=>'Home'),$_smarty_tpl);?>
</li>
        <li><?php echo smarty_function_cms_selflink(array('page'=>'generic','text'=>'Analizy'),$_smarty_tpl);?>
</li>
        <li><?php echo smarty_function_cms_selflink(array('page'=>'elements','text'=>'Statystyki'),$_smarty_tpl);?>
</li>
      </ul>
    </nav>
  </header>

  <!-- Main -->
  <section id="main" class="wrapper">
    <div class="container">
      <header class="major special">
        <h2><?php echo smarty_function_title(array(),$_smarty_tpl);?>
</h2>
        <p>Interaktywne zestawienia statystyk e-sportowych i komponenty UI</p>
      </header>

      <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array(),$_smarty_tpl); ?>
    </div>
  </section>

  <!-- Footer -->
  <footer id="footer">
    <div class="container">
      <ul class="icons">
        <li><a href="#" class="icon fa-facebook"></a></li>
        <li><a href="#" class="icon fa-twitter"></a></li>
        <li><a href="#" class="icon fa-instagram"></a></li>
      </ul>
    </div>
  </footer>
  <div class="copyright">
    Site made with: <a href="https://templated.co/">Templated</a>
  </div>

  <!-- Scripts -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_path']->value;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_path']->value;?>
/assets/js/skel.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_path']->value;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_path']->value;?>
/assets/js/main.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
