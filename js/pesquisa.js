let pesquisar = document.getElementById('busca');
let pesquisarTel = document.getElementById('buscatel');

pesquisar.addEventListener("keydown", function(event) {
    if (event.key === "Enter") 
    {
        pesquisarData();
    }
});



function pesquisarData()
{
    window.location = 'home.php?busca='+pesquisar.value;
}

//pesquisar telefone


function pesquisarTelData() {
    window.location = 'telefones.php?buscaltel='+pesquisarTel.value;
}