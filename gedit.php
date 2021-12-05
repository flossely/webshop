<?php
$background = file_get_contents('background');
$name = $_REQUEST['name'];
$lock = $_REQUEST['lock'];
if ($lock != 'true') {
    $content = file_get_contents($name);
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Text Editor</title>
<link rel="shortcut icon" href="sys.edit.png?rev=<?=time();?>" type="image/x-icon">
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
a, p, table, tr, td, th {
    background-color: #dcdad5;
    color: #000;
    font-family: "ubuntu";
    font-size: 14pt;
    text-align: center;
}
input, select, textarea {
    background-color: #fff;
    color: #000;
    border: none;
    border-radius: 3px;
    position: relative;
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
.actionIcon {
    height: 92%;
    position: relative;
}
.actionIcon:hover {
    opacity: 0.7;
}
.actionButtonGreen {
    background-color: #009f4b;
    color: #fff;
    font-size: 16pt;
    position: relative;
}
.actionButtonGreen:hover {
    opacity: 0.7;
}
</style>
<script src="jquery.js"></script>
<script src="base.js"></script>
<script src="edit.js"></script>
</head>
<body onload="countText();">
<div class='top'>
<img class="actionIcon" src="sys.cl.png" title="New File" id="newButton" onclick="var name = 'file'; window.location.href = 'gedit.php?name=' + name + '&lock=false';">
<img class="actionIcon" src="sys.rd.png" title="Open File" id="openButton" onclick="var name = filename.value; window.location.href = 'gedit.php?name=' + name;">
<img class="actionIcon" src="sys.wr.png" title="Save File" id="saveButton" onclick="save();">
<img class="actionIcon" src="sys.md.png" title="Create Directory" id="mkdirButton" onclick="var name = filename.value; mkdir(name);">
<img class="actionIcon" src="sys.mv.png" title="Move/Rename File" id="moveButton" onclick="var name = filename.value; var to = doto.value; move(name, to);">
<img class="actionIcon" src="sys.cp.png" title="Copy File" id="copyButton" onclick="var name = filename.value; var to = doto.value; copy(name, to);">
<img class="actionIcon" src="sys.rm.png" title="Delete File" id="deleteButton" onclick="var name = filename.value; del(name);"><br>
</div>
<div class='panel'>
<label>Filename: </label>
<input class="text" size=30 id="filename" style="width:38%;" type="text" value="<?=$name;?>">
<input class="text" size=30 id="doto" style="width:38%;" type="text" value="">
<textarea class="text" id="content" style="width:100%;height:70%;" oninput="countText();"><?=$content;?></textarea><br>
<input class="text" size=30 id="findbox" style="width:36%;" type="text" value="">
<label> to </label>
<input class="text" size=30 id="replacebox" style="width:36%;" type="text" value="">
<input class="actionButtonGreen" type="button" value="Replace" id="replaceButton" onclick="replaceText(findbox.value); countText();">
<br>
<label id="statusBar" style="width:98%;"></label>
</div>
</body>
</html>
