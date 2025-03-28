{extends file="main.tpl"}

{block name="top"}
<section class="participant-panel">
    <h2>Panel Uczestnika</h2>

    <!-- Wyświetlanie komunikatów -->
    {if $msgs->isError()}
        <ul class="message-list error">
            {foreach $msgs->getMessages() as $msg}
                <li>{$msg->text}</li>
            {/foreach}
        </ul>
    {/if}
    {if $msgs->isInfo()}
        <ul class="message-list info">
            {foreach $msgs->getMessages() as $msg}
                <li>{$msg->text}</li>
            {/foreach}
        </ul>
    {/if}

    <!-- Formularz zmiany hasła -->
    <h3>Zmień swoje hasło</h3>
    <form action="{rel_url action='changePassword'}" method="post" class="change-password-form">
        <label for="old_password">Obecne hasło:</label>
        <input type="password" id="old_password" name="old_password" placeholder="Obecne hasło" required>
        
        <label for="new_password">Nowe hasło:</label>
        <input type="password" id="new_password" name="new_password" placeholder="Nowe hasło" required minlength="6">
        
        <label for="confirm_password">Potwierdź nowe hasło:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Potwierdź nowe hasło" required minlength="6">
        
        <button type="submit">Zmień hasło</button>
    </form>

    <!-- Lista dostępnych wydarzeń -->
    <h3>Lista dostępnych wydarzeń</h3>
    <table class="event-table participant-table">
    <thead>
        <tr>
            <th>Nazwa wydarzenia</th>
            <th>Lokalizacja</th>
            <th>Data</th>
            <th>Godzina</th>
            <th>Pojemność</th>
            <th>Zapisani</th>
            <th>Akcja</th>
        </tr>
    </thead>
    <tbody>
    {foreach $events as $event}
    <tr>
        <td>{$event.name}</td>
        <td>{$event.location}</td>
        <td>{$event.date}</td>
        <td>{$event.time}</td>
        <td>{$event.capacity}</td>
        <td>{$event.registered}</td>
        <td>
            <div class="button-container">
                <form action="{rel_url action='registerForEvent'}" method="post">
                    <input type="hidden" name="id_event" value="{$event.id_event}">
                    {if $event.capacity == 0}
                        <button type="button" class="button-disabled" disabled>Zapisy zamknięte</button>
                    {else}
                        {if $event.registered < $event.capacity}
                            <button type="submit" class="button-success">Zapisz się</button>
                        {else}
                            <button type="button" class="button-disabled" disabled>Brak miejsc</button>
                        {/if}
                    {/if}
                </form>
            </div>
        </td>
    </tr>
    {/foreach}
    </tbody>
    </table>

    <!-- Moje zapisane wydarzenia -->
    <h3>Moje zapisane wydarzenia</h3>
    {if $my_events|@count > 0}
    <table class="event-table participant-table">
    <thead>
        <tr>
            <th>Nazwa wydarzenia</th>
            <th>Lokalizacja</th>
            <th>Data</th>
            <th>Godzina</th>
            <th>Pojemność</th>
            <th>Zapisani</th>
            <th>Akcja</th>
        </tr>
    </thead>
    <tbody>
    {foreach $my_events as $event}
    <tr>
        <td>{$event.name}</td>
        <td>{$event.location}</td>
        <td>{$event.date}</td>
        <td>{$event.time}</td>
        <td>{$event.capacity}</td>
        <td>{$event.registered}</td>
        <td>
            <div class="button-container">
                <form action="{rel_url action='unregisterFromEvent'}" method="post">
                    <input type="hidden" name="id_event" value="{$event.id_event}">
                    <button type="submit" class="button-warning">Rezygnuj</button>
                </form>
                <a href="{rel_url action='showConfirmation' id_event=$event.id_event}" class="button-secondary">Zobacz potwierdzenie</a>
            </div>
        </td>
    </tr>
    {/foreach}
    </tbody>
    </table>
    {else}
        <p class="no-events-message">Nie jesteś zapisany na żadne wydarzenia.</p>
    {/if}

    <!-- Powrót do panelu -->
    <div class="back-button-container">
        <a href="{rel_url action='participantPanel'}" class="button-secondary">Powrót</a>
    </div>
</section>
{/block}
