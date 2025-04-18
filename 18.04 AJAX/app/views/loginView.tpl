{extends file="main.tpl"}

{block name="top"}
<section id="login-form" class="form-container">





  <h3 class="form-title">Logowanie:</h3>
    <form action="{$conf->action_root}login" method="post" class="pure-form pure-form-stacked">

       <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>
        <label for="pass">Hasło:</label>
        <input type="password" id="pass" name="pass" required>


{foreach $msgs->getMessages() as $msg}
        <div class="alert>
                    {if $msg->isInfo()}alert-success{/if}
                    {if $msg->isWarning()}alert-warning{/if}
                    {if $msg->isError()}alert-danger{/if}" role="alert">
            {$msg->text}
        </div>
    {/foreach}





        <button type="submit" class="pure-button pure-button-primary">Zaloguj</button>




    </form>
</section>
{/block}
