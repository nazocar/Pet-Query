const passShow=(a)=>{
    let box = document.querySelector('#password')
    if (box.type == "password"){
        box.setAttribute("type", "text");
        a.style.color = '#4287f5';
    } else {
        box.setAttribute("type", "password");
        a.style.color = 'gray';
    }
}

const confShow=(a)=>{
    let box = document.querySelector('#confpassword')
    if (box.type == "password"){
        box.setAttribute("type", "text");
        a.style.color = '#4287f5';
    } else {
        box.setAttribute("type", "password");
        a.style.color = 'gray';
    }
}

function confirmarsenha(){

    senha1 = document.getElementById('password').value
    senha2 = document.getElementById('confpassword').value
    senha3 = ''
    if ((senha1 == senha2) & (senha1 != '')){
        document.getElementById('confpassword').style.border = 'solid 2px green'
        document.getElementById('criar').disabled = false;
    }
    else{
        document.getElementById('confpassword').style.border = 'solid 2px red'
        document.getElementById('criar').disabled = true;
    }
}