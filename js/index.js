//-----------------------------notice----------------------------------------------
let upDate = document.querySelector(".notice-container .notice-content .notice .upload-date");
let noticeElement = document.querySelector(".notice-container .notice-content .notice");
var btn = document.querySelector("button");
let noticeCont = document.querySelector('div.notice-content'); //second list

let id;
// var num = 0;
let paused = false;

const anim = () => {
    id = setInterval(() => {
        noticeCont.scrollBy(0, 6);
    }, 100)
};

function listeners(num) {
    if (paused == false) {
        anim();

        noticeCont.addEventListener("mouseover", () => {
            clearInterval(id);
        });

        paused = true;
    } else {
        noticeCont.addEventListener("mouseout", () => {
            id = setInterval(() => {
                noticeCont.scrollBy(0, 6);
            }, 100)
        });

        paused = false;
    }

    console.log(num);

    if (num > 0) {
        listeners();
        num--;
    }
}

listeners(500);

//----------------------------------------achievers------------------------------

//'ul'container where items 'boxes' are placed
let itemCont = document.querySelector('#achieve #autoWidth');
let leftArrow = document.querySelector('#achieve #left-arrow');
let rightArrow = document.querySelector('#achieve #right-arrow');
let previousTimeStamp;
let speed = 80;
id = '';

function step(timestamp) {

    //for continous animation effect
    id = window.requestAnimationFrame(step);

    // lasttimestamp pr paint aur  currenttimestamp pr paint hone tk mai kitna time lagega in milli-sec
    if (((timestamp - previousTimeStamp) / 1000) < 1 / speed) {
        return;
    }

    itemCont.scrollBy(3, 0);

    if (itemCont.offsetWidth + itemCont.scrollLeft >= itemCont.scrollWidth) {
        console.log('scrolled to bottom')
        itemCont.scrollLeft = 0;
    }

    previousTimeStamp = timestamp;
}

id = window.requestAnimationFrame(step);

itemCont.addEventListener('mouseover', () => {
    window.cancelAnimationFrame(id);
})

itemCont.addEventListener('mouseout', () => {
    id = window.requestAnimationFrame(step);
})

leftArrow.addEventListener('click', () => {
    itemCont.scrollBy(-500, 0);
    window.cancelAnimationFrame(id);
})

rightArrow.addEventListener('click', () => {
    itemCont.scrollBy(500, 0);
    window.cancelAnimationFrame(id);
})