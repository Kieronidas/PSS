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
class lisefd_SelectFile extends LISEFielddefBase
{
	public function __construct($db_info, $caller_object) 
	{	
		parent::__construct($db_info, $caller_object);
		
		$this->SetFriendlyType($this->ModLang('fielddef_'.$this->GetType()));
	}
	
	public function GetFiles()
	{
		$config = cmsms()->GetConfig();
		
		$path = cms_join_path($config['uploads_path'], $this->GetOptionValue('dir'));

		if (!is_dir($path)) {
			@mkdir($path);
		}

		$allowed = ($this->GetOptionValue('allowed') != '' ? explode(',',$this->GetOptionValue('allowed')) : array(
			'jpg',
			'gif',
			'png'
		));

		$invalid = array('.','..');
		$exclude_prefix = explode(',', $this->GetOptionValue('exclude_prefix'));
		
		$images = array();
		if ($handle = opendir($path)) {
			while (false !== ($file = readdir($handle))) {
			
				if(in_array($file, $invalid)) continue;
				
				foreach($exclude_prefix as $one) {
				
					if(startswith($file, $one) && !empty($one)) continue 2;
				}
				
				foreach($allowed as $ext) {
				
					if(endswith($file, $ext)) {
					
						$images[$file] = $file;
					}
				
				}
			}

			closedir($handle);
		}

		asort($images);
		$images = array_merge(array(''=>$this->ModLang('select_one')), $images);
			
		return $images;
	}
	
} // end of class
?>