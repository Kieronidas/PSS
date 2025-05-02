<?php
/* Smarty version 4.2.1, created on 2025-05-02 18:36:52
  from 'module_file_tpl:LISE;help_whats_new_tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6814f4a4c0ac78_73980507',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87b256012c7ce8319968bc89adeb3af1bb563352' => 
    array (
      0 => 'module_file_tpl:LISE;help_whats_new_tab.tpl',
      1 => 1746203811,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6814f4a4c0ac78_73980507 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="pageoverflow">
  <h3>What's new</h3>
  <p>These are some of the new features of the latest releases:</p>

  <h4>Version 1.5</h4>
  <ul>
    <li>
      <b>Item Editor</b> has now <b>previous</b> and <b>next</b> navigation buttons with option to submit if there are changes to the form;
    </li>
    <li>
      Similar to the <b>Custom Field From UDT</b> custom field, there is now a <b>Custom Field From Smarty Template</b> field which allows you to populate field options from Smarty logic;
    </li>
    <li>
      There is a <b>Help Popup</b> custom field, which will add a clickable <img src="themes/OneEleven/images/icons/system/info.gif"> icon to the previous field in the list which will open a help popup dialog with your custom text and title, great for help texts for other fields;
    </li>
    <li>
      There is a <b>Preview</b> custom filed that adds a preview tab to the Item Editor;
    </li>
  </ul>

  <h5>New features</h5>

  <ul>
    <li>Added Titles Modes and auto generation;</li>
    <li>Added easy navigation on the Item Editor via previous and next arrow buttons;</li>
    <li>Item Title, Alias and Custom URLs templates have new tags with more features;</li>
    <li>Added option to list inactive items, active items or both in LISE Instance Item custom field;</li>
    <li>New option to make an inactive item trigger a 404 error when accessed via its URL;</li>
  </ul>
</div><?php }
}
