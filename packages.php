<?php
include 'config.php';
$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*.pkg')));
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Installed Packages</title>
<link rel="shortcut icon" href="sys.pkg.png?rev=<?=time();?>" type="image/x-icon">
<?php include 'appstyle.php'; ?>
<script src="jquery.js?rev=<?=time();?>"></script>
<script src="base.js?rev=<?=time();?>"></script>
<script src="wfunc.js?rev=<?=time();?>"></script>
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
<input id='getButton' onmouseover="playAudio(soundPlayer, 'take.flac');" name="<?=file_get_contents('system.info');?>" type="button" class="actionButtonGreen" onclick="get(enterKey.options[enterKey.selectedIndex].value,enterPkg.value,enterRepo.value,enterUser.value);" value=">">
<input type="button" onmouseover="playAudio(soundPlayer, 'take.flac');" class="actionButtonRed" onclick="window.location.href='?seq=yes';" value="!">
<?php } ?>
</p>
</div>
<div class='panel'>
<p align="center">
<?php
foreach ($list as $key=>$value) {
    $packageID = basename($value, '.pkg');
    $fileTitle = 'Remove: '.$packageID;
    $fileIcon = 'sys.pkg.png';
    $fileLink = "get('d', '".$packageID."', 'from', 'here');";
?>
<img class='hover' style="height:15%;position:relative;" onmouseover="playAudio(soundPlayer, 'scroll.flac');" title="<?=$fileTitle;?>" src="<?=$fileIcon;?>?rev=<?=time();?>" onclick="<?=$fileLink;?>">
<?php } ?>
<img class='hover' style="height:15%;position:relative;" onmouseover="playAudio(soundPlayer, 'alert.flac');" title="Restart" src="sys.home.png?rev=<?=time();?>" onclick="window.location.href = 'index.php';">
</p>
</div>
<audio id="soundPlayer" <?php if (!$sounds) { ?>muted="muted"<?php } ?>>
</body>
</html>
