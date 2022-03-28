// for hide and showing the navigation list at right side

    const navSide = document.querySelector('header #main-nav ul.active');
    const navBtn = document.querySelector('header .nav-btn');
    const sideHead = document.querySelector('header #main-nav ul.active::before');
    const hbef = document.querySelector('.h-before');
    let show = false;
    console.log("i m js")
    
    navBtn.style.cursor = 'pointer';

    const hideShow = ()=>{
        if(show == false) {
            hbef.style.display = "block";
            navSide.style.display = "flex";
            navSide.style.flexDirection = "column";
            navSide.style.justifyContent = "flex-start"; 
            navSide.style.placeItems = "center"; 
            show = true;
        }
        else{
            hbef.style.display = "none";
            navSide.style.display = "none";
            show = false;
        }
    }
    
    navBtn.addEventListener('click',hideShow);
    hbef.addEventListener('click',hideShow);
        
        
        
        
