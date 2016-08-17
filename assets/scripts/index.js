/**
 * Created by tharris on 6/29/16.
 */

$(function(){
    for (i=0; i<100; i++) {
        $(".indexTyped").typed({
            strings: ["Learn^300", "Write^300", "Design^300", "Develop^300"],
            typeSpeed: 80,
            backSpeed: 50,
            loop: true,
        });
    }
});

//code before the pause
setTimeout(function(){
    //do what you need here
}, 2000);
