{extends file="main.tpl"}

{block name="top"}
<section class="admin-panel-container">
    <h2 class="admin-panel-title">Panel Administratora</h2>

    <section class="admin-panel-actions">
        {if \core\RoleUtils::inRole("Admin")}
            <a href="{$conf->action_root}manageCatalogs" class="button">Zarządzanie Katalogami</a>
            <a href="{$conf->action_root}viewHistory" class="button">Historia Zmian</a>
        {else}
            <p>Brak uprawnień do panelu administratora.</p>
        {/if}
    </section>

    {if isset($users) && $users|@count > 0}
        <table class="event-table user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>E-mail</th>
                    <th>Czy aktywny</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
            {foreach $users as $u}
                <tr>
                    <td>{$u.id_user}</td>
                    <td>{$u.login|escape}</td>
                    <td>{$u.email|escape}</td>
                    <td>{if $u.is_active}Tak{else}Nie{/if}</td>
                    <td>
                        <form action="{$conf->action_root}changePasswordek" method="post" class="change-password-form">
                            <input type="hidden" name="id_user" value="{$u.id_user}">
                            <input type="password" name="new_password" placeholder="PASS" required minlength="6">
                            <input type="password" name="confirm_password" placeholder="PASS" required minlength="6">

                            {if $msgs->isMessage()}
                                {foreach $msgs->getMessages() as $msg}
                                    <div class="
                                        alert
                                        {if $msg->isInfo()} alert-success{/if}
                                        {if $msg->isWarning()} alert-warning{/if}
                                        {if $msg->isError()} alert-danger{/if}"
                                        role="alert">
                                        {$msg->text}
                                    </div>
                                {/foreach}
                            {/if}

                            <button type="submit">Zmień hasło</button>
                        </form>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    {else}
        <p>Brak użytkowników w bazie.</p>
    {/if}

    <a href="{$conf->action_root}eventList" class="button">Powrót do Listy Wydarzeń</a>
</section>
{/block}
