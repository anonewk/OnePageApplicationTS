class SliderEvent {
    constructor(slideEventClass, arrowLeftEventId, arrowRightEventId) {
        this.current = 0;
        this.anim = null;
        this.slideEvent = document.getElementsByClassName(slideEventClass);
        this.arrowLeftEvent = document.getElementById(arrowLeftEventId);
        this.arrowRightEvent = document.getElementById(arrowRightEventId);
        this.init();
        this.arrowLeftMoveEvent();
        this.arrowRightMoveEvent();
        this.key();
    }
    init() {
        this.slideEvent[this.current].style.display = "block";

    }
    //    reset() {
    //        var slider=this;
    //        console.log(slider);
    //        for (let i = 0; i < slider.slideEvent .length; i++) {
    //            slider.slideEvent[i].style.display = "none";
    //            
    //        }
    //
    //    }

    moveRightEvent() {
        this.current++;
//        this.reset();
        if (this.current >= this.slideEvent.length) {
            this.current = 0;

        }
        this.slideEvent[this.current].style.display = "block";



    }
    arrowLeftMoveEvent() {

        var slider = this;
        this.arrowLeftEvent.addEventListener("click", function () {

              $('#flexevent').animate({
            marginLeft: "+=200px"
        }, "fast");


        })

    }

    arrowRightMoveEvent() {
        var slider = this;

        this.arrowRightEvent.addEventListener("click", function () {

        $('#flexevent').animate({
            marginLeft: "-=200px"
        }, "fast");


        })
}

  key() {
        $(document).keydown(function (e) {
            switch (e.which) {
                case 37: // gauche

                    this.arrowLeftMoveEvent();
                    break;
                case 39: // droite

                    this.arrowRightMoveEvent();
                    break;

                default:
                    return; // quitter si une autre toucher est appuyÃ©e
            }
        });






}

}
var sliderEvent;
var sliderEvent = new SliderEvent("project", "leftArrowEvent", "rightArrowEvent");
