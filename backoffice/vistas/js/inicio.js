/*=============================================
VISTAS PREVIAS DE VIDEOS
=============================================*/

$(".slideAcademia").jdSlider({
	wrap: '.slide-inner',
 	slideShow: 4,
 	slideToScroll: 4,
 	isLoop: false,
 	responsive: [{
        viewSize: 576,
        settings: {
            slideShow: 1,
            slideToScroll: 1
        }
    },{
        viewSize: 768,
        settings: {
            slideShow: 2,
            slideToScroll: 2
        }
    },{
        viewSize: 1024,
        settings: {
            slideShow: 3,
            slideToScroll: 3
        }
    }]

});