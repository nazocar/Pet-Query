const passShow=(a)=>{
    let box = document.querySelector('#senhalogin')
    if (box.type == "password"){
        box.setAttribute("type", "text");
        a.style.color = '#4287f5';
    } else {
        box.setAttribute("type", "password");
        a.style.color = 'gray';
    }
}