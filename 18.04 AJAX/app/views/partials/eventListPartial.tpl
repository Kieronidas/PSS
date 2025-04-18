{if $events|@count > 0}
<table class="event-table">
    <thead>
        <tr>
            <th>Nazwa wydarzenia</th>
            <th>Lokalizacja</th>
            <th>Data</th>
            <th>Godzina</th>
            <th>Pojemność</th>
            <th>Zapisanych</th>
            <th>Status</th>
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
            <td>{$event.registered|escape}</td>
            <td>{if $event.is_verified}Zatwierdzone{else}Niezatwierdzone{/if}</td>
        </tr>
        {/foreach}
    </tbody>
</table>
{else}
    <p>Brak wydarzeń spełniających podane kryteria.</p>
{/if}
