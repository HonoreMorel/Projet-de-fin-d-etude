btnAll=document.getElementById('btn_all');

btnQuizz=document.getElementById('btn_quizz');
btnGame=document.getElementById('btn_game');
let remove=document.getElementById('remove');
let classe=document.getElementById('class');
btnAll.addEventListener('click',showAll);
btnQuizz.addEventListener('click', showQuizz);
btnGame.addEventListener('click',showGame);

function showQuizz(){
    remove.classList.add('marge');
    btnQuizz.classList.remove("button-white-little");
    btnQuizz.classList.add("button-gradient-little");

    btnGame.classList.remove("button-gradient-little");
    btnGame.classList.add("button-white-little");


    btnAll.classList.remove("button-gradient-little");
    btnAll.classList.add("button-white-little");

    let game=document.querySelectorAll('.game');
    let quizz=document.querySelectorAll('.quizz');
    
    quizz.forEach(oneQuizz=>{
        oneQuizz.style.display="block"
    });
    
    
    game.forEach(oneGame=>{
        oneGame.style.display="none"
    });

}

function showAll(){
    remove.classList.add('marge');

    btnQuizz.classList.add("button-white-little");
    btnQuizz.classList.remove("button-gradient-little");

    btnGame.classList.remove("button-gradient-little");
    btnGame.classList.add("button-white-little");


    btnAll.classList.add("button-gradient-little");
    btnAll.classList.remove("button-white-little");

   
    let game=document.querySelectorAll('.game');
    let quizz=document.querySelectorAll('.quizz');
    
    quizz.forEach(oneQuizz=>{
        oneQuizz.style.display="block"
    });
    
    
    game.forEach(oneGame=>{
        oneGame.style.display="block"
    });

}

function showGame(){
    remove.classList.remove('marge');
    classe.classList.remove('padding-top-espacement-nav');

    btnQuizz.classList.add("button-white-little");
    btnQuizz.classList.remove("button-gradient-little");

    btnGame.classList.add("button-gradient-little");
    btnGame.classList.remove("button-white-little");


    btnAll.classList.remove("button-gradient-little");
    btnAll.classList.add("button-white-little");

   
    
    let game=document.querySelectorAll('.game');
    let quizz=document.querySelectorAll('.quizz');
    
    quizz.forEach(oneQuizz=>{
        oneQuizz.style.display="none"
    });
    
    
    game.forEach(oneGame=>{
        oneGame.style.display="block"
    });

}
