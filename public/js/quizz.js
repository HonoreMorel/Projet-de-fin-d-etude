let gameSection=document.getElementById('dino-quiz');
let rSection;
let timer=document.getElementById('timer');
let resultatBtn;
let save;
let allTheAnswers;
let nextBtn;
let gameInformation=[];
let score=0;
let item=0;
let timerCount=10;
let cronometre;
let rightResponse=0;
let answerSection;
let answerStatement;

let scoreperQuestion=document.getElementById('score');
//getting subject id from URL to use FETCH
let Url= document.location.pathname;
let subject=(Url.slice(Url.lastIndexOf("/")+1));

//getting all the questions from PHP 
fetch(`/questions/${subject}`)
.then (function(response){
    return response.json();
})
.then(function(resultat){
    gameInformation=resultat;
    console.log(gameInformation.length);
    showQuestion(item);
    cronoTimer();
})

//function to check if the answer is right or wrong
function checkingAnswer(e){
    
    clearInterval(cronometre);
    let element=e.currentTarget;
    
    let state=e.currentTarget.getAttribute('data-answer');
    let item=e.currentTarget.getAttribute('data-item');
    console.log(state);
    console.log(item);
    //let explication=document.getElementById('explication');
    

    if(state=='true'){
        element.classList.add("correct");
        allTheAnswers.forEach(answer=>{
          answer.style.pointerEvents="none";
        });
        //explication.textContent=gameInformation[item].explication;
        score+=10;
        scoreperQuestion.textContent =`Score : ${score} points`;
        nextBtn.disabled=false;
        rightResponse++;
        
    }else {
        element.classList.add("incorrect");
        //explication.textContent=gameInformation[item].explication;
        nextBtn.disabled=false;
        allTheAnswers.forEach(answer=>{
            answer.style.pointerEvents="none";
            if(answer.getAttribute('data-answer')=='true'){
                answer.classList.add('correct')
            }
        })
    }

    
    answerSection.textContent=gameInformation[item].explication;
    answerStatement.textContent="Réponse";
    rSection.style.display="block";
    allTheAnswers.forEach(answer=>{
        answer.style.pointerEvents="none";
        
    })
    if(item>=gameInformation.length-1){
        nextBtn.disabled=true;
        resultatBtn.style.display="block";
    }
}

function next(e){
    /* console.log(item);
    if(item>=8){
        nextBtn.disabled=true;
    } */
    timerCount=10;
    timer.innerText=`${timerCount}`;
    setTimeout("cronoTimer()",200);

    item ++;
    if(item<gameInformation.length){
        showQuestion(item);
    }
    
    
   
    
}

