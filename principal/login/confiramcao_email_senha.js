function confirmacaoEmail() {
    var email = document.getElementById("email");
    var confEmail = document.getElementById("confemail");

    if (email.value != confEmail.value) {
        confmEmail.setCustomValidity("Os campos de e-mail não correspondem. Por favor, tente novamente.");
    } else {
        confEmail.setCustomValidity("");
    }
}

function confirmaSenha() {
    var senha = document.getElementById("senha");
    var confSenha = document.getElementById("confsenha");

    if (senha.value != confSenha.value) {
        confSenha.setCustomValidity("Os campos de senha não correspondem. Por favor, tente novamente.");
    } else {
        confSenha.setCustomValidity("");
    }
}


