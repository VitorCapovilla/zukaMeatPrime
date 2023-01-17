// - Mostrar/Ocultar Senha
let btn = document.querySelector('.bi-eye')
let btn1 = document.querySelector('.bi-eye-slash')

let btn2 = document.querySelector('.bi-eye')
let btn3 = document.querySelector('.bi-eye-slash')

btn.addEventListener("click", ()=>{
    let inputSenha = document.querySelector("#senha")
        
    if(inputSenha.getAttribute('type') == 'password'){
        inputSenha.setAttribute('type', 'text')

        btn2.setAttribute('style', 'display: none')
        btn3.setAttribute('style', 'display: block')
    }
});

btn.addEventListener("click", ()=>{
    let inputSenha = document.querySelector("#confsenha")
        
    if(inputSenha.getAttribute('type') == 'password'){
        inputSenha.setAttribute('type', 'text')

        btn.setAttribute('style', 'display: none')
        btn1.setAttribute('style', 'display: block')
    }
});

btn1.addEventListener("click", ()=>{
    let inputSenha = document.querySelector("#senha")
        
    if(inputSenha.getAttribute('type') == 'text'){
        inputSenha.setAttribute('type', 'password') 

        btn.setAttribute('style', 'display: block')
        btn1.setAttribute('style', 'display: none')
    }
});

// - Validação
let nome = document.querySelector('#nome')
let errorNome = document.querySelector('.error_nome')
let validNome = false

let sobrenome = document.querySelector('#sobrenome')
let errorSobrenome = document.querySelector('.error_sobrenome')
let validSobrenome = false

let data = document.querySelector('#data')
let errorData = document.querySelector('.error_data')
let validData = false

let cpf = document.querySelector('#cpf')
let errorCpf = document.querySelector('.error_cpf')
let validCpf = false

let telefone = document.querySelector('#telefone')
let errorTelefone = document.querySelector('.error_telefone')
let validTelefone = false

let email = document.querySelector('#email')
let errorEmail = document.querySelector('.error_email')
let validEmail = false

let confemail = document.querySelector('#confemail')
let errorConfemail = document.querySelector('.error_confemail')
let validConfemail = false

let senha = document.querySelector('#senha')
let errorSenha = document.querySelector('.error_senha')
let validSenha = false

let confsenha = document.querySelector('#confsenha')
let errorConfsenha = document.querySelector('.error_confsenha')
let validConfsenha = false

nome.addEventListener('keyup', ()=> {
    if (nome.value.length == 0) {
        nome.style.borderColor = "red"
        errorNome.innerHTML = "Preencha este campo!"
        validNome = false;
    }
    else if (nome.value.length < 3) {
        nome.style.borderColor = "red"
        errorNome.innerHTML = "Insira 3 caracteres no mínimo!"
        validNome = false;
    } else {
        nome.style.borderColor = "green"
        errorNome.innerHTML = ""
        validNome = true;
    }
});

sobrenome.addEventListener('keyup', ()=> {
    if (sobrenome.value.length == 0) {
        sobrenome.style.borderColor = "red"
        errorSobrenome.innerHTML = "Preencha este campo!"
        validSobrenome = false;
    } else {
        sobrenome.style.borderColor = "green"
        errorSobrenome.innerHTML = ""
        validSobrenome = true;
    }
});

data.addEventListener('keyup', ()=> {
    if (isValidDate(data)) {
        data.style.borderColor = "red"
        errorData.innerHTML = "Preencha este campo!"
        validData = false;
    } else {
        data.style.borderColor = "green"
        errorData.innerHTML = ""
        validData = true;
    }
});

cpf.addEventListener('keyup', ()=> {
    if (cpf.value.length == 0) {
        cpf.style.borderColor = "red"
        errorCpf.innerHTML = "Preencha este campo!"
    }
    else if (cpf.value.length < 14) {
        cpf.style.borderColor = "red"
        errorCpf.innerHTML = "Insira um CPF válido!"
    } else {
        cpf.style.borderColor = "green"
        errorCpf.innerHTML = ""
    }
});

telefone.addEventListener('keyup', ()=> {
    if (telefone.value.length == 0) {
        telefone.style.borderColor = "red"
        errorTelefone.innerHTML = "Preencha este campo!"
    }
    else if (telefone.value.length < 14) {
        telefone.style.borderColor = "red"
        errorTelefone.innerHTML = "Insira um telefone válido!"
    } else {
        telefone.style.borderColor = "green"
        errorTelefone.innerHTML = ""
    }
});

email.addEventListener('keyup', ()=> {
    if (email.value.length == 0) {
        email.style.borderColor = "red"
        errorEmail.innerHTML = "Preencha este campo!"
        validEmail = false;
    } else {
        email.style.borderColor = "green"
        errorEmail.innerHTML = ""
        validEmail = true;
    }
});

confemail.addEventListener('keyup', ()=> {
    if (confemail.value.length == 0) {
        confemail.style.borderColor = "red"
        errorConfemail.innerHTML = "Preencha este campo!"
        validConfemail = false;
    }
    else if (email.value != confemail.value) {
        confemail.style.borderColor = "red"
        errorConfemail.innerHTML = "Os e-mails não conferem!"
        validConfemail = false;
    } else {
        confemail.style.borderColor = "green"
        errorConfemail.innerHTML = ""
        validConfemail = true;
    }
});

senha.addEventListener('keyup', ()=> {
    if (senha.value.length == 0) {
        senha.style.borderColor = "red"
        errorSenha.innerHTML = "Preencha este campo!"
        validSenha = false;
    }
    else if (senha.value.length < 8) {
        senha.style.borderColor = "red"
        errorSenha.innerHTML = "A senha deve conter 8 caracteres ou mais!"
        validSenha = false;
    } else {
        senha.style.borderColor = "green"
        errorSenha.innerHTML = ""
        validSenha = true;
    }
});

confsenha.addEventListener('keyup', ()=> {
    if (confsenha.value.length == 0) {
        confsenha.style.borderColor = "red"
        errorConfsenha.innerHTML = "Preencha este campo!"
        validConfsenha = false;
    }
    else if (senha.value != confsenha.value) {
        confsenha.style.borderColor = "red"
        errorConfsenha.innerHTML = "As senhas não conferem!"
        validConfsenha = false;
    } else {
        confsenha.style.borderColor = "green"
        errorConfsenha.innerHTML = ""
        validConfsenha = true;
    }
});

function cadastrar() {
    if(validNome && validSobrenome && validData && validCpf && validTelefone && validEmail && validConfemail && validSenha && validConfsenha){
        console.log("Falhou!");
    } else {
        console.log("Enviar formulário");
    }
}

const fields = document.querySelectorAll("[required")

for(const field of fields) {
    field.addEventListener("invalid", event => {
        // -Eliminar o bubble
        event.preventDefault()      
    })
}
