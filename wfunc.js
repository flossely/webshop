function mute(x) {
    if (x != '') {
        x = '';
    } else {
        x = 'true';
    }
    var dataString = 'name=sounds&content=' + x;
    $.ajax({
        type: "POST",
        url: "write.php",
        data: dataString,
        cache: false,
        success: function(html) {window.location.reload();}
    });
    return false;
}
function playAudio(player, name) {
    player.src = name;
    player.play();
}
function pauseAudio(player) {
    player.pause();
}
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
