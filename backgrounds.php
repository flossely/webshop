<?php
$background = file_get_contents('background');
$dir = '.';
$lock = ($_REQUEST['lock']) ? $_REQUEST['lock'] : 'true';
if ($lock == 'true') {
    $lockInv = 'false';
} elseif ($lock == 'false') {
    $lockInv = 'true';
}
$list = str_replace($dir.'/','',(glob($dir.'/back.*.png')));
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Backgrounds</title>
<link rel="shortcut icon" href="sys.back.png?rev=<?=time();?>" type="image/x-icon">
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
    border-radius: 5px;
    font-family: "ubuntu";
    font-size: 14pt;
}
.top {
    background-color: #e4e4e4;
    border: none;
    border-radius: 5px;
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
    border-radius: 5px;
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
.actionButtonRed {
    background-color: #d83d48;
    color: #fff;
    font-size: 16pt;
    width: 27px;
    font-weight: bold;
    position: relative;
}
.actionButtonRed:hover {
    opacity: 0.7;
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
.actionButtonYellow {
    background-color: #ddab00;
    color: #fff;
    font-size: 16pt;
    width: 27px;
    font-weight: bold;
    position: relative;
}
.actionButtonYellow:hover {
    opacity: 0.7;
}
</style>
<script src="jquery.js"></script>
<script src="base.js"></script>
<script>
function set(name, content) {
    var dataString = 'name=' + name + '&content=' + content;
    $.ajax({
        type: "POST",
        url: "write.php",
        data: dataString,
        cache: false,
        success: function(html) {
            window.location.reload();
        }
    });
    return false;
}
</script>
</head>
<body>
<div class='top'>
<p align="center">
<select id='selectBack' onchange="set('background', selectBack.options[selectBack.selectedIndex].id);">
<?php
foreach ($list as $key=>$value) {
    $backNameBase = basename($value, '.png');
    $backNameDisp = str_replace('back.', '', $backNameBase);
?>
<option id="<?=$value;?>"><?=$backNameDisp;?></option>
<?php } ?>
</select>
<input type="button" class="actionButtonYellow" onclick="set('background', '<?=$list[0];?>');" value="<">
<input type="button" class="actionButtonGreen" onclick="window.location.href='backgrounds.php?lock=<?=$lockInv;?>';" value="!">
<input type="button" class="actionButtonRed" onclick="window.location.href = 'index.php';" value="X">
</p>
</div>
<div class='panel'>
<p align="center">
<?php
if ($lock == 'false') {
    foreach ($list as $key=>$value) {
?>
<img class="hover" style="height:15%;position:relative;" name="<?=$value;?>" title="<?=$value;?>" src="<?=$value;?>?rev=<?=time();?>" onclick="set('background', this.name);">
<?php }} ?>
</p>
</div>
</body>
</html>
