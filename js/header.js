// for hide and showing the navigation list at right side
    const navSide = document.querySelector('header #main-nav');
    const navBtn = document.querySelector('header .nav-btn');
    const hbef = document.querySelector('.h-before');    
    let show = false;
    
    navSide.style.borderRight = "0";
    hbef.style.width = "0";

    const hideShow = ()=>{
        if(show == false) {
            navSide.setAttribute('style', 'width: 55% !important');
            navSide.style.borderRight = "0.3rem solid #c28f37";
            hbef.style.width = "100%";
            show = true;		
        }
        else{
            hbef.style.width = "0";
            navSide.style.width = "0";
            hbef.style.width = "0";
            navSide.style.borderRight = "0";
            show = false;
	}
    }
    
    navBtn.addEventListener('click',hideShow);
    hbef.addEventListener('click',hideShow);
    
          
        
        
