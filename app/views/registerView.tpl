{extends file="main.tpl"}

{block name="top"}
<section id="register-form" class="form-container">
    <h3 class="form-title">Rejestracja:</h3>

  

    <form action="{$conf->action_root}register" method="post" class="pure-form pure-form-stacked">
        
        <label for="login">Login:</label>
        <!-- Zapamiętujemy wpisany login przez $form.login -->
        <input type="text" id="login" name="login"
               value="{$form.login|default:''|escape}" required>

        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password"
               value="{$form.password|default:''|escape}" required>

        <label for="confirm_password">Potwierdź hasło:</label>
        <input type="password" id="confirm_password" name="confirm_password"
               value="{$form.confirm_password|default:''|escape}" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email"
               value="{$form.email|default:''|escape}" required>




  <!-- Wyświetlanie komunikatów -->
    {if $msgs->isMessage()}
        {foreach $msgs->getMessages() as $msg}
            <div class="
                alert
                {if $msg->isInfo()} alert-success{/if}
                {if $msg->isWarning()} alert-warning{/if}
                {if $msg->isError()} alert-danger{/if}"
                role="alert">
                {$msg->text}
            </div>
        {/foreach}
    {/if}
        <button type="submit" class="pure-button pure-button-primary" style="margin-top:10px;">
            Zarejestruj
        </button>
    </form>
</section>
{/block}
