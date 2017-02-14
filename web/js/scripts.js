function setBoard() {
    var spaces = $('#row8').children().get();
    console.log(spaces);
    for (var i = 0; i < spaces.length; i++) {
        if (i === 0 || i === 7) {
            $(spaces[i]).addClass("black-rook");
        } else if (i === 1 || i === 6) {
            $(spaces[i]).addClass("black-knight");
        } else if (i === 2 || i === 5) {
            $(spaces[i]).addClass("black-bishop");
        } else if (i === 3) {
            $(spaces[i]).addClass("black-queen");
        } else {
            $(spaces[i]).addClass("black-king");
        }
    }
}




$(function() {
    setBoard();
    var subject = "";
    var pieceLoc;
    var confirm = false;
    var currentType;
    $(".row div").click(function() {
        var xIndex = parseInt(removeLetters($(this).attr("id")));
        var yIndex = parseInt(removeLetters($(this).parent().attr("id")));
        var currentPiece = this;
        if (confirm) {
            var targetLoc = [xIndex, yIndex];
            $.post("/", {pieceLoc: pieceLoc, targetLoc: targetLoc, subject: subject}, function(response) {
                if (response) {
                    $('div').removeClass('black-'+currentType);
                    $(currentPiece).addClass('black-'+currentType);
                    $(currentPiece).click(function() {
                        movePiece(this);
                    })
                    confirm = false;
                }
            });
        }
    });

    function movePiece(square) {
        var xIndex = parseInt(removeLetters($(square).attr("id")));
        var yIndex = parseInt(removeLetters($(square).parent().attr("id")));
        console.log(xIndex,yIndex);
        if (!confirm) {
            pieceLoc = [xIndex, yIndex];
            $(square).addClass("piece-space");
            confirm = true;
            console.log(pieceLoc);
            $(square).off();
        }
    }

    // $(".black-queen").click(function() {
    //     subject = "queen";
    //     currentType = "queen";
    //     movePiece(this);
    // });

    $(".black-knight").click(function() {
        subject = "knight";
        currentType = "knight";
        movePiece(this);
    });

    $("#move-rook-button").click(function() {
        $("div").removeClass("piece-space target-space");
        subject = "rook";
        confirm = false;
    });

    $("#move-bishop-button").click(function() {
        $("div").removeClass("piece-space target-space");
        subject = "bishop";
        confirm = false;
    });

    $("#move-king-button").click(function() {
        $("div").removeClass("piece-space target-space");
        subject = "king";
        confirm = false;
    });

    function removeLetters(index) {
        return index.slice(-1);
    }
});
