<?php
defined('_JEXEC') or die;

JHtml::_('jquery.framework');

$document = JFactory::getDocument();
// Check if UIkit is already loaded and load it from assets if not
$document->addScript( Juri::base() . 'modules/mod_nx-videostage/tmpl/js/checkforuikit.js');

$document->addStyleSheet( Juri::base() . 'modules/mod_nx-videostage/tmpl/css/base.css' );

$document->addScript( Juri::base() . 'modules/mod_nx-videostage/tmpl/js/player.js');

if($pl['configuration']['effect'] == 'ambilight'):
  $document->addScript( Juri::base() . 'modules/mod_nx-videostage/tmpl/js/ambilight.js');
endif;
if($pl['data']['poster'] !== '')
{
  $poster = 'poster="' . Juri::base() . $pl['data']['poster'] . '"';
}
$htmlblock = $pl['configuration']['htmlblock'];
$txtcls = ($pl['configuration']['htmlblockcls'] != 'none') ? $pl['configuration']['htmlblockcls'] : '';
$gridmatch = '';
$txtpos = '';
$vidpos = ' uk-flex-' . $pl['configuration']['vvalign'];
$attr = ' data-uk-grid-match="{target:\'.equal-height\'}"';
$widthclass = " uk-child-width-1-1";
$dropshadow = ($pl['configuration']['effect'] == 'dropshadow') ? 'uk-box-shadow-bottom uk-box-shadow-small' : ''; 

if($htmlblock)
{
  $attr .= 'uk-grid';
  switch($pl['configuration']['htmlblockpos'])
  {
    case 'top':
    case 'left':
      // left
      $txtpos = ' uk-flex-first';
      break;
    case 'right':
    case 'bottom':
      // right
      $txtpos = ' uk-flex-last';
      break;
  }

  switch($pl['configuration']['htmlblockpos'])
  {
    case 'top':
      // top
      $widthclass = ' uk-child-width-1-1';
      break;
    case 'bottom':
      // bottom
      $widthclass = ' uk-child-width-1-1';
      break;
    case 'left':
    case 'right':
    default:
      $widthclass = ' uk-child-width-1-2@m';
  }

  if (in_array($pl['configuration']['htmlblockpos'], array('left','right'))){ 
    $gridmatch = 'uk-grid-item-match';
  }

}


?>

<script type="text/javascript">
  jQuery(document).ready(function($){
    // UIkit Check
    var path = "<?php echo Juri::base() . 'modules/mod_nx-videostage/tmpl/assets/uikit3b39/'; ?>";
    var config = <?php echo json_encode($pl['configuration']); ?>;
    var target = "<?php echo $pl['data']['id']; ?>";
    var canvas = "<?php echo 'canvas_' . $pl['data']['id']; ?>";
    var debug  = <?php echo $debug; ?>;
    checkforuikit(path,debug,$);
    setParameters(target,config,debug,$);
    <?php if($pl['configuration']['effect'] == 'ambilight'):?>
    enableAmbilight(target,canvas,config,debug,$, function($){
      
    });
    <?php endif;?>
    $("#stage_<?php echo $pl['data']['id']; ?>").delay(300).slideDown('slow');
  });
</script>

<?php require( __DIR__ . '/css/instance.css.php'); ?>

<div class="nx-productions">
<?php 
  // Start Debug Section
  if($debug):
      var_dump($pl);
      echo "<br>";
      echo "<hr>";
      echo "<br>";
      var_dump($playerparametes);
      echo "<hr>";
      echo "<br>";
      echo '<h3>UIkit loading Info</h3><div>';
      echo '<div class="log"></div>';
      echo '</div>';
  endif;
  // End Debug Section

  // Module Rendering
?>

  <div class="nx-videostage-container uk-width-expand" id="stage_<?php echo $pl['data']['id']; ?>" style="display:none;">
    <div <?php echo 'class="' . $widthclass . '" ' . $attr;?>>
      <div class="uk-flex<?php echo $vidpos; ?>">
        <div class="nx-videostage">
          <div class="nx-h5player <?php echo $dropshadow ?>" id="player_<?php echo $pl['data']['id']; ?>">
            <video id="<?php echo $pl['data']['id']; ?>" src="<?php echo $pl['data']['url']; ?>" <?php echo $poster . $playerparametes; ?> playsinline >
            <!-- This plays the Video -->      
            </video>
            <?php if($pl['configuration']['effect'] == 'ambilight'):?>  
            <canvas id="<?php echo 'canvas_' . $pl['data']['id']; ?>">
            <!-- This is the Ambilight Effect -->   
            </canvas>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php if($htmlblock): ?>
      <div class="uk-flex <?php echo $txtpos; ?>">
        <div class="uk-card">
          <div class="uk-card-body <?php echo $txtcls; ?>">
              <?php echo $pl['additions']['html']; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
    </div>
  </div>
</div>
