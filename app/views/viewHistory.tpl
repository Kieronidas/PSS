{extends file="main.tpl"}

{block name="top"}
<section class="history-container">
    <h2>Historia Zmian</h2>

    {if $history|@count > 0}
        <table class="event-table"> <!-- Zmiana klasy na event-table -->
            <thead>
                <tr>
                    <th>ID Zmiany</th>
                    <th>Akcja</th>
                    <th>Wykonane przez</th>
                    <th>Data i godzina</th>
                </tr>
            </thead>
            <tbody>
                {foreach $history as $entry}
                <tr>
                    <td>{$entry.id_change|escape}</td>
                    <td>{$entry.action|escape}</td>
                    <td>{$entry.login|default:'Nieznany użytkownik'|escape}</td>
                    <td>{$entry.date_time|escape}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <p>Brak zapisanych zmian w historii.</p>
    {/if}

    <a href="{$conf->action_root}adminPanel" class="button">Powrót</a>
</section>
{/block}