//esconder senha form1
const input = document.querySelector('.campoSenha');
const incon = document.querySelector('.svgSenha');


incon.addEventListener('click', function(){
{
    if(input.type === 'password') {
        input.type = 'text';
        incon.src = './image/senhaSvg/eye-off.svg';
        
    }
    else{
        input.type = 'password';
        incon.src = './image/senhaSvg/eye .svg';
    }
}
})

