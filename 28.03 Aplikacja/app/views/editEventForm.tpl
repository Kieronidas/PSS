{extends file="main.tpl"}

{block name="top"}
<h2>Edytuj Wydarzenie</h2>

<form action="{$conf->action_root}editEvent" method="post">
    <input type="hidden" name="event_id" value="{$event.id_event}">

    <label for="name">Nazwa wydarzenia:</label>
    <input type="text" id="name" name="name" value="{$event.name|escape}" required>

    <label for="description">Opis:</label>
    <textarea id="description" name="description" required>{$event.description|escape}</textarea>

    <label for="location">Lokalizacja:</label>
    <input type="text" id="location" name="location" value="{$event.location|escape}" required>

    <label for="date_time">Data i godzina:</label>
    <input type="datetime-local" id="date_time" name="date_time" value="{$event.date_time|escape}" required>

    <label for="capacity">Maksymalna liczba uczestników:</label>
    <input type="number" id="capacity" name="capacity" value="{$event.capacity|escape}" min="1" required>

    <label for="is_verified">Status wydarzenia:</label>
    <select id="is_verified" name="is_verified">
        <option value="1" {if $event.is_verified}selected{/if}>Zatwierdzone</option>
        <option value="0" {if !$event.is_verified}selected{/if}>Niezatwierdzone</option>
    </select>

    <button type="submit" class="save-button">Zapisz zmiany</button>
</form>

<a href="{$conf->action_root}eventOrganizerPanel" class="button">Anuluj</a>
{/block}
