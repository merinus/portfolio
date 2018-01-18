function enlarge(){
    $(this).animate({height: '100%', width: '100%'});
}
function shrink() {
    $(this).animate({height: '80%', width: '80%'});
}

$("#photo1").on((window.screen.width > 320) && "hover", $("#photo1").hover(enlarge,shrink)
);

$("#photo2").on((window.screen.width > 320) && "hover", $("#photo2").hover(enlarge,shrink)
);

$("#photo3").on((window.screen.width > 320) && "hover", $("#photo3").hover(enlarge,shrink)
);