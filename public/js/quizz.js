let gameSection=document.getElementById('game');
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
let scoreperQuestion=document.getElementById('score');
//getting subject id from URL to use FETCH
let Url= document.location.pathname;
let subject=(Url.slice(Url.lastIndexOf("/")+1));

//getting all the questions from PHP 
fetch(`http://127.0.0.1:8000/questions/${subject}`)
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
    
    let explication=document.getElementById('explication');
    if(state=='true'){
        element.classList.add("correct");
        explication.textContent=gameInformation[item].explication;
        score+=10;
        scoreperQuestion.textContent =`Score : ${score} points`;
        nextBtn.disabled=false;
        rightResponse++;
        
    }else {
        element.classList.add("incorrect");
        explication.textContent=gameInformation[item].explication;
        nextBtn.disabled=false;
        allTheAnswers.forEach(answer=>{
            answer.style.pointerEvents="none";
            if(answer.getAttribute('data-answer')=='true'){
                answer.classList.add('correct')
            }
        })
    }

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
    gameSection.innerHTML +=`<div>
    <h2>${gameInformation[item].statement}</h2>
    <p class="answer" data-item =${item} data-answer="${shuffledArray[0].state}">${shuffledArray[0].answer}</p>
    <p class="answer" data-item =${item} data-answer="${shuffledArray[1].state}">${shuffledArray[1].answer}</p>
    <p class="answer" data-item =${item} data-answer="${shuffledArray[2].state}">${shuffledArray[2].answer}</p>
    <p class="answer" data-item =${item} data-answer="${shuffledArray[3].state}">${shuffledArray[3].answer}</p>
    <p id="explication"></p>
    <button id="next">Suivant</button>
    <button id="resultat">Résultat</button>

    </div>`;
    allTheAnswers=document.querySelectorAll('.answer');
    
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
    explication.textContent=gameInformation[item].explication;
    nextBtn.disabled=false;

}

function cronoTimer(){
    cronometre=setInterval(showSeconds,1000);
}

//function to show the resultat
 function showResultat(){
    gameSection.innerHTML="";
    gameSection.innerHTML +=`<div>
        <h2>Merci pour votre participacion</h2>
        <p>Votre score est de ${rightResponse}/10</p>
        <p>Soit ${score} points</p>
        <button id="save">Sauvergarder</button>

    </div>`;
    
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
    })
 }