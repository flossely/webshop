<?php
include 'config.php';
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Webshop</title>
<link rel="shortcut icon" href="favicon.png?rev=<?=time();?>" type="image/x-icon">
<?php include 'appstyle.php'; ?>
<script src="jquery.js?rev=<?=time();?>"></script>
<script src="base.js?rev=<?=time();?>"></script>
<?php include 'appscript.php'; ?>
<script>
window.onload = function() {
    playAudio(soundPlayer, 'new.flac');
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
}">
<input type="button" class="actionButtonGreen" onmouseover="playAudio(soundPlayer, 'take.flac');" onclick="seq(enterSeq.value);" value=">">
<input type="button" class="actionButtonRed" onmouseover="playAudio(soundPlayer, 'take.flac');" onclick="window.location.href='?seq=no';" value="!">
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
<input id='getButton' name="<?=file_get_contents('system.info');?>" type="button" class="actionButtonGreen" onmouseover="playAudio(soundPlayer, 'take.flac');" onclick="get(enterKey.options[enterKey.selectedIndex].value,enterPkg.value,enterRepo.value,enterUser.value);" value=">">
<input type="button" class="actionButtonRed" onmouseover="playAudio(soundPlayer, 'take.flac');" onclick="window.location.href='?seq=yes';" value="!">
<?php } ?>
</p>
</div>
<div class='panel'>
<p align="center">
<img style="height:16%;position:relative;" src="favicon.png?rev=<?=time();?>">
</p>
<h1 align="center">Welcome to Webshop</h1>
<p align="center">
<input type='button' class='actionLineButtonGreen' onmouseover="playAudio(soundPlayer, 'alert.flac');" value='Proceed' onclick="window.location.href = 'apps.php';">
<input type='button' class='actionLineButtonRed' onmouseover="playAudio(soundPlayer, 'alert.flac');" value='Update' onclick="get('i','from','webshop','flossely');">
</p>
<p align="center">
<img class='hover' onmouseover="playAudio(soundPlayer, 'take.flac');" style="height:15%;position:relative;" title="All Applications" src="sys.apps.png?rev=<?=time();?>" onclick="window.location.href = 'apps.php';">
<img class='hover' onmouseover="playAudio(soundPlayer, 'take.flac');" style="height:15%;position:relative;" title="Installed Packages" src="sys.pkg.png?rev=<?=time();?>" onclick="window.location.href = 'packages.php';">
<img class='hover' onmouseover="playAudio(soundPlayer, 'take.flac');" style="height:15%;position:relative;" title="Update Webshop" src="sys.upd.png?rev=<?=time();?>" onclick="get('i','from','webshop','flossely');">
<img class='hover' onmouseover="playAudio(soundPlayer, 'take.flac');" style="height:15%;position:relative;" title="Exit" src="sys.exit.png?rev=<?=time();?>" onclick="window.location.href = '../';">
</p>
</div>
<audio id="soundPlayer" <?php if (!$sounds) { ?>muted="muted"<?php } ?>>
</body>
</html>
