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

    <label for="date">Data:</label>
    <input type="date" id="date" name="date" value="{$event.date|escape}" required>

    <label for="time">Godzina:</label>
    <input type="time" id="time" name="time" value="{$event.time|escape}" required>

    <label for="capacity">Pojemność:</label>
    <input type="number" id="capacity" name="capacity" value="{$event.capacity|escape}" min="1" required>

    <label for="is_verified">Status wydarzenia:</label>
    <select id="is_verified" name="is_verified">
        <option value="1" {if $event.is_verified == 1}selected{/if}>Zatwierdzone</option>
        <option value="0" {if $event.is_verified == 0}selected{/if}>Niezatwierdzone</option>
    </select>

    <button type="submit" class="save-button">Zapisz zmiany</button>
</form>

<a href="{$conf->action_root}eventOrganizerPanel" class="button">Anuluj</a>
{/block}
