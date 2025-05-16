<?php
/* Smarty version 4.2.1, created on 2025-05-16 17:48:29
  from 'cms_template:16' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_68275e4d724e37_68543144',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '256209d34017bf7d04c5e6187357cccd22910269' => 
    array (
      0 => 'cms_template:16',
      1 => '1747410483',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68275e4d724e37_68543144 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.root_url.php','function'=>'smarty_function_root_url',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.title.php','function'=>'smarty_function_title',),2=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.cms_selflink.php','function'=>'smarty_function_cms_selflink',),));
?>

<?php echo smarty_function_root_url(array('assign'=>'base_url'),$_smarty_tpl);?>

<?php $_smarty_tpl->_assignInScope('theme_path', ($_smarty_tpl->tpl_vars['base_url']->value).('/assets/templates/spatial'));?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
  <title><?php echo smarty_function_title(array(),$_smarty_tpl);?>
 – Spatial by TEMPLATED</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['theme_path']->value;?>
/assets/css/main.css">
</head>
<body>

  <!-- Header -->
  <header id="header" class="skels-layers-fixed">
    <h1><strong><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Spatial</a></strong> by Templated</h1>
    <nav id="nav">
      <ul>
        <li><?php echo smarty_function_cms_selflink(array('page'=>'home','text'=>'Home'),$_smarty_tpl);?>
</li>
        <li><?php echo smarty_function_cms_selflink(array('page'=>'generic','text'=>'Generic'),$_smarty_tpl);?>
</li>
        <li><?php echo smarty_function_cms_selflink(array('page'=>'elements','text'=>'Elements'),$_smarty_tpl);?>
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
        <p>Lorem ipsum dolor sit amet – podtytuł strony Elements</p>
      </header>

         

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
</html><?php }
}
