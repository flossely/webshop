<?php
include 'config.php';
$dir = '.';
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Webshop Settings</title>
<link rel="shortcut icon" href="sys.settings.png?rev=<?=time();?>" type="image/x-icon">
<?php include 'appstyle.php'; ?>
<script src="jquery.js?rev=<?=time();?>"></script>
<script src="base.js?rev=<?=time();?>"></script>
</head>
<body>
<div class='top'>
<p align="center">
Webshop Settings 
<input type="button" class="actionButtonGreen" onmouseover="playAudio(soundPlayer, 'take.flac');" onclick="set('background', setBackField.value);" value=">">
<input type="button" class="actionButtonRed" onmouseover="playAudio(soundPlayer, 'take.flac');" onclick="window.location.href = 'index.php';" value="X">
</p>
</div>
<div class='panel'>
<p align="center">
<input type='button' id="muteSound" onmouseover="playAudio(soundPlayer, 'take.flac');" name="<?=$sounds;?>" value="<?php if ($sounds) { ?>Mute<?php } else { ?>Unmute<?php } ?>" onclick="mute(muteSound.name);">
</p>
<p align="center">
<label>Background image: </label><br>
<textarea id='setBackField' style="width:82%;height:32%;" placeholder="Filename or URL" onkeydown="if (event.keyCode == 13) {
    set('background', setBackField.value);
}"><?=$background;?></textarea>
</p>
</div>
<audio id="soundPlayer" <?php if (!$sounds) { ?>muted="muted"<?php } ?>>
</body>
</html>
