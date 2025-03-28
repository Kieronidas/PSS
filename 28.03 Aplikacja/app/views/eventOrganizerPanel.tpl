{extends file="main.tpl"}

{block name="top"}
<section class="event-list-container">
    <h2 class="event-list-title">Lista Wydarzeń</h2>



    <!-- Wyświetlanie powiadomień -->
    {if $msgs->isInfo()}
        <div class="info-messages">
            <ul>
                {foreach from=$msgs->getMessages() item=msg}
                    {if $msg->isInfo()}
                        <li>{$msg->text}</li>
                    {/if}
                {/foreach}
            </ul>
        </div>
    {/if}

  <!-- Formularz dodawania wydarzenia -->
<form action="{$conf->action_root}eventOrganizerPanel" method="post" class="filter-form">
    <div class="filter-group">
        <label for="name">Nazwa</label>
        <input type="text" id="name" name="name" value="{$name|escape}" required>
    </div>

    <div class="filter-group">
        <label for="description">Opis</label>
        <input type="text" id="description" name="description" value="{$description|escape}" required>
    </div>

    <div class="filter-group">
        <label for="location">Lokalizacja</label>
        <input type="text" id="location" name="location" value="{$location|escape}" required>
    </div>

  <div class="filter-group date-time-container">
    <label for="date">Data</label>
    <input type="date" id="date" name="date" value="{$date|escape}" required>

    <label for="time">Godzina</label>
    <input type="time" id="time" name="time" value="{$time|escape}" required>
</div>

    <div class="filter-group">
        <label for="capacity">Sloty</label>
        <input type="number" id="capacity" name="capacity" value="{$capacity|default:300}" min="1" required>
    </div>

    <div class="filter-group">
        <label for="status_id">Status wydarzenia:</label>
        <select id="status_id" name="status_id" required>
            <option value="">Wybierz status</option>
            {foreach from=$statuses item=status}
                <option value="{$status.id_status}" {if $status_id == $status.id_status}selected{/if}>
                    {$status.status_name|escape}
                </option>
            {/foreach}
        </select>

        <label for="type_id">Typ wydarzenia:</label>
        <select id="type_id" name="type_id" required>
            <option value="">Wybierz typ</option>
            {foreach from=$types item=type}
                <option value="{$type.id_type}" {if $type_id == $type.id_type}selected{/if}>
                    {$type.type_name|escape}
                </option>
            {/foreach}
        </select>
    </div>

    <button type="submit" class="filter-button">Stwórz</button>
</form>


    <!-- Tabela wydarzeń -->
    {if $events|@count > 0}
        <table class="event-table">
            <thead>
                <tr>
                    <th>Nazwa wydarzenia</th>
                    <th>Lokalizacja</th>
                    <th>Data</th>
                    <th>Godzina</th>
                    <th>Pojemność</th>
                    <th>Status</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$events item=event}
                <tr>
                    <td>{$event.name|escape}</td>
                    <td>{$event.location|escape}</td>
                    <td>{$event.date|escape}</td>
                    <td>{$event.time|escape}</td>
                    <td>{$event.capacity|escape}</td>
                    <td>{if $event.is_verified}Zatwierdzone{else}Niezatwierdzone{/if}</td>
          <td class="event-actions">
    <!-- Formularz edycji wydarzenia -->
    <form action="{$conf->action_root}editEvent" method="get">
        <input type="hidden" name="event_id" value="{$event.id_event}">
        <button type="submit">Edytuj</button>
    </form>

    <!-- Formularz zatwierdzania wydarzenia -->
    <form action="{$conf->action_root}verifyEvent" method="post">
        <input type="hidden" name="event_id" value="{$event.id_event}">
        <button type="submit">Zatwierdź</button>
    </form>

    <!-- Formularz zamknięcia zapisów -->
    <form action="{$conf->action_root}closeRegistrations" method="post">
        <input type="hidden" name="event_id" value="{$event.id_event}">
        <button type="submit">Zamknij zapisy</button>
    </form>

    <!-- Formularz usuwania wydarzenia -->
    <form action="{$conf->action_root}deleteEvent" method="post">
        <input type="hidden" name="event_id" value="{$event.id_event}">
        <button type="submit" onclick="return confirm('Czy na pewno chcesz usunąć to wydarzenie?');">
            Usuń
        </button>
    </form>

    <!-- Link do podglądu zgłoszeń -->
    <a href="{$conf->action_root}viewParticipants?event_id={$event.id_event}" class="pure-button button-secondary">Podgląd zgłoszeń</a>
</td>          
                </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <p>Brak wydarzeń spełniających podane kryteria.</p>
    {/if}

    {if \core\RoleUtils::inRole("Event Organizer")}
        <a href="{$conf->action_root}eventList" class="button">Powrót</a>
    {/if}
</section>
{/block}