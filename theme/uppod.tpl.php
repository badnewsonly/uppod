<?php
/**
 * @file
 * Display the Uppod Player.
 *
 * Variables available:
 * - $html_id: Unique id generated for each video.
 * - $width: Width of the video player.
 * - $height: Height of the video player.
 * - $file_url: The url of the file to be played.
 * - $uppod_inline_js_code: JSON data with configuration settings for the video player.
 * - $poster: URL to an image to be used for the poster (ie. preview image) for this video.
 *
 * @see template_preprocess_uppod()
 */
?>
<div class="uppod-video">
  <video id="<?php print $html_id ?>" width="<?php print $width ?>" height="<?php print $height ?>" controls="controls"
         preload="none"<?php if (isset($poster)) : ?> poster="<?php print $poster ?>"<?php endif ?>>
    <source
      src="<?php print $file_url ?>"<?php if (isset($file_mime)): ?> type="<?php print $file_mime ?>"<?php endif ?> />
  </video>
</div>

<script type="text/javascript">
  var config = Drupal.settings.uppod['<?php print $html_id ?>'];
  var flashvars = {m: "player", file: config.file, st: '/sites/all/libraries/uppod/st/zvezda.skin', poster: "<?php print $poster; ?>"};

  var params = {bgcolor: "#000", wmode: "window", allowFullScreen: "true", allowScriptAccess: "always"};
  swfobject.embedSWF(config.flashplayer, "<?php print $html_id ?>", config.width, config.height, "10.0.0.0", false, flashvars, params);
</script>
