{extends file="main.tpl"}

{block name="top"}
<section id="password-updated" class="form-container">
    <h3>Zmiana hasła - Wynik</h3>
    
    {if $msgs->isError()}
        <div class="error-messages">
            <ul>
            {foreach $msgs->getMessages() as $msg}
                {if $msg->isError()}
                    <li>{$msg->text}</li>
                {/if}
            {/foreach}
            </ul>
        </div>
    {/if}

    {if $msgs->isInfo()}
        <div class="info-messages">
            <ul>
            {foreach $msgs->getMessages() as $msg}
                {if $msg->isInfo()}
                    <li>{$msg->text}</li>
                {/if}
            {/foreach}
            </ul>
        </div>
    {/if}

    <!-- Treść np. "Hasło zostało zmienione." -->
    <p>Operacja zmiany hasła zakończona. Jeśli widzisz komunikat błędu powyżej – sprawdź szczegóły.</p>

    <!-- Link powrotny do panelu admina -->
    <a href="{$conf->action_root}adminPanel" class="button">
        Wróć do Panelu Administratora
    </a>
</section>
{/block}
