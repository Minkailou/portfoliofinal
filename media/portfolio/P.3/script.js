const card = $(".perspective__3d");

$("body").on("mousemove", function (t) {
    let vertical = -($(window).innerWidth() / 2 - t.pageX) / 70,
        horizontal = ($(window).innerHeight() / 2 - t.pageY ) / 70;
    
    card.attr("style", "transform: rotateY(" + vertical + "deg) rotateX(" + horizontal + "deg)")
});

var a = document.getElementsByTagName("audio")[0];
if(a.paused) a.play();
else a.pause()
