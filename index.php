<?php
$background = file_get_contents('background');
$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*.{app,pkg}', GLOB_BRACE)));
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Webshop</title>
<link rel="shortcut icon" href="favicon.png?rev=<?=time();?>" type="image/x-icon">
<style>
@font-face {
    font-family: "ubuntu";
    src: url("ubuntu.ttf");
}
body {
    background-color: #e4e4e4;
    background-image: url(<?=$background;?>);
    background-size: auto 100vh;
    background-repeat: no-repeat;
    color: #000;
    font-family: "ubuntu";
    font-size: 14pt;
}
input, select {
    background-color: #fff;
    color: #000;
    border: none;
    border-radius: 3px;
    font-family: "ubuntu";
    font-size: 14pt;
}
.top {
    background-color: #e4e4e4;
    border: none;
    border-radius: 3px;
    opacity: 0.75;
    position: absolute;
    width: 92%;
    height: 13%;
    top: 4%;
    left: 4%;
}
.panel {
    background-color: #e4e4e4;
    border: none;
    border-radius: 3px;
    opacity: 0.75;
    position: absolute;
    width: 92%;
    height: 77%;
    top: 17%;
    left: 4%;
    overflow-y: scroll;
}
.hover:hover {
    opacity: 0.7;
    position: relative;
}
.actionButtonGreen {
    background-color: #009f4b;
    color: #fff;
    font-size: 14pt;
    font-weight: bold;
    position: relative;
}
.actionButtonGreen:hover {
    opacity: 0.7;
}
.actionButtonRed {
    background-color: #d83d48;
    color: #fff;
    font-size: 14pt;
    width: 27px;
    font-weight: bold;
    position: relative;
}
.actionButtonRed:hover {
    opacity: 0.7;
}
</style>
<script src="jquery.js"></script>
<script src="base.js"></script>
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
<input type="button" class="actionButtonGreen" onclick="seq(enterSeq.value);" value="GET">
<input type="button" class="actionButtonRed" onclick="window.location.href='index.php';" value="!">
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
<input id='getButton' name="<?=file_get_contents('system.info');?>" type="button" class="actionButtonGreen" onclick="get(enterKey.options[enterKey.selectedIndex].value,enterPkg.value,enterRepo.value,enterUser.value);" value="GET">
<input type="button" class="actionButtonRed" onclick="window.location.href='index.php?seq=yes';" value="!">
<?php } ?>
</p>
</div>
<div class='panel'>
<p align="center">
<?php
foreach ($list as $key=>$value) {
    $fileExt = pathinfo($value, PATHINFO_EXTENSION);
    if ($fileExt == 'app') {
        $fileContent = file_get_contents($value);
        $fileExp = explode('=||=', $fileContent);
        $fileTitle = $fileExp[0];
        $fileIcon = (file_exists($fileExp[1])) ? $fileExp[1] : 'sys.app.png';
        $fileLink = $fileExp[2];
    } elseif ($fileExt == 'pkg') {
        $packageID = basename($value, '.pkg');
        $fileTitle = 'Remove: '.$packageID;
        $fileIcon = 'sys.pkg.png';
        $fileLink = "get('d', '".$packageID."', 'from', 'here');";
    }
    
?>
<img class='hover' style="height:15%;position:relative;" title="<?=$fileTitle;?>" src="<?=$fileIcon;?>?rev=<?=time();?>" onclick="<?=$fileLink;?>">
<?php } ?>
</p>
</div>
</body>
</html>
