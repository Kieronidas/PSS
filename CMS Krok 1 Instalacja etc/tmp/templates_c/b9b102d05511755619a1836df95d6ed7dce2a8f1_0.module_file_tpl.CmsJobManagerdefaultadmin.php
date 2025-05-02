<?php
/* Smarty version 4.2.1, created on 2025-05-02 18:37:59
  from 'module_file_tpl:CmsJobManager;defaultadmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6814f4e7af52e8_57062021',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9b102d05511755619a1836df95d6ed7dce2a8f1' => 
    array (
      0 => 'module_file_tpl:CmsJobManager;defaultadmin.tpl',
      1 => 1746202541,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6814f4e7af52e8_57062021 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\smarty\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),1=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\modifier.relative_time.php','function'=>'smarty_modifier_relative_time',),2=>array('file'=>'C:\\xampp\\htdocs\\ms\\lib\\plugins\\modifier.localedate_format.php','function'=>'smarty_modifier_localedate_format',),));
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
  $('#simple1').click(function(ev){
     ev.preventDefault();
     cms_confirm('woot it works');
  });
});
<?php echo '</script'; ?>
>

<div class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_background_jobs');?>
</div>

<?php if (!count($_smarty_tpl->tpl_vars['jobs']->value)) {?>
  <div style="text-align: center;">
    <div class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_no_jobs');?>
</div>
  </div>
<?php } else { ?>
  <table class="pagetable">
    <thead>
      <tr>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('name');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('module');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('created');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('start');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('frequency');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('until');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('errors');?>
</th>
        <th class="pageicon"></th>
      </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['jobs']->value, 'job');
$_smarty_tpl->tpl_vars['job']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['job']->value) {
$_smarty_tpl->tpl_vars['job']->do_else = false;
?>
      <tr class="<?php echo smarty_function_cycle(array('values'=>'row1,row2'),$_smarty_tpl);?>
">
        <td><?php echo $_smarty_tpl->tpl_vars['job']->value->name;?>
</td>
        <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['job']->value->module ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</td>
        <td><?php echo smarty_modifier_relative_time($_smarty_tpl->tpl_vars['job']->value->created);?>
</td>
        <td>
           <?php if ($_smarty_tpl->tpl_vars['job']->value->start < time()-$_smarty_tpl->tpl_vars['async_freq']->value) {?><span style="color: red;">
               <?php } elseif ($_smarty_tpl->tpl_vars['job']->value->start < time()+$_smarty_tpl->tpl_vars['async_freq']->value) {?><span style="color: green;">
           <?php } else { ?><span>
           <?php }?>
             <?php echo smarty_modifier_relative_time($_smarty_tpl->tpl_vars['job']->value->start);?>

           </span>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['recur_list']->value[$_smarty_tpl->tpl_vars['job']->value->frequency];?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['job']->value->until) {
echo smarty_modifier_localedate_format($_smarty_tpl->tpl_vars['job']->value->until,'%x %X');
}?></td>
        <td><?php if ($_smarty_tpl->tpl_vars['job']->value->errors > 0) {?><span style="color: red;"><?php echo $_smarty_tpl->tpl_vars['job']->value->errors;?>
</span><?php }?></td>
        <td></td>
      </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
  </table>
<?php }?>

<?php }
}
