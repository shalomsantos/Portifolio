const apresentacao = document.querySelector('.apresentacao');
const skills = document.querySelector('.skills');
const repositorios = document.querySelector('.repositorios');
const contatos = document.querySelector('.contatos');

function selectPage(name){
    if(name == 'home'){
        apresentacao.style.display = 'block';
        skills.style.display = 'none';
        repositorios.style.display = 'none';
        contatos.style.display = 'none';
    }else if(name == 'skills'){
        apresentacao.style.display = 'none';
        skills.style.display = 'block';
        repositorios.style.display = 'none';
        contatos.style.display = 'none';
    }else if(name == 'repositorios'){
        apresentacao.style.display = 'none';
        skills.style.display = 'none';
        repositorios.style.display = 'block';
        contatos.style.display = 'none';
    }else {
        apresentacao.style.display = 'none';
        skills.style.display = 'none';
        repositorios.style.display = 'none';
        contatos.style.display = 'block';
    }
    // skills.style.display = 'block';
}
