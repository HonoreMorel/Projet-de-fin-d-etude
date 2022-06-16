document.getElementById('research').addEventListener('click', openResearch);
// document.querySelector('#recherche .close-button').addEventListener('click', closeResearch);
const recherche = document.getElementById('root');
const overlay2 = document.getElementById('overlay')

function openResearch () {

    overlay2.classList.add('active')
    recherche.classList.add('active');
}

function closeResearch () {
    
    recherche.classList.remove('active');
}

overlay2.addEventListener('click', () => {
    recherche.classList.remove('active');
    overlay2.classList.remove('active')
})