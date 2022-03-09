<?php
include 'config.php';
$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*.app')));
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>All Applications</title>
<link rel="shortcut icon" href="sys.apps.png?rev=<?=time();?>" type="image/x-icon">
<?php include 'appstyle.php'; ?>
<script src="jquery.js?rev=<?=time();?>"></script>
<script src="base.js?rev=<?=time();?>"></script>
<script>
window.onload = function() {
    document.getElementById('enterSeq').focus();
}
</script>
</head>
<body>
<div class='top'>
<p align="center">
<?php if ($_REQUEST['seq'] == 'yes') { ?>
<input id="enterSeq" type="text" style="width:72%;" placeholder="List the GET command sequences" value="" onkeydown="if (event.keyCode == 13) {
    seq(enterSeq.value);
    window.location.href = 'index.php';
}">
<input type="button" class="actionButtonGreen" onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" onclick="seq(enterSeq.value); window.location.href = 'index.php';" value=">">
<input type="button" class="actionButtonRed" onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" onclick="window.location.href='?seq=no';" value="!">
<?php } else { ?>
<select id="enterKey" onchange="
var curSys = getButton.name;
var keyVal = enterKey.options[enterKey.selectedIndex].value;
if (keyVal == 'i') {
    enterPkg.value = 'from';
    enterRepo.value = '';
    enterUser.value = '';
} else if (keyVal == 'r') {
    enterPkg.value = curSys;
    enterRepo.value = '';
    enterUser.value = '';
} else if (keyVal == 'd') {
    enterPkg.value = '';
    enterRepo.value = 'from';
    enterUser.value = 'here';
}">
<option value='i'>Install</option>
<option value='r'>Replace</option>
<option value='d'>Remove</option>
</select>
<input type="text" id="enterPkg" style="width:20%;" placeholder="Package" value="from">
<input type="text" id="enterRepo" style="width:20%;" placeholder="Repo" value="">
<input type="text" id="enterUser" style="width:20%;" placeholder="User" value="">
<input id='getButton' name="<?=file_get_contents('system.info');?>" type="button" onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" class="actionButtonGreen" onclick="get(enterKey.options[enterKey.selectedIndex].value,enterPkg.value,enterRepo.value,enterUser.value); window.location.href = 'index.php';" value=">">
<input type="button" class="actionButtonRed" onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" onclick="window.location.href='?seq=yes';" value="!">
<?php } ?>
</p>
</div>
<div class='panel'>
<p align="center">
<?php
foreach ($list as $key=>$value) {
    $fileContent = file_get_contents($value);
    $fileExp = explode('=||=', $fileContent);
    $fileTitle = $fileExp[0];
    $fileIcon = (file_exists($fileExp[1])) ? $fileExp[1] : 'sys.app.png';
    $fileLink = $fileExp[2];
?>
<img class='hover' style="height:15%;position:relative;" title="<?=$fileTitle;?>" onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" src="<?=$fileIcon;?>?rev=<?=time();?>" onclick="<?=$fileLink;?>">
<?php } ?>
<img class='hover' onmouseover="playAudio(soundPlayer, 'default.flac?rev=<?=time();?>');" style="height:15%;position:relative;" title="Restart" src="sys.home.png?rev=<?=time();?>" onclick="window.location.href = 'index.php';">
</p>
</div>
<audio id="soundPlayer" <?php if (!$sounds) { ?>muted="muted"<?php } ?>>
</body>
</html>
