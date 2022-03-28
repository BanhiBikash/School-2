let upDate = document.querySelector(".notice-container .notice-content .notice .upload-date");
let noticeElement = document.querySelector(".notice-container .notice-content .notice");
var btn = document.querySelector("button");
    let noticeCont = document.querySelector('div.notice-content');      //second list

    let id;
    // var num = 0;
    let paused = false;

    const anim = ()=>{ id = setInterval(()=>{
        noticeCont.scrollBy(0,6);
    },100)};  
    
    function listeners(num){        
        if(paused == false) {
            anim();

            noticeCont.addEventListener("mouseover", ()=>{
                clearInterval(id);
            });

            paused = true;
        }
        else{
            noticeCont.addEventListener("mouseout",()=>{ id = setInterval(()=>{
                noticeCont.scrollBy(0,6);
            },100)});

            paused = false;
        }
        
        console.log(num);
        
        if(num > 0) {
            listeners();
            num--;
        }         
    }
    
    listeners(500);