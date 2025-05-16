{* --------------------------------------------------------------
   Spatial – motyw Templated przeportowany do CMS Made Simple
   -------------------------------------------------------------- *}

{process_pagedata}
{root_url assign='base_url'}
{assign var='theme_path' value=$base_url|cat:'/assets/templates/spatial'}

<!DOCTYPE HTML>
<html>
  <head>
    <title>e-Sport Arena – Spatial by TEMPLATED</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{$theme_path}/assets/css/main.css">
  </head>

  <body class="landing">

    <!-- Header -->
    <header id="header" class="alt">
      <h1><strong><a href="{$base_url}">e-Sport Arena</a></strong> powered by Spatial</h1>
      <nav id="nav">
        <ul>
          <li>{cms_selflink page='home'     text='Home'}</li>
          <li>{cms_selflink page='generic'  text='Analizy'}</li>
          <li>{cms_selflink page='elements' text='Statystyki'}</li>
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
              <img src="{$theme_path}/images/pic02.jpg" alt="">
              <h3>Worlds 2025 – Finał w Seulu</h3>
            </div>
          </div>

          <div class="6u$ 12u$(xsmall)">
            <div class="image fit captioned">
              <img src="{$theme_path}/images/pic03.jpg" alt="">
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
          {foreach from=['pic04','pic05','pic06','pic07'] item=img name=stats}
            <div class="feature">
              <div class="image rounded">
                <img src="{$theme_path}/images/{$img}.jpg" alt="">
              </div>
              <div class="content">
                <header>
                  {if $smarty.foreach.stats.index == 0}
                    <h4>Lider ACS</h4><p>Valorant</p>
                  {elseif $smarty.foreach.stats.index == 1}
                    <h4>Najlepszy AWP-er</h4><p>Counter-Strike 2</p>
                  {elseif $smarty.foreach.stats.index == 2}
                    <h4>MVP Split Push</h4><p>League of Legends</p>
                  {else}
                    <h4>Królowie makro</h4><p>DOTA 2</p>
                  {/if}
                </header>
                <p>Sprawdź, jak wyniki pro graczy przekładają się na dominację w kluczowych fazach meczu i poznaj ich ulubione ustawienia sprzętu.</p>
              </div>
            </div>
          {/foreach}
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
    <script src="{$theme_path}/assets/js/jquery.min.js"></script>
    <script src="{$theme_path}/assets/js/skel.min.js"></script>
    <script src="{$theme_path}/assets/js/util.js"></script>
    <script src="{$theme_path}/assets/js/main.js"></script>
  </body>
</html>
