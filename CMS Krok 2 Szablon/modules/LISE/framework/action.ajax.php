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
$out = [
  'msg'     => 'ok',
  'error'   => 0,
  'content' => '',
  'type' => 'txt',
  'params'  => $params
];

if( !defined('CMS_VERSION') )
{
  header('HTTP/1.1 403 Forbidden!');
  header('Content-Type: application/json; charset=UTF-8');
  $out['msg'] = 'Forbidden';
  $out['error'] = 80085;
  die( json_encode($out) );
}

$allowed = [
  'SaveItemOrder',
  'SaveFieldDefOrder',
  'ModGetTemplateFromFile',
  'beItemsList'
];

lise_utils::log(print_r($params, 1));

if( isset($params['usr_function']) && in_array($params['usr_function'], $allowed, TRUE) && $this->CheckPermission($this->_GetModuleAlias() . '_modify_item') )
{
  # deprecated API
  
  if( !defined('CMS_VERSION') ) { exit; }
  $usr_params = [];
  
  if(isset($params['params']))
  {
    if(is_array($params['params']))
    {
      $usr_params = [$params['params']];
    }
    else
    {
      $usr_params = explode(',', $params['params']);
    }
  }
  
  $handlers = ob_list_handlers();
  for($cnt = 0; $cnt < sizeof($handlers); $cnt++) { ob_end_clean(); }
  try
  {
    $out = call_user_func_array([$this, $params['usr_function']], $usr_params);
  }
  catch(\Exception $e)
  {
    $out = $e->getMessage();
  }
  
  die($out);
}

# NEW API

if( isset($params['fnc']) )
{
  $fnc = trim($params['fnc']);
  $prms = [];
  
  if( isset($params['params']) )
  {
    if( is_array($params['params']) )
    {
      $prms = $params['params'];
    }
    else
    {
      $prms = explode(',', $params['params']);
    }
  }

  array_unshift($prms, $this->GetName());
  
  if( cmsms()->is_frontend_request() )
  {
    # frontend api
    $callable = '\\LISE\\ajax_handler::fe_' . $fnc;
  }
  else
  {
    # backend api
    if( $this->CheckPermission('Modify Site Preferences') || $this->CheckPermission($this->_GetModuleAlias() . '_modify_item') )
    {
      $callable = '\\LISE\\ajax_handler::be_' . $fnc;
    }
  }
  
  if(!is_callable($callable, FALSE, $callable_name))
  {
    header('HTTP/1.1 500 Request function error!');
    header('Content-Type: application/json; charset=UTF-8');
    $out['msg']   = $fnc . ' not valid api call!';
    $out['error'] = 80085;
    die(json_encode($out));
  }
  
  try
  {
    $out['content'] = @call_user_func_array($callable, $prms);
  }
  catch(\ArgumentCountError $e)
  {
    $out['error']   = $e->getCode();
    $out['msg']     = $e->getMessage();
    $out['content'] = 'Oops!';
  }
  catch(\Exception $e)
  {
    $out['error']   = $e->getCode();
    $out['msg']     = $e->getMessage();
    $out['content'] = 'Oops!';
  }
  
  header('Content-Type: application/json; charset=UTF-8');
  die(json_encode($out));
}

header('HTTP/1.1 500 Request function error!');
header('Content-Type: application/json; charset=UTF-8');
$out['msg']   = 'wrong set of params';
$out['error'] = 80085;

die(json_encode($out));
?>