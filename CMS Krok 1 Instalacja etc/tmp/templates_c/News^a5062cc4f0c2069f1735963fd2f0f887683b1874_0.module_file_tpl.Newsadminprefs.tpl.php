<?php
/* Smarty version 4.2.1, created on 2025-05-02 18:39:54
  from 'module_file_tpl:News;adminprefs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6814f55a348921_82627295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5062cc4f0c2069f1735963fd2f0f887683b1874' => 
    array (
      0 => 'module_file_tpl:News;adminprefs.tpl',
      1 => 1746202546,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6814f55a348921_82627295 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\function.cms_yesno.php','function'=>'smarty_cms_function_cms_yesno',),2=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),3=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\modifier.cms_escape.php','function'=>'smarty_modifier_cms_escape',),));
echo $_smarty_tpl->tpl_vars['startform']->value;?>

<div class="pageoverflow">
  <p class="pageinput">
    <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
optionssubmitbutton" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
  </p>
</div>

<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['title_submission_settings']->value;?>
:</legend>
        <div class="pageoverflow">
	    <p class="pagetext"><label for="alert_drafts"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_alert_drafts');?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_opt_alert_drafts','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_alert_drafts')),$_smarty_tpl);?>
</p>
	    <p class="pageinput">
	        <select id="alert_drafts" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
alert_drafts">
		<?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['alert_drafts']->value),$_smarty_tpl);?>

		</select>
	    </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><label for="dfltcat"><?php echo $_smarty_tpl->tpl_vars['title_default_category']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_opt_dflt_category','title'=>$_smarty_tpl->tpl_vars['title_submission_settings']->value),$_smarty_tpl);?>
</p>
		<p class="pageinput">
                  <select id="dfltcat" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
default_category">
                  <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['categorylist']->value,'selected'=>$_smarty_tpl->tpl_vars['default_category']->value),$_smarty_tpl);?>

                  </select>
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><label for="fld2"><?php echo $_smarty_tpl->tpl_vars['title_allowed_upload_types']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_opt_allowed_upload_types','title'=>$_smarty_tpl->tpl_vars['title_allowed_upload_types']->value),$_smarty_tpl);?>
</p>
		<p class="pageinput">
                  <input type="text" id="fld2" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
allowed_upload_types" value="<?php echo $_smarty_tpl->tpl_vars['allowed_upload_types']->value;?>
" size="50"/>
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><label for="fld3"><?php echo $_smarty_tpl->tpl_vars['title_hide_summary_field']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_opt_hide_summary','title'=>$_smarty_tpl->tpl_vars['title_hide_summary_field']->value),$_smarty_tpl);?>
</p>
		<p class="pageinput">
                  <input type="checkbox" id="fld3" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
hide_summary_field" value="1" <?php if ($_smarty_tpl->tpl_vars['hide_summary_field']->value == 1) {?>checked="checked"<?php }?>/>
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><label for="fld4"><?php echo $_smarty_tpl->tpl_vars['title_allow_summary_wysiwyg']->value;?>
: <?php echo smarty_function_cms_help(array('key'=>'help_opt_allow_summary_wysiwyg','title'=>$_smarty_tpl->tpl_vars['title_allow_summary_wysiwyg']->value),$_smarty_tpl);?>
</label></p>
		<p class="pageinput">
                  <input type="checkbox" id="fld4" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
allow_summary_wysiwyg" value="1" <?php if ($_smarty_tpl->tpl_vars['allow_summary_wysiwyg']->value) {?>checked="checked"<?php }?>/>
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><label for="fld5"><?php echo $_smarty_tpl->tpl_vars['title_expiry_interval']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_opt_expiry_interval','title'=>$_smarty_tpl->tpl_vars['title_expiry_interval']->value),$_smarty_tpl);?>
</p>
		<p class="pageinput">
                  <input type="text" id="fld5" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
expiry_interval" value="<?php echo $_smarty_tpl->tpl_vars['expiry_interval']->value;?>
" size="4" maxlength="4"/>
                </p>
	</div>
</fieldset>
<br/>

<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['title_fesubmit_settings']->value;?>
:</legend>
	<div class="pageoverflow">
		<p class="pagetext"><label for="fld9_a"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_allow_fesubmit');?>
:</label></p>
		<p class="pageinput">
                  <select id="fld9_a" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
allow_fesubmit">
                  <?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['allow_fesubmit']->value),$_smarty_tpl);?>

                  </select>
		  <br/><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_allow_fesubmit');?>

                </p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext"><label for="fld9"><?php echo $_smarty_tpl->tpl_vars['title_fesubmit_status']->value;?>
:</label></p>
		<p class="pageinput">
                  <select id="fld9" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
fesubmit_status">
                  <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'selected'=>$_smarty_tpl->tpl_vars['fesubmit_status']->value),$_smarty_tpl);?>

                  </select>
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><label for="fld10"><?php echo $_smarty_tpl->tpl_vars['title_fesubmit_redirect']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_fesubmit_redirect','title'=>$_smarty_tpl->tpl_vars['title_fesubmit_redirect']->value),$_smarty_tpl);?>
</p>
		<p class="pageinput">
                   <input type="text" id="fld10" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
fesubmit_redirect" value="<?php echo $_smarty_tpl->tpl_vars['fesubmit_redirect']->value;?>
" size="20" maxlength="20"/>
                </p>
	</div>

  <fieldset>
  <legend><?php echo $_smarty_tpl->tpl_vars['title_notification_settings']->value;?>
:</legend>
        <div class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_fesubmit_notification');?>
</div>
	<div class="pageoverflow">
		<p class="pagetext"><label for="fld6"><?php echo $_smarty_tpl->tpl_vars['title_formsubmit_emailaddress']->value;?>
:</label></p>
		<p class="pageinput">
                   <input type="text" id="fld6" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
formsubmit_emailaddress" value="<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['formsubmit_emailaddress']->value);?>
" size="50" maxlength="255"/>
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><label for="fld7"><?php echo $_smarty_tpl->tpl_vars['title_email_subject']->value;?>
:</label></p>
		<p class="pageinput">
		  <input type="text" id="fld7" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
email_subject" value="<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['email_subject']->value);?>
" size="50" maxlength="255"/>
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><label for="fld8"><?php echo $_smarty_tpl->tpl_vars['title_email_template']->value;?>
:</label></p>
		<p class="pageinput">
                  <textarea id="fld8" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
email_template" rows="5" cols="80"><?php echo $_smarty_tpl->tpl_vars['email_template']->value;?>
</textarea>
                </p>
	</div>
  </fieldset>

</fieldset>
<br/>

<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['title_detail_settings']->value;?>
:</legend>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_detail_returnid']->value;?>
: <?php echo smarty_function_cms_help(array('key'=>'info_detail_returnid','title'=>$_smarty_tpl->tpl_vars['title_detail_returnid']->value),$_smarty_tpl);?>
</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_detail_returnid']->value;?>

	</div>
	<div class="pageoverflow">
		<p class="pagetext"><label for="fld12"><?php echo $_smarty_tpl->tpl_vars['title_expired_searchable']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'info_expired_searchable','title'=>$_smarty_tpl->tpl_vars['title_expired_searchable']->value),$_smarty_tpl);?>
</p>
		<p class="pageinput">
                  <input type="checkbox" id="fld12" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
expired_searchable" value="1" <?php if ($_smarty_tpl->tpl_vars['expired_searchable']->value) {?>checked="checked"<?php }?>/>
                </p>
	</div>
        <div class="pageoverflow">
	  <p class="pagetext"><label for="fld13"><?php echo $_smarty_tpl->tpl_vars['title_expired_viewable']->value;?>
</label> <?php echo smarty_function_cms_help(array('key'=>'info_expired_viewable','title'=>$_smarty_tpl->tpl_vars['title_expired_viewable']->value),$_smarty_tpl);?>
</p>
	  <p class="pagetext">
            <input type="checkbox" id="fld13" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
expired_viewable" value="1" <?php if ($_smarty_tpl->tpl_vars['expired_viewable']->value) {?>checked="checked"<?php }?>/>
          </p>
        </div>
</fieldset>

<?php echo $_smarty_tpl->tpl_vars['endform']->value;
}
}
