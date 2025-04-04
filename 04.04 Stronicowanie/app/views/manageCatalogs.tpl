{extends file="main.tpl"}

{block name="top"}
    {if isset($user_role) && $user_role == 2} {* Weryfikacja roli administratora *}

    <div class="catalog-header">
        <h2>Zarządzanie Katalogami</h2>
    </div>

    <div class="catalog-wrapper">
        <!-- Statusy wydarzeń -->
        <div class="catalog-section">
            <h3>Statusy Wydarzeń</h3>
            {if isset($statuses) && $statuses|@count > 0}
                <ul class="catalog-list">
                    {foreach from=$statuses item=status}
                        <li>
                            <span>ID: {$status.id_status}, Nazwa: {$status.status_name}</span>
                            <div>
                                <a href="{rel_url action='editStatus' id_status=$status.id_status}">Edytuj</a>
                                <a href="{rel_url action='deleteStatus' id_status=$status.id_status}" 
                                   onclick="return confirm('Czy na pewno chcesz usunąć ten status?')">Usuń</a>
                            </div>
                        </li>
                    {/foreach}
                </ul>
            {else}
                <p>Brak statusów w bazie danych.</p>
            {/if}

            <h4>Dodaj nowy status</h4>
            <form action="{rel_url action='addStatus'}" method="post" class="catalog-form">
                <input type="text" name="status_name" placeholder="Nazwa statusu" required>
                <button type="submit" class="catalog-button">Dodaj</button>
            </form>
        </div>

        <!-- Typy wydarzeń -->
        <div class="catalog-section">
            <h3>Typy Wydarzeń</h3>
            {if isset($types) && $types|@count > 0}
                <ul class="catalog-list">
                    {foreach from=$types item=type}
                        <li>
                            <span>ID: {$type.id_type}, Nazwa: {$type.type_name}</span>
                            <div>
                                <a href="{rel_url action='editType' id_type=$type.id_type}">Edytuj</a>
                                <a href="{rel_url action='deleteType' id_type=$type.id_type}" 
                                   onclick="return confirm('Czy na pewno chcesz usunąć ten typ?')">Usuń</a>
                            </div>
                        </li>
                    {/foreach}
                </ul>
            {else}
                <p>Brak typów wydarzeń w bazie danych.</p>
            {/if}

            <h4>Dodaj nowy typ wydarzenia</h4>
            <form action="{rel_url action='addType'}" method="post" class="catalog-form">
                <input type="text" name="type_name" placeholder="Nazwa typu" required>
                <button type="submit" class="catalog-button">Dodaj</button>
            </form>
        </div>
    </div>

    <!-- Przycisk powrotu do panelu administratora -->
    <a href="{rel_url action='adminPanel'}" class="back-button">Powrót do Panelu Administratora</a>

    {else}  
        <p>Brak dostępu. Musisz być administratorem.</p>  
    {/if}
{/block}
