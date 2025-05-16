<?php
/* Smarty version 4.2.1, created on 2025-05-16 18:23:29
  from 'C:\xampp\htdocs\ms\assets\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6827668130b4e2_71286142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95b0246f6a5908acac8c7447ed51c6265f1578dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ms\\assets\\templates\\index.tpl',
      1 => 1747412597,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6827668130b4e2_71286142 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.root_url.php','function'=>'smarty_function_root_url',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.cms_selflink.php','function'=>'smarty_function_cms_selflink',),));
?>

<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['process_pagedata'][0], array( array(),$_smarty_tpl ) );?>

<?php echo smarty_function_root_url(array('assign'=>'base_url'),$_smarty_tpl);?>

<?php $_smarty_tpl->_assignInScope('theme_path', ($_smarty_tpl->tpl_vars['base_url']->value).('/assets/templates/spatial'));?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>e-Sport Arena – Spatial by TEMPLATED</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['theme_path']->value;?>
/assets/css/main.css">
  </head>

  <body class="landing">

    <!-- Header -->
    <header id="header" class="alt">
      <h1><strong><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">e-Sport Arena</a></strong> powered by Spatial</h1>
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
    <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

    <!-- Banner -->
    <section id="banner">
      <h2>Twoja brama do świata e-sportu</h2>
      <p>Śledź turnieje na żywo, analizuj wyniki i kibicuj ulubionym drużynom – wszystko w jednym miejscu.</p>
      <ul class="actions">
        <li><a href="#" class="button special big">Zacznij grę</a></li>
      </ul>
    </section>

    <!-- One -->
    <section id="one" class="wrapper style1">
      <div class="container 75%">
        <div class="row 200%">
          <div class="6u 12u$(medium)">
            <header class="major">
              <h2>Co napędza e-sport?</h2>
              <p>Rywalizacja • Pasja • Technologia</p>
            </header>
          </div>
          <div class="6u$ 12u$(medium)">
            <p>E-sport przyciąga setki milionów widzów rocznie i generuje pule nagród liczone w dziesiątkach milionów dolarów. Areny wirtualne stały się nową sceną, na której rywalizują globalne marki i najlepsi gracze świata.</p>
            <p>Za każdym zwycięstwem stoją tysiące godzin treningu, zaawansowana analiza danych i sztaby trenerów. Odkryj, jak profesjonalne drużyny wykorzystują statystyki, aby ulepszać strategię i zdominować ligowe rankingi.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Two -->
    <section id="two" class="wrapper style2 special">
      <div class="container">
        <header class="major">
          <h2>Nadchodzące turnieje</h2>
          <p>League of Legends Worlds • PGL CS2 Major • VALORANT Masters</p>
        </header>

        <div class="row 150%">
          <div class="6u 12u$(xsmall)">
            <div class="image fit captioned">
              <img src="<?php echo $_smarty_tpl->tpl_vars['theme_path']->value;?>
/images/pic02.jpg" alt="">
              <h3>Worlds 2025 – Finał w Seulu</h3>
            </div>
          </div>

          <div class="6u$ 12u$(xsmall)">
            <div class="image fit captioned">
              <img src="<?php echo $_smarty_tpl->tpl_vars['theme_path']->value;?>
/images/pic03.jpg" alt="">
              <h3>PGL Major Warsaw – CS2 wraca do Polski</h3>
            </div>
          </div>
        </div>

        <ul class="actions">
          <li><a href="#" class="button special big">Pełny terminarz</a></li>
          <li><a href="#" class="button big">Kwalifikacje on-line</a></li>
        </ul>
      </div>
    </section>

    <!-- Three -->
    <section id="three" class="wrapper style1">
      <div class="container">
        <header class="major special">
          <h2>Statystyki graczy</h2>
          <p>Najwyższy K/D, najcelniejsze headshoty – poznaj liderów sceny</p>
        </header>

        <div class="feature-grid">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, array('pic04','pic05','pic06','pic07'), 'img', false, NULL, 'stats', array (
  'index' => true,
));
$_smarty_tpl->tpl_vars['img']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['img']->value) {
$_smarty_tpl->tpl_vars['img']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_stats']->value['index']++;
?>
            <div class="feature">
              <div class="image rounded">
                <img src="<?php echo $_smarty_tpl->tpl_vars['theme_path']->value;?>
/images/<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
.jpg" alt="">
              </div>
              <div class="content">
                <header>
                  <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_stats']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_stats']->value['index'] : null) == 0) {?>
                    <h4>Lider ACS</h4><p>Valorant</p>
                  <?php } elseif ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_stats']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_stats']->value['index'] : null) == 1) {?>
                    <h4>Najlepszy AWP-er</h4><p>Counter-Strike 2</p>
                  <?php } elseif ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_stats']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_stats']->value['index'] : null) == 2) {?>
                    <h4>MVP Split Push</h4><p>League of Legends</p>
                  <?php } else { ?>
                    <h4>Królowie makro</h4><p>DOTA 2</p>
                  <?php }?>
                </header>
                <p>Sprawdź, jak wyniki pro graczy przekładają się na dominację w kluczowych fazach meczu i poznaj ich ulubione ustawienia sprzętu.</p>
              </div>
            </div>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
      </div>
    </section>

    <!-- Four -->
    <section id="four" class="wrapper style3 special">
      <div class="container">
        <header class="major">
          <h2>Dołącz do społeczności</h2>
          <p>Wejdź na nasz Discord i rozmawiaj z fanami e-sportu 24/7</p>
        </header>
        <ul class="actions">
          <li><a href="#" class="button special big">Dołącz teraz</a></li>
        </ul>
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

    <!-- JS -->
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
