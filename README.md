# BasketStat

Documentation de l'API REST de l'application

## Joueur

### GET /joueurs : Récupere la liste des joueurs 
- URL params : none
- Data params : none
- Success Response : 
  - Code : 200 / Content : {id : 1, nom : Lebron, prenom : James, age : 32, taille: 206}, {id : 2, nom : Durant, prenom : Kevin, age : 32, taille: 206}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "No player was found" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }
  
### GET /joueur/:id : Récupere les informations du joueur  
- URL params : 
  - id=[integer] (required)
- Data params : none
- Success Response : 
  - Code : 200 / Content : {id : 1, nom : Lebron, prenom : James, age : 32, taille: 206}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Player doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }

### POST /joueur : Crée un joueur 
- URL params : none
- Data params :
  - nom = [String] (required)
  - prenom = [String] (required)
  - age = [int] (optional)
  - taille = [int] (optional)
- Success Response : 
  - Code : 200 / Content : {message : Player created}
- Error Response
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }

### DELETE /joueur/:id : Supprime le joueur 
- URL params : 
  - id=[integer] (required)
- Data params : none
- Success Response : 
  - Code : 200 / Content : {message : Player Deleted}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Player doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }
  
### PATCH /joueur/:id : MAJ des informations du joueur
- URL params : 
  - id=[integer] (required)
- Data params :
  - nom = [String] (optional)
  - prenom = [String] (optional)
  - age = [int] (optional)
  - taille = [int] (optional)
- Success Response : 
  - Code : 200 / Content : {message : Player patched}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Player doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }
  
### UPDATE /joueur/:id : MAJ des informations du joueur
- URL params : 
  - id=[integer] (required)
- Data params :
  - nom = [String] (optional)
  - prenom = [String] (optional)
  - age = [int] (optional)
  - taille = [int] (optional)
- Success Response : 
  - Code : 200 / Content : {message : Player updated}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Player doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }  
  


## Equipe

### GET /equipes : Récupere la liste des equipes 
- URL params : none
- Data params : none
- Success Response : 
  - Code : 200 / Content : {id : 1, nomEquipe : Lamboisière Martin Basket}, {id : 2, nomEquipe : Beaucouzé Basket}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "No team was found" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }
  
### GET /equipe/:id : Récupere les informations de l'equipe  
- URL params : 
  - id=[integer] (required)
- Data params : none
- Success Response : 
  - Code : 200 / Content : {id : 1, nom : Lebron, prenom : James, age : 32, taille: 206}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Team doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }

### POST /equipe : Crée une equipe 
- URL params : none
- Data params :
  - nomEquipe = [String] (required)
- Success Response : 
  - Code : 200 / Content : {message : Team created}
- Error Response
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }

### DELETE /equipe/:id : Supprime l'equipe
- URL params : 
  - id=[integer] (required)
- Data params : none
- Success Response : 
  - Code : 200 / Content : {message : Team Deleted}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Team doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }
  
### PATCH /equipe/:id : MAJ des informations de l'equipe
- URL params : 
  - id=[integer] (required)
- Data params :
  - nomEquipe = [String] (optional)
- Success Response : 
  - Code : 200 / Content : {message : Team patched}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Team doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }
  
### UPDATE /equipe/:id : MAJ des informations du joueur
- URL params : 
  - id=[integer] (required)
- Data params :
  - nomEquipe = [String] (optional)
- Success Response : 
  - Code : 200 / Content : {message : Team updated}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Team doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }  
  

## Club

### GET /clubs : Récupere la liste des clubs 
- URL params : none
- Data params : none
- Success Response : 
  - Code : 200 / Content : {id : 1, nomClub : Lamboisière Martin Basket}, {id : 2, nomClub : Beaucouzé Basket}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "No club was found" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }
  
### GET /club/:id : Récupere les informations de l'equipe  
- URL params : 
  - id=[integer] (required)
- Data params : none
- Success Response : 
  - Code : 200 / Content : {id : 1, nom : Lebron, prenom : James, age : 32, taille: 206}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Club doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }

### POST /club : Crée une equipe 
- URL params : none
- Data params :
  - nomClub = [String] (required)
- Success Response : 
  - Code : 200 / Content : {message : Club created}
- Error Response
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }

### DELETE /club/:id : Supprime l'equipe
- URL params : 
  - id=[integer] (required)
- Data params : none
- Success Response : 
  - Code : 200 / Content : {message : Club Deleted}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Team doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }
  
### PATCH /club/:id : MAJ des informations de l'equipe
- URL params : 
  - id=[integer] (required)
- Data params :
  - nomClub = [String] (optional)
- Success Response : 
  - Code : 200 / Content : {message : Club patched}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Team doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }
  
### UPDATE /club/:id : MAJ des informations du joueur
- URL params : 
  - id=[integer] (required)
- Data params :
  - nomClub = [String] (optional)
- Success Response : 
  - Code : 200 / Content : {message : Club updated}
- Error Response
  - Code : 404 NOT FOUND / Content : { error : "Team doesn't exist" }
  - Code : 401 UNAUTHORIZED / Content : { error : "You are unauthorized to make this request." }  
