function cli(){
    document.getElementById('list_cli').style.display = 'block';
    document.getElementById('list_ani').style.display = 'none';
    document.getElementById('list_agend').style.display = 'none';
}

function ani(){
    document.getElementById('list_cli').style.display = 'none';
    document.getElementById('list_ani').style.display = 'block';
    document.getElementById('list_agend').style.display = 'none';
}

function agend(){
    document.getElementById('list_cli').style.display = 'none';
    document.getElementById('list_ani').style.display = 'none';
    document.getElementById('list_agend').style.display = 'block';
}

function searchcli(){
    let filter = document.getElementById('searchcli').value.toUpperCase();

    let cli = document.querySelectorAll('.cli');
    
    let l = document.getElementsByTagName('h5');

    for (let i = 0; i <= l.length; i++){
        let a=cli[i].getElementsByTagName('h5')[0];

        let value = a.innerHTML || a.innerText || a.textContent;

        if(value.toUpperCase().indexOf(filter) > -1){
            cli[i].style.display="";
            document.getElementById('noresultcli').innerText = "";
        } else {
            cli[i].style.display="none";
            document.getElementById('noresultcli').innerText = "Nenhum resultado foi encontrado."
        }
    }
}

function searchani(){
    let filter = document.getElementById('searchani').value.toUpperCase();

    let ani = document.querySelectorAll('.ani');
    
    let l = document.getElementsByTagName('h5');

    for (let i = 0; i <= l.length; i++){
        let a=ani[i].getElementsByTagName('h5')[0];

        let value = a.innerHTML || a.innerText || a.textContent;

        if(value.toUpperCase().indexOf(filter) > -1){
            ani[i].style.display="";
            document.getElementById('noresultani').innerText = "";
        } else {
            ani[i].style.display="none";
            document.getElementById('noresultani').innerText = "Nenhum resultado foi encontrado."
        }
    }
}

function searchagend(){
    let filter = document.getElementById('searchagend').value.toUpperCase();

    let agend = document.querySelectorAll('.agend');
    
    let l = document.getElementsByTagName('h6');

    for (let i = 0; i <= l.length; i++){
        let a=agend[i].getElementsByTagName('h6')[0];

        let value = a.innerHTML || a.innerText || a.textContent;

        if(value.toUpperCase().indexOf(filter) > -1){
            agend[i].style.display="";
            document.getElementById('noresultagend').innerText = "";
            document.getElementById('btnrelatorio').style.display = "block";
        } else {
            agend[i].style.display="none";
            document.getElementById('noresultagend').innerText = "Nenhum resultado foi encontrado."
            document.getElementById('btnrelatorio').style.display = "none";
        }
    }
}