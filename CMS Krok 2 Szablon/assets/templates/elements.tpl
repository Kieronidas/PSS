{* ==========  elements.tpl  (Spatial – e-sport)  ========== *}
{process_pagedata}
{root_url assign='base_url'}
{assign var='theme_path' value=$base_url|cat:'/assets/templates/spatial'}

<!DOCTYPE HTML>
<html lang="pl">
<head>
  <title>{title} – e-Sport Arena</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{$theme_path}/assets/css/main.css">
</head>
<body>

  <!-- Header -->
  <header id="header">
    <h1><strong><a href="{$base_url}">e-Sport Arena</a></strong></h1>
    <nav id="nav">
      <ul>
        <li>{cms_selflink page='home'     text='Home'}</li>
        <li>{cms_selflink page='generic'  text='Analizy'}</li>
        <li>{cms_selflink page='elements' text='Statystyki'}</li>
      </ul>
    </nav>
  </header>

  <!-- Main -->
  <section id="main" class="wrapper">
    <div class="container">
      <header class="major special">
        <h2>{title}</h2>
        <p>Interaktywne zestawienia statystyk e-sportowych i komponenty UI</p>
      </header>

      {content}
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
  <script src="{$theme_path}/assets/js/jquery.min.js"></script>
  <script src="{$theme_path}/assets/js/skel.min.js"></script>
  <script src="{$theme_path}/assets/js/util.js"></script>
  <script src="{$theme_path}/assets/js/main.js"></script>
</body>
</html>
