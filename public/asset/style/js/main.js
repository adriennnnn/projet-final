// // addEventListener(onclick(categories))
// // $likeElement = document.getElementsByName()
// // $showByCtegory = function CaatagorySelected () {
// //     if(){

// //     }
// //     else(){

// //     }
// // }

// window.onload = () => {
    
//     //On récupère la div à afficher
//    let displayDiv = document.querySelectorAll(".tiket-category");

//    //on boucle sur les li catégories
//    document.querySelectorAll("#filtreCat li").forEach(li => {
       
//        li.addEventListener("click", () => {
//            //ici on déclenche l'event
//            //on récupère les données des li
//            var btnId = li.id;
//            var identifier = li.dataset.id

//            displayDiv.forEach(card => {
//                //on récupère l'id de la categorie et/ou du materiaux du produit à afficher
//                if(identifier == 'cat'){
//                    var cardDataCat = card.dataset.categorie;
//                    //Condition pour afficher les card qui nous interessent
                   
//                    displayHide(card, cardDataCat == btnId);
//                }

//            })

//        });
//    });

//    //on boucle sur les li materiaux
//    document.querySelectorAll("#filtreMat li").forEach(li => {
   
//        li.addEventListener("click", () => {
//            //ici on récupère les clic
//            //on récupère les données des li
//            var btnId = li.id;
//            var identifier = li.dataset.id

//            displayDiv.forEach(card => {
//                //on récupère l'id de la categorie et/ou du materiaux du produit à afficher
//                if(identifier == 'mat'){
//                    var cardDataMat = card.dataset.materiaux;
//                    //Condition pour afficher les card qui nous interessent
//                    displayHide(card, cardDataMat == btnId);          
//                }

//            })

//        });
//    });

// }

// function displayHide(card, ifTrue) {
//    if (ifTrue) {
//        card.classList.add('d-flex')
//        card.classList.remove('d-none')
//    } else {
//        card.classList.add('d-none')   
//        card.classList.remove('d-flex')
//    }
// }

//On récupère tous nos li sur lesquelles

function loaded() {
    
    
    const categories = document.querySelector("categorySelect");
console.log(categories);
//On récupère toutes nos cards
const cards = document.querySelectorAll('.displayCard')


//On boucle sur chaque li
document.addEventListener("DOMContentLoaded" , () => {
    console.log("here");
    categories.forEach((category) => {
        
        alert("here two")
        console.log("here two");
        alert("ici aussi")
        console.log(category);
        //on met un event 'click' sur chaque li
        category.addEventListener('click', () => {
            alert('Test')
            //on crée une variable pour stocker la valeur de l'id(html) de chaque li
        let categoryId = category.id
        console.log('Race cliquée : ', category.id)
        //on boucle sur chaque card 
        cards.forEach(card => {
            //on récupère chaque card pour récupérer la valeur de la race dans la card
            const h4dogBreed = card.querySelector('.h4DogBreed')
            console.log('LOL : ', h4dogBreed);
            console.log('identifier :', categoryId, 'Race card :', h4dogBreed.dataset.id);
            //On compare pour chaque card l'id du li et le data-id de la card
            if (categoryId !== h4dogBreed) {
                console.log("Race correspond : suppression classe card");
                //Si l'id du li et le data-id de la card ne correspondent pas, on 
                //supprime la classe card et on ajoute une classe d-none pour la cacher
                card.classList.replace('container', 'd-none')
            }else{
                console.log('La race ne correspond pas');
                card.classList.replace('d-none', 'container')
            }
        }) 
        
    })
})

})

}