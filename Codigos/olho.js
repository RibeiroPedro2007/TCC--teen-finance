function togglePasswordVisibility() {
    // Seleciona o campo de senha e o ícone de olho
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('showPasswordBtn');
    
    // Verifica se o tipo do campo de senha é "password"
    if (passwordField.type === 'password') {
        passwordField.type = 'text';  // Torna a senha visível
        eyeIcon.src = '../imagens/eye.svg';  // Troca o ícone para o olho aberto
    } else {
        passwordField.type = 'password';  // Torna a senha invisível
        eyeIcon.src = '../imagens/eye-slash.svg';  // Troca o ícone para o olho fechado
    }
}
