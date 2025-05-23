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

/**
* @name Tags
* @author Fernando Morgado aka Jo Morg
* @package CMSMadeSimple
* @subpackage LISE
*/
class lisefd_Tags extends LISEFielddefBase
{
  private $mod_name;
  private $action_id;
  private $action_name;
  private $tags;
  
	public function __construct($db_info, $caller_object) 
	{	
		parent::__construct($db_info, $caller_object);
		
		$this->SetFriendlyType($this->ModLang('fielddef_' . $this->GetType()));
	}
	
	public function Validate(&$errors): void
	{
		if (strlen($this->GetValue("string")) > $this->GetOptionValue('max_length', 255) && $this->GetOptionValue('max_length')) {
		
			$errors[] = $this->ModLang('too_long') . ' (' . $this->GetName() . ')';
		}		
	
		parent::Validate($errors);
	}
  
  public function FrontEndRender( $params = array() )
  {
    if( empty($this->view) )
    {
      $smarty = cmsms()->GetSmarty();
      $smarty->assign('name', $this->name);
      $smarty->assign('value', $this->value);
      $smarty->assign('type', $this->type);
      $smarty->assign('alias', $this->alias);
      $smarty->assign('params', $params);
      $smarty->assign('tags', $this->tags);
      
      $this->view = $smarty->fetch( 'string:' . $this->GetTemplate() );
    }

    return $this->view;
  }
  
  public function SetTagsParams($mod = NULL, $id = NULL, $action = NULL, $returnid = NULL, $params = array() )
  {
    if( !is_object($mod) )      return;
    if( !isset($params) )       return;
    if( !isset($action) )       return;
    
    $t = explode(',', $this->value);
    foreach($t as $one)
    {
      $params['tag'] = urlencode($one);    
      $this->tags[$one] = $mod->CreatePrettyLink($id, $action, $returnid, '', $params, '', TRUE);
    }
  
  }
	
} // end of class
?>