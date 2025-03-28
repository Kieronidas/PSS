{extends file="main.tpl"}

{block name="top"}
    <h2>Potwierdzenie Rejestracji</h2>
    <p><strong>Wydarzenie:</strong> {$event.name}</p>
    <p><strong>Data:</strong> {$event.date}</p>
    <p><strong>Godzina:</strong> {$event.time}</p>
    <p><strong>Lokalizacja:</strong> {$event.location}</p>
    <p>✅ Jesteś zapisany na to wydarzenie!</p>
    
    <br>
    <a href="{rel_url action='participantPanel'}" class="pure-button button-primary">Powrót</a>
{/block}
