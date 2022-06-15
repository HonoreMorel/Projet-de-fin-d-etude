let ppbutton = document.getElementById("button-video");
ppbutton.addEventListener("click", playPause);

let imgsource = document.getElementById('video-pp');

let myVideo = document.getElementById("background-video");
function playPause() { 
    if (myVideo.paused) {
        myVideo.play();
        imgsource.src="/images/pause.png"
        }
    else  {
        myVideo.pause(); 
        imgsource.src="/images/play.png"
        }
}

//const sliders = ['Photo.png', 'Photo1.png', 'Photo2.png', 'Photo3.png'];

let positionSlider = 0;

let indicators  =document.querySelectorAll ('.desactive');
let videoSliders = document.querySelectorAll ('.carousel-item');

let nextbutton = document.querySelector('.carousel-control-next-icon');
nextbutton.addEventListener('click', nextSlide);

let previousbutton = document.querySelector('.carousel-control-prev-icon');
previousbutton.addEventListener('click', previousSlide);


function nextSlide (event){
event.preventDefault();
  videoSliders[positionSlider].classList.remove('active');
  indicators[positionSlider].classList.remove('active');

  if (positionSlider == videoSliders.length-1){
      positionSlider = 0;
  }else{
    
    positionSlider++;
    
  }
  videoSliders[positionSlider].classList.add('active');
  indicators[positionSlider].classList.add('active');

  //videoSlider.src = "/images/" + sliders[positionSlider];
}

function previousSlide (event){
event.preventDefault();
  videoSliders[positionSlider].classList.remove('active');
  indicators[positionSlider].classList.remove('active');

  if (positionSlider == 0){
      positionSlider = videoSliders.length-1;
  }else{
    
    positionSlider--;
    
  }
  videoSliders[positionSlider].classList.add('active');
  indicators[positionSlider].classList.add('active');

  //videoSlider.src = "/images/" + sliders[positionSlider];
}