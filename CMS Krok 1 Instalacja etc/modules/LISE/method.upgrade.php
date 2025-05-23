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

/*******/
# so far this is valid only for beta testing #
/******/

switch ($oldversion) 
{
  case '0.1.b.2':
  case '0.1.b.3':
  
    # we now support InnoDB instead of MyISAM
    $prefix = cms_db_prefix() . 'module_' . $this->GetName() . '_';
    
    $table_list = array(
                          'instances',
                          'fielddefs'
                        );
                        
    foreach($table_list as $table)
    {
      $tablename = $prefix . $table;
      $query = 'ALTER TABLE ' . $tablename . ' ENGINE=InnoDB;';
      cmsms()->GetDb()->Execute($query);
    }
    
    # the plugin moved to another class
    $this->RemoveSmartyPlugin('LISELoader'); #<- there was a typo here before?
    $this->RegisterSmartyPlugin( 'LISELoader', 'function', array('LISELoader', 'loader') );
  
  case '0.1.b.4':
      # the plugin moved to another class
    $this->RemoveSmartyPlugin('LISELoader');
    $this->RegisterSmartyPlugin( 'LISELoader', 'function', array('LISELoader', 'loader') );

  case '1.3':
  case '1.3.1':
  case '1.4':
  case '1.4.1':
    
    $prefix = cms_db_prefix() . 'module_' . strtolower( $this->GetName() ) . '_';
    $tablename = $prefix . 'instances';
    $query = 'ALTER TABLE ' . $tablename .
            ' ADD module_mode INT';
    
    // prevent fatal in case of existing betas with correct tables
    try
    {
      $r = cmsms()->GetDb()->Execute($query);
      if(!$r){ throw new \Exception( $db->ErrorMsg() ); }
    }
    catch(\Exception $e)
    {
      \audit( 0, $this->GetName(), $e->getMessage() );
    }
    
    # remove .moduledata if it exists
    \LISE\ephemeral::remove_md();
}

LISEFielddefOperations::ScanModules();

if( $this->GetPreference('allow_autoupdate', 0) )
{
  $modules = $this->ListModules();
  
  $modops = ModuleOperations::get_instance();
  $installed = $modops->GetInstalledModules();

  foreach($modules as $module)
  {
    if( in_array($module->module_name, $installed) )
    {
        $instance = $modops->get_module_instance($module->module_name, '', TRUE);
        if( $instance->GetPreference('auto_upgrade') )
        {
          lise_utils::queue_for_upgrade($module->module_name);
        }
    }
  }

}
 

?>