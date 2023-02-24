const formateur= document.querySelectorAll('.formateurs');
const datedeb= document.querySelectorAll('.datedeb');
const datefin= document.querySelectorAll('.datefin');
const format= document.querySelector('#form');
const hidden = document.querySelectorAll('.hidde');
function tri() {
    for (let i = 0; i < formateur.length; i++) {
        if(hidden[i].value.split("_").includes(format.value)){
            formateur[i].disabled = false;
            datedeb[i].disabled = false;
            datefin[i].disabled = false;
//si les input contient la valeur de l'option il s'active
        }else{
            formateur[i].disabled = true
            datedeb[i].disabled = true;
            datefin[i].disabled = true;
            if(formateur[i].checked==true){
                formateur[i].checked=false;
            }
//sinon elle se désactive
        }
    }
}
tri();
//la fonction s'active au chargement de la page
format.addEventListener('input',tri);
//le select a un event qui s'active a chaque changement