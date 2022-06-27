let allFilter = document.querySelectorAll('.btnActivity');

allFilter.forEach(element => {
    element.addEventListener('click', filter);
})
// function qui permet de faire office de filtre.
function filter(e){
    console.log(e);
    changerCouleur();

    //changer la couler du button actuel
    e.currentTarget.classList.add('button-gradient-little');
    e.currentTarget.classList.remove('button-white-little');


   
    
    // let qui permet de masquer tout ce qui n'appartient pas a la class allEvent demander.
    let allEventToHide = document.querySelectorAll('.allEvent');
    allEventToHide.forEach(elementHide => {
        elementHide.style.display = 'none';
    })
    // let qui permet d'afficher les class allEvent demander.
    let attr = e.currentTarget.dataset.cat;
    let allEventToShow = document.querySelectorAll('.'+attr);
    allEventToShow.forEach(elementShow => {
        elementShow.style.display = 'block';
    })

    // let qui permet d'afficher la totalité des class allEvent.
    let showAllElement = e.currentTarget.dataset.cat;
    let allShow = document.querySelectorAll('.'+showAllElement);
    allShow.forEach(all => {
        all.style.display = 'block';
    })
}


function changerCouleur(){
    allFilter.forEach(oneButton=>{
        oneButton.classList.remove('button-gradient-little');
        oneButton.classList.add('button-white-little');
    })

}