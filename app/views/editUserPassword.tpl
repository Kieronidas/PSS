{extends file="main.tpl"}

{block name="top"}
<section class="password-edit-container">
    <h2>Zmiana hasła użytkownika</h2>

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

    <!-- Dane wybranego usera, np. login, email -->
    <p>Użytkownik: <strong>{$user.login|escape}</strong> (ID: {$user.id_user})</p>
    <p>Email: <strong>{$user.email|escape}</strong></p>

    <form action="{$conf->action_root}updateUserPassword" method="post">
        <input type="hidden" name="id_user" value="{$user.id_user}" />

        <label for="new_password">Nowe hasło:</label>
        <input type="password" id="new_password" name="new_password" required />

        <label for="confirm_password">Potwierdź hasło:</label>
        <input type="password" id="confirm_password" name="confirm_password" required />

        <!-- Dodajemy klasę .big-button -->
        <button type="submit" class="big-button">Zmień hasło</button>
    </form>
</section>
{/block}
