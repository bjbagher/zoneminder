//
// Import constants
//

const COMPACT_MONTAGE = <?php echo ZM_WEB_COMPACT_MONTAGE ?>;
const POPUP_ON_ALARM = <?php echo ZM_WEB_POPUP_ON_ALARM ?>;

const statusRefreshTimeout = <?php echo 1000*ZM_WEB_REFRESH_STATUS ?>;

const canStreamNative = <?php echo canStreamNative()?'true':'false' ?>;

var monitorData = new Array();

<?php
global $monitors;
foreach ( $monitors as $monitor ) {
?>
monitorData[monitorData.length] = {
  'id': <?php echo $monitor->Id() ?>,
  'connKey': '<?php echo $monitor->connKey() ?>',
  'width': <?php echo $monitor->ViewWidth() ?>,
  'height':<?php echo $monitor->ViewHeight() ?>,
  'janusEnabled':<?php echo $monitor->JanusEnabled() ?>,
  'url': '<?php echo $monitor->UrlToIndex( ZM_MIN_STREAMING_PORT ? ($monitor->Id() + ZM_MIN_STREAMING_PORT) : '') ?>',
  'url_to_zms': '<?php echo $monitor->UrlToZMS( ZM_MIN_STREAMING_PORT ? ($monitor->Id() + ZM_MIN_STREAMING_PORT) : '') ?>',
  'onclick': function(){window.location.assign( '?view=watch&mid=<?php echo $monitor->Id() ?>' );},
  'type': '<?php echo $monitor->Type() ?>',
  'refresh': '<?php echo $monitor->Refresh() ?>'
};
<?php
} // end foreach monitor
?>
layouts = new Array();
layouts[0] = {}; // reserved, should hold which fields to clear when transitioning
<?php
global $layouts;
foreach ( $layouts as $layout ) {
?>
layouts[<?php echo $layout->Id() ?>] = {"Name":"<?php echo $layout->Name()?>","Positions":<?php echo json_decode($layout->Positions())?$layout->Positions():'{}' ?>};
<?php
} // end foreach layout
global $FreeFormLayoutId;
echo 'freeform_layout_id='.$FreeFormLayoutId.';'
?>
