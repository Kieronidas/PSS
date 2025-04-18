{extends file="main.tpl"}

{block name="top"}
<section class="participant-list-container">
    <h2 class="event-list-title">Lista Uczestników - {$event.name|escape}</h2>

    <p>Data: {$event.date|escape}</p>
    <p>Godzina: {$event.time|escape}</p>
    <p>Lokalizacja: {$event.location|escape}</p>

    {if $participants|@count > 0}
        <!-- Tabela z klasami podobnymi do widoku "Lista Wydarzeń" -->
        <table class="event-table participant-table">
            <thead>
                <tr>
                    <th>ID Uczestnictwa</th>
                    <th>ID Wydarzenia</th>
                    <th>ID Użytkownika</th>
                    <th>Data Zapisania</th>
                </tr>
            </thead>
            <tbody>
                {foreach $participants as $participant}
                <tr>
                    <td>{$participant.id_participant|escape}</td>
                    <td>{$participant.id_event|escape}</td>
                    <td>{$participant.id_user|escape}</td>
                    <td>{$participant.registered_at|escape}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <p>Brak zapisanych uczestników.</p>
    {/if}

    <a href="{$conf->action_root}eventOrganizerPanel" class="button">Powrót</a>
</section>
{/block}
