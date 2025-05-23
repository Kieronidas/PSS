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

if (!$this->CheckPermission($this->_GetModuleAlias() . '_modify_category')) return;

#---------------------
# Check params
#---------------------

if (isset($params['cancel'])) {

    $params = array('active_tab' => 'categorytab');
    $this->Redirect($id, 'defaultadmin', $returnid, $params);
}

#---------------------
# Init params
#---------------------

$category_id      			= lise_utils::init_var('category_id', $params, -1);
$name       			 	= lise_utils::init_var('name', $params, '');
$alias		 			 	= lise_utils::init_var('alias', $params, '');
$description				= lise_utils::init_var('description', $params, '');
$parent_id 				 	= lise_utils::init_var('parent_id', $params, -1);
$active      			 	= 1;

#---------------------
# Init Item
#---------------------

$obj = $this->LoadCategoryByIdentifier('category_id', $category_id);

#---------------------
# Submit
#---------------------

if (isset($params['submit']) || isset($params['apply']) || isset($params['save_create'])) {

	$errors = array();

    // check category name
    if ($name == '') {
        $errors[] = $this->ModLang('category_name_empty');
    }

    // check alias
/*    if (!lise_utils::is_valid_alias($alias) && !empty($alias)) {
        $errors[] = $this->ModLang('alias_invalid');
    }*/
	
	// Check for duplicate
	$parms = array();
	$query = 'SELECT * FROM ' . cms_db_prefix() . 'module_' . $this->_GetModuleAlias() . '_category WHERE category_alias = ?';
	$parms[] = $alias;

	if($category_id > 0){
		$query .= ' AND category_id != ?';
		$parms[] = $category_id;
	}
	
	$exists = $db->GetOne($query, $parms);

    if ($exists) {
        $errors[] = $this->ModLang('category_alias_exists');
    }	

	// title and required fields have values, let's continue
	if (empty($errors)) {
	
		$obj->name        	= $name;
		$obj->alias		 	= $alias;
		$obj->description	= $description;
		$obj->parent_id 	= $parent_id;		
		$obj->active       	= isset($params['active']) ? 1 : 0;
		
		$this->SaveCategory($obj);
		
		// if apply and ajax           
		if (isset($params['apply']) && isset($params['ajax'])) {
			$response = '<EditItem>';
			$response .= '<Response>Success</Response>';
			$response .= '<Details><![CDATA[' . $this->ModLang('changessaved') . ']]></Details>';               
			$response .= '</EditItem>';
			echo $response;
			return;
		} 
		
		// if save and create new
		if (isset($params['save_create']) ) {
			$this->Redirect($id, 'admin_editcategory', $returnid, array(
				'message' => 'savecreate_message'
			));
		}  		    

		// show saved message
		if (isset($params['submit'])) {
			$this->Redirect($id, 'defaultadmin', $returnid, array(
				'active_tab' => 'categorytab',
				'message' => 'changessaved'
			));
			
		} else {
			echo $this->ShowMessage($this->ModLang('changessaved'));
		}
		
	} // end error check
	
} // end submit or apply
elseif($obj->category_id > 0) {

	$category_id 	= $obj->category_id;	
	$name 			= $obj->name;
	$alias		  	= $obj->alias;
	$description	= $obj->description;
	$parent_id 		= $obj->parent_id;
	$active       	= $obj->active;
}

#---------------------
# Message control
#---------------------

// display errors if there are any
if (!empty($errors)) {
    if (isset($params['apply']) && isset($params['ajax'])) {
        $response = '<EditItem>';
        $response .= '<Response>Error</Response>';
        $response .= '<Details><![CDATA[';
        foreach ($errors as $error) {
            $response .= '<li>' . $error . '</li>';
        }
        $response .= ']]></Details>';
        $response .= '</EditItem>';
        echo $response;
        return;
    } else {
        echo $this->ShowErrors($errors);
    }
}

if(isset($params['message']) && empty($errors)) 
    echo $this->ShowMessage($this->ModLang('changessaved_create'));

#---------------------
# Smarty processing
#---------------------

$smarty->assign('categoryObject', $obj);

$smarty->assign('backlink', $this->CreateBackLink('categorytab'));
$smarty->assign('title',     (isset($category_id) ? $this->ModLang('edit_category') : $this->ModLang('add', $this->ModLang('category'))));

$smarty->assign('startform', $this->CreateFormStart($id, 'admin_editcategory', $returnid, 'post', 'multipart/form-data', false, '', $params));
$smarty->assign('endform', $this->CreateFormEnd());

$smarty->assign('input_category',  $this->CreateInputText($id, 'name', $name, 20));
$smarty->assign('input_alias', $this->CreateInputText($id, 'alias', $alias, 20, 255));
$smarty->assign('input_category_description', $this->CreateTextArea(true, $id, $description, 'description', '', '', '', '', '80', '3'));
$smarty->assign('input_active', $this->CreateInputcheckbox($id, 'active', 1, $active));

$smarty->assign('input_parent', $this->CreateInputDropdown($id, 'parent_id', LISECategoryOperations::GetHierarchyList($this, true, $category_id), -1, $parent_id));
/*
$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$smarty->assign('apply', $this->CreateInputSubmit($id, 'apply', lang('apply')));
$smarty->assign('save_create', $this->CreateInputSubmit($id, 'save_create', $this->ModLang('save_create')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));
*/
echo $this->ModProcessTemplate('editcategory.tpl');

?>