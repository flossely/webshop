<style>
@font-face {
    font-family: "ubuntu";
    src: url("ubuntu.ttf");
}
@font-face {
    font-family: "userdefine";
    src: url("<?=$name;?>");
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
.actionButton {
    background-color: #009f4b;
    color: #fff;
    font-size: 16pt;
    font-weight: bold;
    position: relative;
}
.actionButton:hover {
    opacity: 0.7;
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
.userDefine {
    font-family: "userdefine";
    font-size: 20pt;
}
.actionIcon {
    height: 92%;
    position: relative;
}
.actionIcon:hover {
    opacity: 0.7;
}
</style>
