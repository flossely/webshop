<?php
$background = file_get_contents('background');
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
<input type="button" class="actionButtonGreen" onclick="seq(enterSeq.value);" value=">">
<input type="button" class="actionButtonRed" onclick="window.location.href='?seq=no';" value="!">
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
<input id='getButton' name="<?=file_get_contents('system.info');?>" type="button" class="actionButtonGreen" onclick="get(enterKey.options[enterKey.selectedIndex].value,enterPkg.value,enterRepo.value,enterUser.value);" value=">">
<input type="button" class="actionButtonRed" onclick="window.location.href='?seq=yes';" value="!">
<?php } ?>
</p>
</div>
<div class='panel'>
<p align="center">
<img style="height:16%;position:relative;" src="favicon.png?rev=<?=time();?>">
</p>
<h1 align="center">Welcome to Webshop</h1>
<p align="center">
<input type='button' value='PROCEED' onclick="window.location.href = 'apps.php';">
</p>
</div>
</body>
</html>
