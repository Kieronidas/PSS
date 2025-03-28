<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Portal Wydarzeń Lokalnych</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
        integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Portal Wydarzeń Lokalnych</h1>
            <nav>
                <ul class="pure-menu pure-menu-horizontal bottom-margin">
                    <li><a href="{$conf->action_root}eventList" class="pure-menu-link">Lista Wydarzeń</a></li>
                    <li><a href="{$conf->action_root}about" class="pure-menu-link">O Nas</a></li>
                    <li><a href="{$conf->action_root}contact" class="pure-menu-link">Kontakt</a></li>
                    <li><a href="{$conf->action_root}gallery" class="pure-menu-link">Galeria</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                {if count($conf->roles) == 0}
                    <a href="{$conf->action_root}registerShow" class="pure-menu-link">Zarejestruj</a>
                {/if}
                {if count($conf->roles) > 0}
                    {if isset($conf->user_role) && $conf->user_role == 2}
                        {if $conf->action == 'eventList'}
                            <!-- Przycisk dla administratora na stronie eventList -->
                            <a href="{$conf->action_root}adminPanel" class="pure-menu-link">Panel Administracyjny</a>
                        {elseif $conf->action == 'adminPanel'}
                            <!-- Przycisk powrotny do listy wydarzeń na stronie adminPanel -->
                            <a href="{$conf->action_root}eventList" class="pure-menu-link">Powrót do wydarzeń</a>
                        {/if}
                    {/if}
                    <a href="{$conf->action_root}logout" class="pure-menu-link">Wyloguj</a>
                {else}
                    <a href="{$conf->action_root}loginShow" class="pure-menu-link">Zaloguj</a>
                {/if}
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
            {block name=top}{/block}
        </div>
    </section>

   

    <footer>
        <div class="container">
            <p>&copy; 2025 Portal Wydarzeń Lokalnych. Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>
</body>

</html>
