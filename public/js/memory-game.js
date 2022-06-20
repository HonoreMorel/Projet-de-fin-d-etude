//get some elements
 let section=document.querySelector('section.memory-block');
 let playerLivesCount=document.querySelector('.playerLivesCount');
 let playerLives=6;

 //print player's lives
 playerLivesCount.textContent=playerLives;


 //Generate the data

 const getData=()=>[
     {imgSrc:'/images/beatles.jpeg', name:"beatles"},
     {imgSrc:'/images/blink182.jpeg', name:"blink182"},
     {imgSrc:'/images/fkatwigs.jpeg', name:"fka twigs"},
     {imgSrc:'/images/fleetwood.jpeg', name:"fleetwood"},
     {imgSrc:'/images/joy-division.jpeg', name:"joy division"},
     {imgSrc:'/images/ledzep.jpeg', name:"led zeppelin"},
     {imgSrc:'/images/metallica.jpeg', name:"metallica"},
     {imgSrc:'/images/pinkfloyd.jpeg', name:"pink floyd"},
     {imgSrc:'/images/beatles.jpeg', name:"beatles"},
     {imgSrc:'/images/blink182.jpeg', name:"blink182"},
     {imgSrc:'/images/fkatwigs.jpeg', name:"fka twigs"},
     {imgSrc:'/images/fleetwood.jpeg', name:"fleetwood"},
     {imgSrc:'/images/joy-division.jpeg', name:"joy division"},
     {imgSrc:'/images/ledzep.jpeg', name:"led zeppelin"},
     {imgSrc:'/images/metallica.jpeg', name:"metallica"},
     {imgSrc:'/images/pinkfloyd.jpeg', name:"pink floyd"},
    ];

    //Randomize the array

    const randomize=()=>{

        const cardData=getData();
        cardData.sort(()=>Math.random()-0.5);
        return cardData;
        

    };

    //Generate the HTML

    const cardGenerator =()=>{
        section.innerHTML="";
        playerLives=6;
        playerLivesCount.textContent=playerLives;
        const cardData=randomize();
        //Generate every card
        
        cardData.forEach(item=>{
            const card=document.createElement('div');
            const face=document.createElement('img');
            const back=document.createElement('div');
            card.classList='card';
            face.classList='face';
            back.classList='back';
        //attach the info for the cards 
        face.src=item.imgSrc;
        //create an attibute with the band's name
        card.setAttribute('name', item.name);
        //attach the cards to the section
        section.appendChild(card);
        card.appendChild(face);
        card.appendChild(back);
        card.setAttribute('name', item.name);
        back.innerHTML='<i class="fas fa-question"></i>';
        //adding an event to the card
        card.addEventListener('click', (e)=>{
            card.classList.toggle('toggleCard');
            //console.log(e);
            checkCards(e);
        } );

        });
        const button=document.createElement('button');
        section.appendChild(button);
        button.textContent="Jouer";
        button.classList.add('btn-memory')
        button.addEventListener('click',()=>{
            cardGenerator();
        })
        beginGame();
};

//checking to know if the cards have the same image
const checkCards =(e)=>{
    const clickedCard=e.target;
    clickedCard.classList.add('flipped');
    const flippedCards=document.querySelectorAll('.flipped');
    const toggleCard=document.querySelectorAll('.toggleCard');
    
    console.log(flippedCards);
    //checking the cards that are flipped
    if(flippedCards.length===2){
        if(flippedCards[0].getAttribute('name')===flippedCards[1].getAttribute('name')){
            flippedCards.forEach((card)=>{
                card.classList.remove("flipped");
                card.style.pointerEvents="none";
            })
            
        }else{

            //remove the flipped and turn the card back
            playerLives--;
            playerLivesCount.textContent=playerLives;
            if(playerLives!==0){
                flippedCards.forEach((card)=>{
                
                    card.classList.remove('flipped');
                    setTimeout(()=>card.classList.remove("toggleCard"),1000);           
                 });
                
            }
           
            
            
        }
        
    }
    if(playerLives===0){
        
       
        let allCards=document.querySelectorAll('.card');
        allCards.forEach((oneCard)=>{
            if(!oneCard.classList.contains('toggleCard')){
                oneCard.classList.add('toggleCard');
               
                
            }
        })
        flippedCards.forEach((card)=>{
            card.classList.add("toggleCard");  
            card.classList.add('flipped');
        })
    }

    //Check if we won the game
    if(toggleCard.length===16){
        setTimeout(()=>{
            window.alert("Vous avez gagné");
        },1000);
       
    }
    
}

//Restart the game
 /* const restart =(text)=>{
     let cardData=randomize();
     let faces=document.querySelectorAll('.face');
     let cards=document.querySelectorAll('.card');
     section.style.pointerEvents="none";
     cardData.forEach((item, index)=>{
        cards[index].classList.remove('toggleCard');
        //Randomize
        setTimeout(()=>{
            cards[index].style.pointerEvents="all";
            faces[index].src=item.imgSrc;
            cards[index].setAttribute('name',item.name);
            section.style.pointerEvents="all";
        },2000);
     });
     playerLives=6;
     playerLivesCount.textContent=playerLives;
     let message=setTimeout(()=>confirm(text),100);
     if(message){
       
         setTimeout(()=>{
            beginGame();

         },1000);
        
     }
     //setTimeout(()=>window.alert(text),100);
     
 } */

 //show the images before starting the game
 const beginGame=()=>{
     let allCards=document.querySelectorAll('.card');
     allCards.forEach((oneCard)=>{
            oneCard.classList.add('toggleCard');
     })
     setTimeout(()=>{
        allCards.forEach((oneCard)=>{
            oneCard.classList.remove('toggleCard');
     })
     },1000);
     //console.log(allCards);
 }
cardGenerator();
    


