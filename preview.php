<?php
$background = file_get_contents('background');
$dir = '.';
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Background Preview</title>
<link rel="shortcut icon" href="sys.img.png?rev=<?=time();?>" type="image/x-icon">
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
input {
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
.hover:hover {
    opacity: 0.7;
    position: relative;
}
.actionButtonGreen {
    background-color: #009f4b;
    color: #fff;
    font-size: 16pt;
    width: 27px;
    font-weight: bold;
    position: relative;
}
.actionButtonGreen:hover {
    opacity: 0.7;
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
</style>
</head>
<body>
<div class='top'>
<p align="center">
Background Preview
<input type="button" class="actionButtonGreen" name="<?=$background;?>" onclick="window.location.href = this.name;" value=">">
<input type="button" class="actionButtonRed" onclick="window.location.href = 'index.php';" value="<">
</p>
</div>
</body>
</html>
