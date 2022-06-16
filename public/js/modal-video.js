const buttonsVideoModal = document.querySelectorAll('[data-target]')
const iFrameBlock = document.querySelector('iframe')

buttonsVideoModal.forEach(button => {
  button.addEventListener('click', () => {
    iFrameBlock.src = button.dataset.src
  })
})


