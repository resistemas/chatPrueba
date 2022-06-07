const { default: axios } = require("axios");

const contentMesage = document.getElementById("addMessage");
const identifer = document.getElementById("identifer");
const message = document.getElementById("message");
const btnEnviar = document.getElementById("btnEnviar");

Pusher.logToConsole = true;

var pusher = new Pusher('48ca0bd8a8874507b058', {
    cluster: 'sa1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    if(identifer.value !== ''){
        allMessage(identifer.value);
    } 
});

window.addEventListener('DOMContentLoaded', (event) => {
    if(identifer.value !== ''){
        allMessage(identifer.value);
    }    

});

identifer.addEventListener('change',()=>{
    if(identifer.value !== ''){
        allMessage(identifer.value);
    }
})

identifer.addEventListener('blur',()=>{
    if(identifer.value !== ''){
        allMessage(identifer.value);
    }
})

btnEnviar.addEventListener('click',()=>{
    if(identifer.value == ''){
        errors('danger', 'Ingrese su Nick');
        return false;
    }

    if(message.value == ''){
        errors('danger', 'Ingrese un mensaje para poder enviarlo..');
        return false;
    }

    setData(identifer.value, message.value);
});



const clearData = () =>{
    message.value = '';
};

const setData = (name, message) => {
    console.log(message);
    axios.post('/Chat',{name: name, message: message})
    .then((response)=>{
        if(response.data.status){
            errors('success',response.data.message);
            allMessage(identifer.value);
        }
    })
    .catch((error)=>{
        console.log('Error: '+error);
    })
}

const errors = (type, message) => {
    let error = `<div id="error-a" class="alert alert-${type} alert-dismissible fade show" role="alert">
        <b>${message}</b>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`

    document.getElementById('errors').innerHTML = error;
    setTimeout(() => {
        document.getElementById("error-a").remove();        
    }, 1800);
}

const allMessage = name => {
    axios.post('/Chat/AllMessage',{name: name})
    .then((response)=>{
        if(response.data.status){
            setMesage(response.data.data);            
        }
    })
    .catch((error)=>{
        console.log('Error: '+error);
    })
}

const setMesage = (arr = []) => {
    let html = '';
    let type = 'success text-end';

    arr.forEach(el => {
        type = 'success text-end';
        if(el.usuario !== identifer.value){
            type = 'primary text-start';
        }
        html += `<span class="badge bg-${type} fs-6 mb-3">${el.usuario}: ${el.message}.</span>`;
    });    

    contentMesage.innerHTML = html;
    clearData();    
}