{*$backlink*}
{* <h3>{$header}</h3> *}
{$startform}
  <div class="pageoverflow">
    <p class="pageinput">
      <input name="{$actionid}apply" class="lise_apply" value="{lang('apply')}" type="submit" />
    </p>
  </div>

  {if isset($itemObject|default:[])}
    {foreach from=$itemObject->fielddefs item='fielddef'}
      {if $fielddef->type === 'Tabs'}{continue}{/if}
      {$fielddef->RenderInput($actionid, $returnid)}
    {/foreach}
  {/if}

  <div class="pageoverflow">
    <p class="pagetext">&nbsp;</p>
    <p class="pageinput">
      <input name="{$actionid}apply" class="lise_apply" value="{lang('apply')}" type="submit" />
    </p>
  </div>
{$endform}
{*
<!-- end content //-->
<script type="text/javascript">
var action_id = '{$actionid}';
var item_id = '{$itemObject->item_id|default:-1}';
var ajax_url1 = '{$ajax_get_url}';
var ajax_url2 = '{$ajax_get_alias}';
var manually_changed1 = item_id;
var manually_changed2 = item_id;
var finished_setup = 0;
var ajax_xhr1 = 0;
var ajax_xhr2 = 0;
var ajax_timeout1;
var ajax_timeout2;
ajax_url1 = ajax_url1.replace(/amp;/g,'') + '&suppressoutput=1';
ajax_url2 = ajax_url2.replace(/amp;/g,'') + '&suppressoutput=1';

function ajax_geturl() {
  var form = $('#lise_edititem form');
  var vtitle = $('#{$actionid}title').val();
  ajax_xhr = $.post(ajax_url1, { title: vtitle, itemid: item_id }, function(retdata){
    $('#{$actionid}url').val(retdata);
    ajax_xhr1 = 0;
});
}

function ajax_get_alias() {
  var form = $('#lise_edititem form');
  var vtitle = $('#{$actionid}title').val();
  ajax_xhr = $.post(ajax_url2, { title: vtitle }, function(retdata){
    $('#{$actionid}alias').val(retdata);
    ajax_xhr2 = 0;
});
}

function on_change() {
  if( manually_changed1 < 1 && finished_setup == 1) {
    // ajax function to get a unique url given a title.
    if( ajax_timeout1 != undefined ) clearTimeout(ajax_timeout1);
    if( ajax_xhr1 = 0 ) xhr.abort();
    ajax_timeout1 = setTimeout(ajax_geturl,500);
}
  if( manually_changed2 < 1 && finished_setup == 1) {
    // ajax function to get a unique alias given a title.
    if( ajax_timeout2 != undefined ) clearTimeout(ajax_timeout2);
    if( ajax_xhr2 = 0 ) xhr.abort();
    ajax_timeout1 = setTimeout(ajax_get_alias,500);
}
}

jQuery(document).ready(function() {

  $('{$actionid}url').keyup(function() {
    var val = $(this).val();
    manually_changed1 = 0
    if( val != '' ) manually_changed1 = 1;
});

  $('{$actionid}alias').keyup(function() {
    var val = $(this).val();
    manually_changed1 = 0
    if( val != '' ) manually_changed2 = 1;
});

  $('form').ajaxStart(function() {
    $('*').css('cursor','progress');
});

  $('form').ajaxStop(function() {
    $('*').css('cursor','auto');
});

  $('#{$actionid}title').keyup(function() {
    on_change();
});

  finished_setup = 1;


  jQuery('[name=m1_apply]').live('click', function() {
    if (typeof tinyMCE != 'undefined') {
      tinyMCE.triggerSave();
  }

  var data = jQuery('form').find('input:not([type=submit]), select, textarea').serializeArray();

  data.push({
      'name': 'm1_ajax',
      'value': 1
  });
  data.push({
      'name': 'm1_apply',
      'value': 1
  });
  data.push({
      'name': 'showtemplate',
      'value': 'false'
  });

  var url = jQuery('form').attr('action');

  jQuery.post(url, data, function(resultdata, text) {
      var resp = jQuery(resultdata).find('Response').text();
      var details = jQuery(resultdata).find('Details').text();
      var htmlShow = '';
      if (resp === 'Success' && details !== '') {
        htmlShow = '<div class="pagemcontainer"><p class="pagemessage">' + details + '<\/p><\/div>';
    }
    else {
        htmlShow = '<div class="pageerrorcontainer"><ul class="pageerror">';
        htmlShow += details;
        htmlShow += '<\/ul><\/div>';
    }
    jQuery('#edititem_result').html(htmlShow);
    window.setTimeout(function(){
     $('.pagemcontainer').hide();
 }, 9000)
}, 'xml');
  return false;
});
});
</script>
      *}