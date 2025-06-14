<?php
/* Smarty version 4.2.1, created on 2025-06-13 22:56:31
  from 'cms_template:menu_nav' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_684c907f2e7e53_79258491',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd089f6455153bac31b8d77ac8b62c721f71ace6c' => 
    array (
      0 => 'cms_template:menu_nav',
      1 => '1749725289',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_684c907f2e7e53_79258491 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'Nav_menu' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\ms\\tmp\\templates_c\\^d089f6455153bac31b8d77ac8b62c721f71ace6c_0.cms_template.menunav.php',
    'uid' => 'd089f6455153bac31b8d77ac8b62c721f71ace6c',
    'call_name' => 'smarty_template_function_Nav_menu_853908196684c907f0ef396_74578037',
  ),
));
?>


<?php if ((isset($_smarty_tpl->tpl_vars['nodes']->value))) {
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'Nav_menu', array('data'=>$_smarty_tpl->tpl_vars['nodes']->value,'depth'=>0), true);?>

<?php }
}
/* smarty_template_function_Nav_menu_853908196684c907f0ef396_74578037 */
if (!function_exists('smarty_template_function_Nav_menu_853908196684c907f0ef396_74578037')) {
function smarty_template_function_Nav_menu_853908196684c907f0ef396_74578037(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('depth'=>1), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>
<ul><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'node', true);
$_smarty_tpl->tpl_vars['node']->iteration = 0;
$_smarty_tpl->tpl_vars['node']->index = -1;
$_smarty_tpl->tpl_vars['node']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->do_else = false;
$_smarty_tpl->tpl_vars['node']->iteration++;
$_smarty_tpl->tpl_vars['node']->index++;
$_smarty_tpl->tpl_vars['node']->first = !$_smarty_tpl->tpl_vars['node']->index;
$_smarty_tpl->tpl_vars['node']->last = $_smarty_tpl->tpl_vars['node']->iteration === $_smarty_tpl->tpl_vars['node']->total;
$__foreach_node_0_saved = $_smarty_tpl->tpl_vars['node'];
$_smarty_tpl->_assignInScope('liclass', ('menudepth').($_smarty_tpl->tpl_vars['depth']->value));
$_smarty_tpl->_assignInScope('aclass', '');
if ($_smarty_tpl->tpl_vars['node']->first && $_smarty_tpl->tpl_vars['node']->total > 1) {
$_smarty_tpl->_assignInScope('liclass', ($_smarty_tpl->tpl_vars['liclass']->value).(' first_child'));
}
if ($_smarty_tpl->tpl_vars['node']->last && $_smarty_tpl->tpl_vars['node']->total > 1) {
$_smarty_tpl->_assignInScope('liclass', ($_smarty_tpl->tpl_vars['liclass']->value).(' last_child'));
}
if ($_smarty_tpl->tpl_vars['node']->value->current) {
$_smarty_tpl->_assignInScope('liclass', ($_smarty_tpl->tpl_vars['liclass']->value).(' menuactive'));
$_smarty_tpl->_assignInScope('aclass', ($_smarty_tpl->tpl_vars['aclass']->value).(' menuactive'));
}
if ($_smarty_tpl->tpl_vars['node']->value->parent) {
$_smarty_tpl->_assignInScope('liclass', ($_smarty_tpl->tpl_vars['liclass']->value).(' menuactive menuparent'));
$_smarty_tpl->_assignInScope('aclass', ($_smarty_tpl->tpl_vars['aclass']->value).(' menuactive menuparent'));
}
if ($_smarty_tpl->tpl_vars['node']->value->children) {
$_smarty_tpl->_assignInScope('liclass', ($_smarty_tpl->tpl_vars['liclass']->value).(' parent'));
$_smarty_tpl->_assignInScope('aclass', ($_smarty_tpl->tpl_vars['aclass']->value).(' parent'));
}
if ($_smarty_tpl->tpl_vars['node']->value->type == 'sectionheader') {?><li class='sectionheader <?php echo $_smarty_tpl->tpl_vars['liclass']->value;?>
'><span><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
</span><?php if ((isset($_smarty_tpl->tpl_vars['node']->value->children))) {
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'Nav_menu', array('data'=>$_smarty_tpl->tpl_vars['node']->value->children,'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1), true);
}?></li><?php } elseif ($_smarty_tpl->tpl_vars['node']->value->type == 'separator') {?><li class='separator <?php echo $_smarty_tpl->tpl_vars['liclass']->value;?>
'><hr class='separator'/></li><?php } else { ?><li class="<?php echo $_smarty_tpl->tpl_vars['liclass']->value;?>
"><a class="<?php echo $_smarty_tpl->tpl_vars['aclass']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['node']->value->url;?>
"<?php if ($_smarty_tpl->tpl_vars['node']->value->target != '') {?> target="<?php echo $_smarty_tpl->tpl_vars['node']->value->target;?>
"<?php }?>><span><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
</span></a><?php if ((isset($_smarty_tpl->tpl_vars['node']->value->children))) {
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'Nav_menu', array('data'=>$_smarty_tpl->tpl_vars['node']->value->children,'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1), true);
}?></li><?php }
$_smarty_tpl->tpl_vars['node'] = $__foreach_node_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php
}}
/*/ smarty_template_function_Nav_menu_853908196684c907f0ef396_74578037 */
}
