<?php
$background = file_get_contents('background');
$dir = '.';
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Webshop Settings</title>
<link rel="shortcut icon" href="sys.settings.png?rev=<?=time();?>" type="image/x-icon">
<?php include 'appstyle.php'; ?>
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
Webshop Settings 
<input type="button" class="actionButtonGreen" onclick="set('background', setBackField.value);" value=">">
<input type="button" class="actionButtonRed" onclick="window.location.href = 'index.php';" value="X">
</p>
</div>
<div class='panel'>
<p align="center">
<label>Background image: </label><br>
<textarea id='setBackField' style="width:82%;height:32%;" placeholder="Filename or URL" onkeydown="if (event.keyCode == 13) {
    set('background', setBackField.value);
}"><?=$background;?></textarea>
</p>
</div>
</body>
</html>
