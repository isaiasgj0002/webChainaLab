let parallax = document.querySelector('.parallax');
function Scroll(){
    let scrollTop = documentElement.scrollTop;
    parallax.style.transform='translateY(' + scrollTop * -0.3 + 'px)';
}

window.addEventListener('scroll',scrollParallax);