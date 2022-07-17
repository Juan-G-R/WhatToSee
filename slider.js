const slider = document.querySelectorAll('.slider');

const innerSlider = document.querySelectorAll('.slider-inner');

let pressed = false;
let startx;
let x;

//console.log(slider[0]);


for (let i=0; i <= slider.length-1; i++){

    console.log(x);

    slider[i].addEventListener('mousedown', (e)=>{
        pressed= true;
        startx = e.offsetX - innerSlider[i].offsetLeft;
        slider[i].style.cursor = 'grabbing'
    });
    
    slider[i].addEventListener('mouseenter', ()=>{
        slider[i].style.cursor = 'grab'
    });
    
    //slider.addEventListener('mouseLeave', ()=>{
    //    slider.style.cursor = 'default'
    //})
    
    
    slider[i].addEventListener('mouseup', ()=>{
        slider[i].style.cursor = 'grab'
    });
    
    window.addEventListener('mouseup', ()=>{
        pressed = false;
    });
    
    slider[i].addEventListener('mousemove', (e)=>{
        if(!pressed) return;
        e.preventDefault();
    
        x = e.offsetX
    
        innerSlider[i].style.left = `${x - startx}px`; 
    
        checkBorder()
    })
    
    function checkBorder(){
        let outer = slider[i].getBoundingClientRect();
        let inner = innerSlider[i].getBoundingClientRect();
    
        if(parseInt(innerSlider[i].style.left) > 0){
            innerSlider[i].style.left = '0px';
        }else if(inner.right < outer.right){
            innerSlider[i].style.left = `-${inner.width - outer.width}px`
        }
    }
    
    checkBorder()
}


