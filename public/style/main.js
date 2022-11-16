// addEventListener(onclick(categories))
// $likeElement = document.getElementsByName()
// $showByCtegory = function CaatagorySelected () {
//     if(){

//     }
//     else(){

//     }
// }

window.onload = () => {
    
    //On récupère la div à afficher
   let displayDiv = document.querySelectorAll(".tiket-category");

   //on boucle sur les li catégories
   document.querySelectorAll("#filtreCat li").forEach(li => {
       
       li.addEventListener("click", () => {
           //ici on déclenche l'event
           //on récupère les données des li
           var btnId = li.id;
           var identifier = li.dataset.id

           displayDiv.forEach(card => {
               //on récupère l'id de la categorie et/ou du materiaux du produit à afficher
               if(identifier == 'cat'){
                   var cardDataCat = card.dataset.categorie;
                   //Condition pour afficher les card qui nous interessent
                   
                   displayHide(card, cardDataCat == btnId);
               }

           })

       });
   });

   //on boucle sur les li materiaux
   document.querySelectorAll("#filtreMat li").forEach(li => {
   
       li.addEventListener("click", () => {
           //ici on récupère les clic
           //on récupère les données des li
           var btnId = li.id;
           var identifier = li.dataset.id

           displayDiv.forEach(card => {
               //on récupère l'id de la categorie et/ou du materiaux du produit à afficher
               if(identifier == 'mat'){
                   var cardDataMat = card.dataset.materiaux;
                   //Condition pour afficher les card qui nous interessent
                   displayHide(card, cardDataMat == btnId);          
               }

           })

       });
   });

}

function displayHide(card, ifTrue) {
   if (ifTrue) {
       card.classList.add('d-flex')
       card.classList.remove('d-none')
   } else {
       card.classList.add('d-none')   
       card.classList.remove('d-flex')
   }
}