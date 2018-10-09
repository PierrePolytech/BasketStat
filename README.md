# BasketStat


## Joueur

GET /joueurs : Récupere la liste des joueurs 
- URL params : 
  - id=[integer] (required)
- Data params : none
- Success Response : 
  - Code : 200 / Content : {id : 1, nom : Lebron, prenom : James, age : 32, taille: 206}
-Error Response
  - Code : 404 NOT FOUND / Content : { error : "User doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }



