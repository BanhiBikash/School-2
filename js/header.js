// for hide and showing the navigation list at right side

    const contPre = document.querySelectorAll('.contact-info pre');      //second list
    const contact = document.querySelector('.contact-info');      //second list
    const navSide = document.querySelector('header #main-nav');
    const navBtn = document.querySelector('header .nav-btn');
    const hbef = document.querySelector('.h-before');    
    let show = false;
    
    navSide.style.borderRight = "0rem";
    navSide.style.width = "0vw";
    hbef.style.width = "0vw";
    navBtn.style.cursor = 'pointer';
     
    const hideShow = ()=>{
        if(show == false) {
            navSide.style.width = "55vw";
            navSide.style.borderRight = "0.3rem solid #c28f37";
            hbef.style.width = "150vw";
            show = true;
        }
        else{
            navSide.style.borderRight = "0rem";
            navSide.style.width = "0";
            hbef.style.width = "0";
            show = false;
        }
    }
    
    navBtn.addEventListener('click',hideShow);
    hbef.addEventListener('click',hideShow);
          
        
        
