{extends file="main.tpl"}

{block name="top"}
<section class="admin-panel-container">
    <h2>Lista wszystkich użytkowników</h2>

    {if isset($users) && $users|@count > 0}
        <table class="event-table user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>E-mail</th>
                    <th>Data utworzenia</th>
                    <th>Ostatnia modyfikacja</th>
                    <th>Czy aktywny</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$users item=user}
                <tr>
                    <td>{$user.id_user}</td>
                    <td>{$user.login|escape}</td>
                    <td>{$user.email|escape}</td>
                    <td>{$user.created_at}</td>
                    <td>{if $user.modified_at}{$user.modified_at}{else}-{/if}</td>
                    <td>{if $user.is_active}Tak{else}Nie{/if}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>

        <div class="pagination">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {if $currentPage > 1}
                        <li class="page-item">
                            <a class="page-link" href="{$conf->action_root}showUsers?page=1">Pierwsza</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{$conf->action_root}showUsers?page={$currentPage-1}">Poprzednia</a>
                        </li>
                    {else}
                        <li class="page-item disabled">
                            <span class="page-link">Pierwsza</span>
                        </li>
                        <li class="page-item disabled">
                            <span class="page-link">Poprzednia</span>
                        </li>
                    {/if}

                    {if $currentPage < $totalPages}
                        <li class="page-item">
                            <a class="page-link" href="{$conf->action_root}showUsers?page={$currentPage+1}">Następna</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{$conf->action_root}showUsers?page={$totalPages}">Ostatnia</a>
                        </li>
                    {else}
                        <li class="page-item disabled">
                            <span class="page-link">Następna</span>
                        </li>
                        <li class="page-item disabled">
                            <span class="page-link">Ostatnia</span>
                        </li>
                    {/if}
                </ul>
            </nav>
        </div>

    {else}
        <p>Brak użytkowników w bazie.</p>
    {/if}

    <a href="{$conf->action_root}adminPanel" class="button">Powrót do Panelu Administratora</a>
</section>
{/block}