const scrollContainer = document.querySelector("#scroll-horizontal");

scrollContainer.addEventListener("wheel", (evt) => {
    evt.preventDefault();
    console.log(evt)
    scrollContainer.scrollLeft += evt.deltaY*2;
});