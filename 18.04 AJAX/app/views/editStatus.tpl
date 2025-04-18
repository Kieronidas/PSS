{extends file="main.tpl"}

{block name="top"}
    <h2>Edycja Statusu</h2>

    {if isset($status)}
        <form action="{rel_url action='updateStatus'}" method="post">
            <input type="hidden" name="id_status" value="{$status.id_status}">
            <label for="status_name">Nowa nazwa statusu:</label>
            <input type="text" name="status_name" value="{$status.status_name}" required>
            <button type="submit">Zapisz zmiany</button>
        </form>
    {else}
        <p>Nie znaleziono statusu.</p>
    {/if}

    <a href="{rel_url action='manageCatalogs'}">Powrót</a>
{/block}