//function to show one question
function showQuestion(item){
    
    const shuffledArray = gameInformation[item].answers.sort(() => 0.5 - Math.random());
    
    gameSection.innerHTML="";
    gameSection.innerHTML +=`
      <div class="container" id="question-espacement-haut">

        <div class="d-flex justify-content-center">
          <img class="logo-quiz" src="assets/images/logo-quiz.png" alt="#">
        </div>  

        <div class="row"> <!-- conteneur flex -->
          <div class="col-2"> <!-- item -->
            <a href=""> <img src="assets/images/close.png" alt=""></a>
          </div>

          <div class="col-8">
            <div class="card card-question">
              <div class="card-body d-flex flex-column text-center">        
                <h2><span class="titre-question">Question ${item + 1}</span></h2>
                <P><span class="text-question">${gameInformation[item].statement}</span></P>
              </div>
            </div>
          </div>

          <div class="col-2 text-right">
            <a href=""><img src="assets/images/timer.png" alt=""></a>
          </div>
        </div>

        <div class="row espace">

          <div class="col-4 offset-2 d-flex flex-column">

            <button type="button" class="answer button-question-medium" data-item ="${item}" data-answer="${shuffledArray[0].state}">
              <span class="text-question">${shuffledArray[0].answer}</span>
            </button>
            
            <button type="button" class="answer button-question-medium" data-item ="${item}" data-answer="${shuffledArray[1].state}">
              <span class="text-question">${shuffledArray[1].answer}</span>
            </button>
          </div>

          <div class="col-4 d-flex flex-column">

            <button type="button" class="answer button-question-medium" data-item ="${item}" data-answer="${shuffledArray[2].state}">
              <span class="text-question">${shuffledArray[2].answer}</span>
            </button>

            <button type="button" class="answer button-question-medium" data-item ="${item}" data-answer="${shuffledArray[3].state}">
              <span class="text-question">${shuffledArray[3].answer}</span>
            </button>
          </div>
        </div>

        <div class="row espace">
          <div class="col text-center">
            <button id ="next" type="button" class="button-suivant-large">
              <span class="text-question">Suivant</span>
            </button>
            

            
            
          </div>
          
        </div>
        <div class="row espace">
          <div class="col text-center">
            <button id ="resultat" type="button" class="button-suivant-large">
              <span class="text-question">Sauvegarder</span>
            </button>

            
            
          </div>
          
        </div>

      

        <div class="row" id="question-espacement-bas">
          <div class="col">
            <div class="card card-reponse">
              <div class="card-body d-flex flex-column text-center">        
                <h2 class="titre-question text-explication"></h2>
                <P class="text-question text-explaining"></P>
              </div>
            </div>
          </div>
        </div>
    </div>
    `;

    rSection=document.getElementById('question-espacement-bas');
    rSection.style.display="none";
    answerStatement=document.querySelector('.text-explication');
    answerSection=document.querySelector('.text-explaining');
    allTheAnswers=document.querySelectorAll('.answer');
    console.log(allTheAnswers);
    allTheAnswers.forEach(answer=>{
        answer.addEventListener('click',checkingAnswer);
    })

    resultatBtn=document.getElementById('resultat');
    resultatBtn.addEventListener('click',showResultat);
    nextBtn=document.getElementById('next');
   
    nextBtn.addEventListener('click',next);
    nextBtn.disabled=true;
   
}

//function to begin the clock
function showSeconds(){
    
    timerCount--;
   
    timer.innerText=`${timerCount}`;
    if(timerCount==0){
        clearInterval(cronometre);
        allTheAnswers.forEach(answer=>{
          answer.style.pointerEvents="none";
        })
        showTheRightAnswer();
        
        


    }

}

//function to show the correct answer after cronometre ends
function showTheRightAnswer(){
    allTheAnswers.forEach(answer=>{
        
        if(answer.getAttribute('data-answer')=='true'){
            answer.classList.add('correct')
        }
    })
    rSection.style.display="block";
    answerSection.textContent=gameInformation[item].explication;
    answerStatement.textContent="Réponse";
    
   
    //explication.textContent=gameInformation[item].explication;
    nextBtn.disabled=false;

}

function cronoTimer(){
    cronometre=setInterval(showSeconds,1000);
}

//function to show the resultat
 function showResultat(){
    gameSection.innerHTML="";
    gameSection.innerHTML +=`
    <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Merci pour votre participacion</h5>
              <p class="card-text">Votre score est de 10/${rightResponse}</p>
              <p class="card-text">Soit ${score} points</p>
              <button id="save" type="button" class="btn btn-primary">Sauvegarder</button>

          </div>
        </div>
      </div>
    </div>
  `;
    
    //get the save's button
    save=document.getElementById('save');
    save.addEventListener('click',saveScore);

    timer.style.display="none";
    scoreperQuestion.style.display="none";

    //creating the objet that includes the score and quizz
    let infoGame={
        'subject_id' :subject,
        'score':score
    };
    //save into LocalStorage
    localStorage.setItem("quizzInformation",JSON.stringify(infoGame));
    
 }


 //function to save the score in the DB

 function saveScore(){
   
    
    
    let getInfoLocalStorage=JSON.parse(localStorage.getItem('quizzInformation'));
    console.log(getInfoLocalStorage);
    console.log(getInfoLocalStorage.subject_id);
    console.log(getInfoLocalStorage.score);

     fetch(`/savescore/${getInfoLocalStorage.subject_id}/${getInfoLocalStorage.score}`)
    .then (function(response){
        return response.text();
    })
    .then(function(resultat){
        console.log(resultat);
        if(resultat=='')

        console.log(resultat);
    })
 }