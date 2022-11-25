
//On récupère tous nos carde show case

let displayCards = document.querySelectorAll('.displayCard')
//on recupere tous les li / les btn pour le filtre avec pour valeur leur id
let btns = document.querySelectorAll('.categorySelect')
//on declare une variable vide qui va nous servire a stocke la valeur des btn clické
let identifier = ''

//on boucle sur les btn pour recupere un par un
btns.forEach((btn)=>{
    // sur chaque btn, on ajouter un ecouteur d'evenement (le click)
    btn.addEventListener('click', ()=>{
        // on le vide l'identifier a chaque nouveau click
        identifier =""
        //on ajoute la valeur de l'id du btn clické dans la variable identifier
        identifier = btn.id
        //on boncle sur nos card (tjr dans le meme evenement) pour les recuperer 
        displayCards.forEach((card)=>{
            console.log("id du btn :", identifier);
            console.log("id de la card :", card.id);
            console.log("La card contient l'id du btn :", card.id.toString().includes(identifier));

            //si l'id du btn n'est pas inclu dans l'id de la carde, la card passe en hidden
            if (!card.id.toString().includes(identifier)) {
                // le tostring permet de consider le card.id comme une chaine de carataire 
                card.classList.add('hidden')
                
            }else{
                card.classList.remove('hidden')
            } 
            console.log(card);
        })
    })
})

window.addEventListener("DOMContentLoaded", () =>{
    const Burger = document.getElementById("BurgerSvg");
    const Menu = document.getElementById('Menu');

    Burger.addEventListener("click", () =>{
        Menu.classList.toggle("hidden");
    })
})