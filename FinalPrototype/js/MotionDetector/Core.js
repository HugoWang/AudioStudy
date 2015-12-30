/**
 *
 * @project        Motion Detection in JS
 * @file           ImageCompare.js
 * @description    Core functionality.
 * @author         Benjamin Horn
 * @package        MotionDetector
 * @version        -
 * 
 */

;(function(App) {

	"use strict";
	
	/*
	 * The core motion detector. Does all the work.
	 *
	 * @return <Object> The initalized object.
	 *
	 */
	App.Core = function() {

		var rendering = false;
        var displayed = document.getElementById("img");
       
		var width = 64;
		var height = 48;
        
		var webCam = null;
		var imageCompare = null;

        
		var currentImage = null;
		var oldImage = null;

		var topLeft = [Infinity,Infinity];
		var bottomRight = [0,0];
		
//autosound variables		
 var   RAN = 0;
var   RAN2 = 0;
var   RAN1=0 ;
        
       // -----------------
         var counter =0;
        var touched = false;
        //----------------
		var raf = (function(){
			return  window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame ||
			function( callback ){
				window.setTimeout(callback, 1000/60);
			};
		})();

		/*
		 * Initializes the object.
		 *
		 * @return void.
		 *
		 */
		function initialize() {
            
			imageCompare = new App.ImageCompare();
			webCam = new App.WebCamCapture(document.getElementById('webCamWindow'));

			rendering = true;

			main();
		}
// autogen sound part
  //Next line plays the sound each 6 sec //////////////////////////////////////
 // setInterval(soundplay , 6000);
  //
  /*
function  soundplay () {
 //if ( counter >0 ) {
 //myVar = setInterval(main, 0520); 
  //   update();
 RAN  = Math.floor((Math.random() * 8) );
 console.log("Fist " +RAN);
 Key = document.getElementById(RAN);
 Key.play();
    
setTimeout(Counterr, 600); 

}
 
     function Counterr () {

    var RAN1 = Math.floor((Math.random() * 8) );
         while( RAN1 == RAN ) 
         {
         var Roun = Math.floor((Math.random() * 8) );
             console.log("2nd was changed xDDD");
         }
 console.log("Second " +RAN1);
 Key = document.getElementById(RAN1);
 Key.play();         
 setTimeout(thirssound, 600); 
 
     }
     
     function thirssound () {

 var   RAN2 = Math.floor((Math.random() * 8) );

         while(RAN2 == RAN1) 
         {
         var RAN2 = Math.floor((Math.random() * 8) );
             console.log("3r was changed xDDD");
         }
  console.log("Third " +RAN2);         
 Key = document.getElementById(RAN2);
 Key.play();


     }
     */
     //PPPPPPpPPPPPP
		/*
		 * Compares to images and updates the position
		 * of the motion div.
		 *
		 * @return void.
		 *
		 */
		var count = 0;
		var touch = false;
   
		function render() {
            
            var today = new Date;
            var day = today.getDate();
			oldImage = currentImage;
			currentImage = webCam.captureImage(false);

			if(!oldImage || !currentImage) {
				return;
			}
			 
            

    
   // displayed.src = ("images/touch_me.png");
    if (touch == false ) {
    
    var vals = imageCompare.compare(currentImage, oldImage, width, height,day);
			topLeft[0] = vals.topLeft[0] * 10;
			topLeft[1] = vals.topLeft[1] * 10;

			bottomRight[0] = vals.bottomRight[0] * 10;
			bottomRight[1] = vals.bottomRight[1] * 10;

			//document.getElementById('movement').style.top = topLeft[1] + 'px';
			//document.getElementById('movement').style.left = topLeft[0] + 'px';

			//document.getElementById('movement').style.width = (bottomRight[0] - topLeft[0]) + 'px';
			//document.getElementById('movement').style.height = (bottomRight[1] - topLeft[1]) + 'px';

			//topLeft = [Infinity,Infinity];
			//bottomRight = [0,0]

		  

        }
        }

		/*
		 * The main rendering loop.
		 *
		 * @return void.
		 *
		 */
        
 
		function main() {
     /*  var pathname = window.location.pathname;
    //console.log(pathname);
    setInterval(function() {
        var date = new Date();
        
       if((date.getDay == 6 || date.getDay == 0) && pathname == "/Final%20Prototype/index.html") {
            //its saturday or sunday and you are on wrong page
            window.location.href = 'weekend.html';
            console.log(pathname);
      }
        /*else if((date.getDay() !== 6 || date.getDay() !== 0) && pathname =="/Final%20Prototype/weekend.html") {
            //its weekday and you are on wrong page
            window.location.href = 'index.html';
        }
               
    }, 20000);
    */
document.onclick = myClickHandler;
        
    function myClickHandler() {
        if (touched == false) { 
            touched = true;
            counter+=1;   
        }
    }
			try{
				render();
			} catch(e) {
				console.log(e);
				return;
			}

			if(rendering == true) {
				raf(main.bind(this));
			}
		}

		initialize();
	};
})(MotionDetector);