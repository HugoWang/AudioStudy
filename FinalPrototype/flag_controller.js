$(document).ready(function () {
	
var randquestion=Math.random()*3;
randquestion=Math.floor(randquestion);
    
var questionNumber=randquestion;
var questionBank=new Array();
var stage="#game1";
var stage2=new Object;
var questionLock=false;
var numberOfQuestions;
var score=0;
    
    
    //timer 30 seconds
    var d = new Date();
    var lastClick = d.getTime();

    $('body').click(function() {                    
        d = new Date();            
        lastClick = d.getTime();
    });

    setInterval(function() {
        d = new Date();            
        console.log(lastClick+","+d.getTime());

        var t = d.getTime();
        if(t-lastClick > 30000)
        {
             window.location.href = 'index.html';
        }

    }, 2000);
		 

		 
		 
		 

 
 		$.getJSON('flags.json', function(data) {

		for(i=0;i<data.quizlist.length;i++){ 
			questionBank[i]=new Array;
			questionBank[i][0]=data.quizlist[i].question;
			questionBank[i][1]=data.quizlist[i].option1;
			questionBank[i][2]=data.quizlist[i].option2;
			questionBank[i][3]=data.quizlist[i].option3;
            questionBank[i][4]=data.quizlist[i].option4;
		}
		 numberOfQuestions=questionBank.length; 
		
		  
		displayQuestion();
		})//gtjson
 

//fillDB();



function displayQuestion(){

$.ajax({
 type: "POST",
 url: "no_player.php",
 data: "",
 success: function(r) 
  {}
  })

 var randomise = Math.random()*12;
 var rnd=Math.random()*4;
rnd=Math.ceil(rnd);
 var q1;
 var q2;
 var q3;
 var q4;

    console.log(questionNumber);
    
if(rnd==1){q1=questionBank[questionNumber][1];q2=questionBank[questionNumber][2];q3=questionBank[questionNumber][3];q4=questionBank[questionNumber][4];}
if(rnd==2){q2=questionBank[questionNumber][1];q3=questionBank[questionNumber][2];q1=questionBank[questionNumber][3];q4=questionBank[questionNumber][4];}
if(rnd==3){q3=questionBank[questionNumber][1];q1=questionBank[questionNumber][2];q2=questionBank[questionNumber][3];q4=questionBank[questionNumber][4];}

if(rnd==4){q4=questionBank[questionNumber][1];q2=questionBank[questionNumber][2];q1=questionBank[questionNumber][4];q3=questionBank[questionNumber][3];}
/*if(rnd==5){q2=questionBank[questionNumber][1];q3=questionBank[questionNumber][2];q4=questionBank[questionNumber][4];q1=questionBank[questionNumber][3];}
if(rnd==6){q3=questionBank[questionNumber][1];q1=questionBank[questionNumber][2];q4=questionBank[questionNumber][4];q2=questionBank[questionNumber][3];}
    
if(rnd==7){q1=questionBank[questionNumber][1];q4=questionBank[questionNumber][4];q2=questionBank[questionNumber][2];q3=questionBank[questionNumber][3];}
if(rnd==8){q2=questionBank[questionNumber][1];q4=questionBank[questionNumber][4];q3=questionBank[questionNumber][2];q1=questionBank[questionNumber][3];}
if(rnd==9){q3=questionBank[questionNumber][1];q4=questionBank[questionNumber][4];q1=questionBank[questionNumber][2];q2=questionBank[questionNumber][3];}
    
if(rnd==10){q4=questionBank[questionNumber][4];q1=questionBank[questionNumber][1];q2=questionBank[questionNumber][2];q3=questionBank[questionNumber][3];}
if(rnd==11){q4=questionBank[questionNumber][4];q2=questionBank[questionNumber][1];q3=questionBank[questionNumber][2];q1=questionBank[questionNumber][3];}
if(rnd==12){q4=questionBank[questionNumber][4];q3=questionBank[questionNumber][1];q1=questionBank[questionNumber][2];q2=questionBank[questionNumber][3];}*/

    
 $(stage).append('<div  class="questionText">'+questionBank[questionNumber][0]+'</div><div id="1" class="pix"><img draggable="false"  src="flags/'+q1+'"></div><div id="2" class="pix"><img draggable="false" src="flags/'+q2+'"></div><div id="3" class="pix"><img draggable="false" src="flags/'+q3+'"></div><div id="4" class="pix"><img draggable="false" src="flags/'+q4+'"></div>');

 $('.pix').click(function(){
  if(questionLock==false){questionLock=true;	
  //correct answer
  if(this.id==rnd){
   $(stage).append('<div class="feedback1">CORRECT</div>');
   score++;
   }
  //wrong answer	
  if(this.id!=rnd){
   $(stage).append('<div class="feedback2">WRONG</div>');
  }
  

$.ajax({
 success: function(r) 
  {
  	            var today = new Date;
         	   var date = today.getDate();
         	   if (date == 18|| date == 24 ) {
    setTimeout(function(){ 
    	$("body").animate({"opacity": "-=1"},"fast");
    	window.setTimeout(function() {
    		window.location.href = 'Surver_no_sound.php';
		}, 500);
	},1000)
				}
				
				else {
    setTimeout(function(){ 
    	$("body").animate({"opacity": "-=1"},"fast");
    	window.setTimeout(function() {
    		window.location.href = 'Survey.php';
		}, 500);
	},1000)
				}
				
	
	
  },
});

  
 }})
}//display question

	
	
	
	
	
	function changeQuestion(){	
        
	if(stage=="#game1"){stage2="#game1";stage="#game2";}
		else{stage2="#game2";stage="#game1";}
	
	displayFinalSlide();
	
	 $(stage2).animate({"right": "+=800px"},"slow", function() {$(stage2).css('right','-800px');$(stage2).empty();});
	 $(stage).animate({"right": "+=800px"},"slow", function() {questionLock=false;});
	}//change question
	

	
	
	function displayFinalSlide(){
		
		$(stage).append('<div class="questionText">You have finished the quiz!<br><br>Please wait a while to answer our survey.</div>');
		
		window.setTimeout(function() {
    window.location.href = 'Survey.php';
}, 3000);
		
		//window.location.replace("kyselylomake_eng.html");
		
	}//display final slide
	
	
	
	});//doc ready