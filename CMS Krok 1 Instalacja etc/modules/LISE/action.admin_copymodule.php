<?php
#-------------------------------------------------------------------------
# LISE - List It Special Edition
# Version 1.2
# A fork of ListI2
# maintained by Fernando Morgado AKA Jo Morg
# since 2015
#-------------------------------------------------------------------------
#
# Original Author: Ben Malen, <ben@conceptfactory.com.au>
# Co-Maintainer: Simon Radford, <simon@conceptfactory.com.au>
# Web: www.conceptfactory.com.au
#
#-------------------------------------------------------------------------
#
# Maintainer since 2011 up to 2014: Jonathan Schmid, <hi@jonathanschmid.de>
# Web: www.jonathanschmid.de
#
#-------------------------------------------------------------------------
#
# Some wackos started destroying stuff since 2012 and stopped at 2014:
#
# Tapio Löytty, <tapsa@orange-media.fi>
# Web: www.orange-media.fi
#
# Goran Ilic, <uniqu3e@gmail.com>
# Web: www.ich-mach-das.at
#
#-------------------------------------------------------------------------
#
# LISE is a CMS Made Simple module that enables the web developer to create
# multiple lists throughout a site. It can be duplicated and given friendly
# names for easier client maintenance.
#
#-------------------------------------------------------------------------
# BEGIN_LICENSE
#-------------------------------------------------------------------------
# This file is part of LISE
# LISE program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# LISE program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
# END_LICENSE
#-------------------------------------------------------------------------
if( !defined('CMS_VERSION') ) exit;

#---------------------
# Check params
#---------------------
if (isset($params['cancel'])) 
{
  $params = array('active_tab' => 'instancestab');
  $this->Redirect($id, 'defaultadmin', $returnid, $params);
}

$autoinstall = $this->GetPreference('allow_autoinstall', 0);
$module_name = '';

if(isset($params['module_name'])) 
{
  $module_name = $params['module_name'];
}

$module_friendlyname = $module_name; 

if( !empty($params['module_friendlyname']) ) 
{
	$module_friendlyname = $params['module_friendlyname'];
}

$invalid_names = array('lise', 'original', 'xdefs', 'loader');
$modules = $this->ListModules();

#---------------------
# module admin section options
#---------------------
$admin_sections = array(
                          lang('main')        => 'main',
                          lang('content')     => 'content',
                          lang('layout')      => 'layout',
                          lang('files')       => 'files',
                          lang('usersgroups') => 'usersgroups',
                          lang('extensions')  => 'extensions',
                          lang('siteadmin')   => 'siteadmin',
                          lang('myprefs')     => 'myprefs',
                          lang('ecommerce')   => 'ecommerce'
                        );

#---------------------
# Instance Modes
#---------------------

$lise_mode = $this->GetPreference('lise_mode', LISE::MODE_LIST);

$modes_list = [
  LISE::MODE_LIST   => $this->ModLang('lise_mode_list_name'),
  LISE::MODE_GLOBAL => $this->ModLang('lise_mode_global_name'),
  LISE::MODE_LOCAL  => $this->ModLang('lise_mode_local_name'),
];


foreach($modules as $mod) 
{
	$mod->module_name = substr($mod->module_name, strlen(LISEDuplicator::MOD_PREFIX));
	$invalid_names[] = strtolower($mod->module_name);
}

#---------------------
# Submit
#---------------------
if (isset($params['submit'])) 
{
	$errors = array();
	
	if(empty($module_name)) 
  {
		$errors[] = $this->ModLang('module_name_empty');
	}
	
	if(preg_match('/[^0-9a-zA-Z]/', $module_name)) 
  {
		$errors[] = $this->ModLang('module_name_invalid');
	}
	
	if(in_array(strtolower($module_name), $invalid_names))
  {
		$errors[] = $this->ModLang('module_name_invalid');
	}	

	if (empty($errors))
  {
		$duplicator = new LISEDuplicator($module_name);
		$module_fullname = $duplicator->Run();
		
		if($autoinstall) 
    {
			$modops = ModuleOperations::get_instance();
			$modops->InstallModule($module_fullname);
      $mod = \cms_utils::get_module($module_fullname);
      $mod->SetPreference('friendlyname',         $module_friendlyname);
      $mod->SetPreference('adminsection',         $params['adminsection']);
      $mod->SetPreference('moddescription',       $params['moddescription']);
      $mod->SetPreference('hide_alias',		       (isset($params['hide_alias'])?1:0));
      $mod->SetPreference('hide_slug',		         (isset($params['hide_slug'])?1:0));
      $mod->SetPreference('hide_time_control',		 (isset($params['hide_time_control'])?1:0));
      $mod->SetPreference('auto_upgrade',         (isset($params['auto_upgrade']) ? 1 : 0));
      $mod->SetPreference('separate_settings',    (isset($params['separate_settings']) ? 1 : 0));
      $mod->SetMode($params['instance_mode']);
		}
		
		$params = array('message' => 'modulecopied','active_tab' => 'instancestab');
		$this->Redirect($id, 'defaultadmin', '', $params);  
	}
}

#---------------------
# Error handling
#---------------------
if (!empty($errors)) echo $this->ShowErrors($errors);

#---------------------
# Smarty processing
#---------------------
$smarty->assign('startform', $this->CreateFormStart ($id, 'admin_copymodule', $returnid, 'post', 'multipart/form-data', false, '', $params));
$smarty->assign('endform', $this->CreateFormEnd());


$smarty->assign('input_module_name', $this->CreateInputText($id, 'module_name', $module_name, 40));
$smarty->assign('input_module_friendlyname', $this->CreateInputText($id, 'module_friendlyname', $module_friendlyname, 40));
$smarty->assign('input_moddescription', $this->CreateTextArea(false, $id, $this->GetPreference('moddescription', $this->ModLang('moddescription')), 'moddescription', 'pagesmalltextarea', '', '', '', '80', '3'));
$smarty->assign('input_adminsection', $this->CreateInputDropdown($id, 'adminsection', $admin_sections, -1, $this->GetPreference('adminsection', 'content')));
$smarty->assign('autoinstall', $autoinstall);
$smarty->assign('input_separate_settings_control', $this->CreateInputCheckbox($id, 'separate_settings', TRUE, FALSE));
$smarty->assign('input_mode_list', $this->CreateInputDropdown($id, 'instance_mode', array_flip($modes_list), -1, $this->GetMode()));
$smarty->assign('input_hide_alias', $this->CreateInputCheckbox($id, 'hide_alias', TRUE, FALSE));
$smarty->assign('input_hide_slug', $this->CreateInputCheckbox($id, 'hide_slug', TRUE, FALSE));
$smarty->assign('input_hide_time_control', $this->CreateInputCheckbox($id, 'hide_time_control', TRUE, FALSE));
$smarty->assign('input_auto_upgrade', $this->CreateInputCheckbox($id, 'auto_upgrade', TRUE, TRUE));

$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));

echo $this->ProcessTemplate('copymodule.tpl');

?>