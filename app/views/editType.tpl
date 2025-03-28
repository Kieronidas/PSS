{extends file="main.tpl"}

{block name="top"}
    <h2>Edycja Typu Wydarzenia</h2>

    {if isset($type)}
        <form action="{rel_url action='updateType'}" method="post">
            <input type="hidden" name="id_type" value="{$type.id_type}">
            <label for="type_name">Nowa nazwa typu:</label>
            <input type="text" name="type_name" value="{$type.type_name}" required>
            <button type="submit">Zapisz zmiany</button>
        </form>
    {else}
        <p>Nie znaleziono typu wydarzenia.</p>
    {/if}

    <a href="{rel_url action='manageCatalogs'}">Powrót</a>
{/block}
