// navigation rsponsivity
const navSlide = () => {
    const fa_bars = document.querySelector('.fa-bars');
    const navul= document.querySelector('.ulinks');

    fa_bars.addEventListener('click',()=>{
        navul.classList.toggle('ulinks-active');
    });
}
navSlide(); 