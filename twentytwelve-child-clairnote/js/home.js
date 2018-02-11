function toggleVideo(anId) {
    [
        'videoRainbow',
        'videoDoReMi',
        'videoBlueDanube',
        'videoGreensleeves',
        'videoBachPrelude',
        'videoElise',
        'videoEntertainer'
    ]
    .forEach(function(id) {
        var vid;
        if (id !== anId) {
            vid = document.getElementById(id);
            vid.style.display = "none";
            vid.pause();
        }
    });
    document.getElementById(anId).style.display = "inline-block";
}
