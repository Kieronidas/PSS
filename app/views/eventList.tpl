{extends file="main.tpl"}

{block name="top"}
<section class="event-list-container">
    <h2 class="event-list-title">Lista Wydarzeń</h2>

<form action="{$conf->action_root}eventList" method="get" class="filter-form">

    <!-- Największe pola na górze -->
    <div class="filter-group-large">
        <div>
            <label for="type">Typ wydarzenia:</label>
            <input type="text" id="type" name="type" value="{$filters.type|escape}" placeholder="Wpisz typ">
        </div>
        <div>
            <label for="name">Nazwa:</label>
            <input type="text" id="name" name="name" value="{$filters.name|escape}" placeholder="Wpisz nazwę">
        </div>
        <div>
            <label for="location">Lokalizacja:</label>
            <input type="text" id="location" name="location" value="{$filters.location|escape}" placeholder="Wpisz lokalizację">
        </div>
        <div>
            <label for="description">Opis:</label>
            <input type="text" id="description" name="description" value="{$filters.description|escape}" placeholder="Wpisz opis">
        </div>
    </div>

    <!-- Data i godzina -->
    <div class="filter-group-datetime-container">
        <div class="filter-group-date">
            <div class="filter-group-small">
                <label for="date_from">Od daty:</label>
                <input type="date" id="date_from" name="date_from" value="{$filters.date_from|escape}">
            </div>
            <div class="filter-group-small">
                <label for="date_to">Do daty:</label>
                <input type="date" id="date_to" name="date_to" value="{$filters.date_to|escape}">
            </div>
        </div>
        <div class="filter-group-time">
            <div class="filter-group-small">
                <label for="time_from">Od godz.:</label>
                <input type="time" id="time_from" name="time_from" value="{$filters.time_from|escape}">
            </div>
            <div class="filter-group-small">
                <label for="time_to">Do godz.:</label>
                <input type="time" id="time_to" name="time_to" value="{$filters.time_to|escape}">
            </div>
        </div>
    </div>

    <!-- Status nad Sortuj i Kierunek -->
    <div class="filter-group-status">
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="">Wszystkie</option>
            <option value="verified" {if $filters.status == 'verified'}selected{/if}>Zatwierdzone</option>
            <option value="unverified" {if $filters.status == 'unverified'}selected{/if}>Niezatwierdzone</option>
        </select>
    </div>

    <!-- Sortowanie i Kierunek -->
    <div class="filter-group-sort-container">
        <div class="filter-group-sort">
            <label for="sort">Sortuj wg:</label>
            <select id="sort" name="sort">
                <option value="date" {if $currentSort == 'date'}selected{/if}>Data</option>
                <option value="time" {if $currentSort == 'time'}selected{/if}>Godzina</option>
                <option value="name" {if $currentSort == 'name'}selected{/if}>Nazwa</option>
                <option value="capacity" {if $currentSort == 'capacity'}selected{/if}>Pojemność</option>
                <option value="location" {if $currentSort == 'location'}selected{/if}>Lokalizacja</option>
            </select>
        </div>
        <div class="filter-group-sort">
            <label for="order">Kierunek:</label>
            <select id="order" name="order">
                <option value="ASC" {if $currentOrder|upper == 'ASC'}selected{/if}>Rosnąco</option>
                <option value="DESC" {if $currentOrder|upper == 'DESC'}selected{/if}>Malejąco</option>
            </select>
        </div>
    </div>

    <!-- Przycisk Filtruj na dole -->
    <button type="submit" class="filter-button">Filtruj</button>
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
                <th>Zapisanych</th> <!-- Nowa kolumna -->
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
                <td>{$event.registered|escape}</td> <!-- Wyświetlamy zarejestrowanych -->
                <td>{if $event.is_verified}Zatwierdzone{else}Niezatwierdzone{/if}</td>
            </tr>
            {/foreach}
        </tbody>
    </table>
{else}
    <p>Brak wydarzeń spełniających podane kryteria.</p>
{/if}

    <!-- PRZYCISKI NAWIGACYJNE -->
    {if \core\RoleUtils::inRole("Admin")}
        <a href="{$conf->action_root}adminPanel" class="button">Panel Administracyjny</a>
    {/if}

    {if \core\RoleUtils::inRole("Event Organizer")}
        <a href="{$conf->action_root}eventOrganizerPanel" class="button">Panel Organizatora Wydarzeń</a>
    {/if}

    {if \core\RoleUtils::inRole("Participant")}
        <a href="{$conf->action_root}participantPanel" class="button">Panel Uczestnika</a>
    {/if}

</section>
{/block}