$(function() {
    var subject = "queen";
    var pieceLoc;
    var confirm = false;
    $(".row div").click(function() {
        $("div").removeClass("target-space");
        var xIndex = parseInt(removeLetters($(this).attr("id")));
        var yIndex = parseInt(removeLetters($(this).parent().attr("id")));
        if (!confirm) {
            pieceLoc = [xIndex, yIndex];
            $(this).addClass("queen-space");
            confirm = true;
        } else if (confirm) {
            var targetLoc = [xIndex, yIndex];
            $(this).addClass("target-space");
            $.post("/", {pieceLoc: pieceLoc, targetLoc: targetLoc, subject: subject}, function(response) {
                $(".result").html(response);
            });
        }
    });

    $("#move-queen-button").click(function() {
        $("div").removeClass("queen-space target-space");
        subject = "queen";
        confirm = false;
    });

    $("#move-knight-button").click(function() {
        $("div").removeClass("queen-space target-space");
        subject = "knight";
        confirm = false;
    });


    function removeLetters(index) {
        return index.slice(-1);
    }
});
