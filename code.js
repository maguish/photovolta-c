window.onload = () => {
  const tabs =document.querySelectorAll('.tab');
  const contenus =document.querySelectorAll('.contenu');
  let actif =document.querySelector('.actif');
  let target = actif.dataset.target;



  affiche();


  //on affiche le contenu de l'onglet actif
  document.querySelector(target).classList.add('show');



  /*pour gérer le changement d'affichage*/
  function affiche() {
      //on boucle sur tous les onglets
      for (let tab of tabs) {
          //on vérifie si l'onglet est actif
          if (tab !== actif) {
              tab.addEventListener('click',tabclick);
              //retirer la classe actif à tous les autres Onglets
              tab.classList.remove('actif');
          }
      }

      //on boucle sur les contenus
      for (let contenu of contenus) {
          contenu.classList.remove('show');
      }
  }


    function tabclick() {
        //on récupère le target de l'onglet sur lequel on clique
        target = this.dataset.target;
        //l'onglet actif devient celui sur lequel on vient de cliquer
        actif = this;
        this.classList.add('actif');
        this.removeEventListener('click',tabclick);

        //on affiche le bon onglet
        affiche();

        //on affiche le contenu correspondant
        document.querySelector(target).classList.add('show');
    }

}
