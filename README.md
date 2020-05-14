
# Comment utiliser l'api en local

### Pré requis :
- cloner le repo
- `cd trocal_api`
- `composer install`
- créer un fichier `.env` à partir du fichier `.env.example` à la racine du projet
à modifier :
```
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=[VOTRE PORT]
    DB_DATABASE=api_trocal
    DB_USERNAME=[VOTRE USERNAME DATABASE (root)]
    DB_PASSWORD=[VOTRE MDP DATABASE]
```

- Créer la base de donnée `api_trocal`
- Importer le fichier `bdd_sql.sql` dans votre base
- Démarrer serveur (via mamp ou autre)
- Se connecter afin d'obtenir un token (via [l'endpoint de login](#auth))
	- ❗️Utiliser l'utilisateur 1 (Madeleine Yu) dont les credentials sont disponibles dans les fixtures du projet
- Ajouter un header `Authorization` à chacune des requêtes avec pour valeur `Bearer [token]`

# Documentation API
🔑 [Authentication](#auth)

🔮 [Objects](#objects)

🧳 [Placards](#placards)

🔁 [Transactions](#transactions)

😎 [Users](#users)

✅ [Evaluations](#evaluations)

<a id="auth"></a>
## Authentication

- **Login :** POST `/api/auth/login` :
	- Body de la requête de login :
	```
	{
		"email": [email du user],
		"password": [password du user]
	}
	```
	- Exemple de la réponse (JSON) :
	```
	{

		"access_token": "eyJ0eXAiOiJKV1QiLCJhb[...]YjA0NzU0NmFhIn0.5bOxCR2meQdMZYVgbKbw0Bh0ORmgP7BRhbBQkYqP7GU",
		"token_type": "bearer",
		"expires_in": 0

	}
	```
<a id="objects"></a>
## Objects

- **Récupérer un objet d'un user:** GET `/api/users/{userId}/object/{objectId}`
	- Exemple de la réponse (JSON):
	```
	{
	    "id": 2,
	    "user_id": 1,
	    "title": "Pull en laine blanc cassé",
	    "description": "J'ai tricotté ce pull parmi une dizaine d'autres l'hiver dernier mais je ne l'ai porté qu'une seule fois.",
	    "key_words": "pull,laine,tricot,hiver",
	    "category": "clothes",
	    "photo": "https://res.cloudinary.com/dd1g42791/image/upload/v1547129698/clothing-3831823_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547129697/fabric-3709238_1280.jpg",
	    "state": "available",
	    "created_at": "2019-01-10 14:54:20",
	    "updated_at": null,
      "user": {
        "id": 1,
        "first_name": "Madeleine",
        "last_name": "Yu",
        "avatar": "https://res.cloudinary.com/dd1g42791/image/upload/v1548771920/photo-1534382929438-1becd923b203.jpg"
    }
	}
	```

- **Chercher un objet :** GET `/api/objects/research?zone=94&key_words=tricot&category=clothes`
	- Les résultats sont paginés par 10
	- la zone doit toujours être renseignée
	- Exemple de réponse (JSON) :
	```
	{
	    "current_page": 1,
	    "data": [
	        {
	            "id": 2,
	            "user_id": 1,
	            "title": "Pull en laine blanc cassé",
	            "description": "J'ai tricotté ce pull parmi une dizaine d'autres l'hiver dernier mais je ne l'ai porté qu'une seule fois.",
	            "key_words": "pull,laine,tricot,hiver",
	            "category": "clothes",
	            "zone": 94,
	            "photo": "https://res.cloudinary.com/dd1g42791/image/upload/v1547129698/clothing-3831823_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547129697/fabric-3709238_1280.jpg",
	            "state": "available",
	            "created_at": "2019-01-10 14:54:20",
	            "updated_at": null
	        }
	    ],
	    "first_page_url": "http://localhost/api_trocal/trocal_api/api/objects/research?page=1",
	    "from": 1,
	    "last_page": 1,
	    "last_page_url": "http://localhost/api_trocal/trocal_api/api/objects/research?page=1",
	    "next_page_url": null,
	    "path": "http://localhost/api_trocal/trocal_api/api/objects/research",
	    "per_page": 10,
	    "prev_page_url": null,
	    "to": 1,
	    "total": 1
	}
	```

- **Créer un object:** POST `/api/objects`
	- Exemple corps de la requête (JSON):
		```
		{
		    "user_id": 1,
		    "title": "Pull en laine blanc cassé",
		    "description": "J'ai tricotté ce pull parmi une dizaine d'autres l'hiver dernier mais je ne l'ai porté qu'une seule fois.",
		    "key_words": "pull,laine,tricot,hiver",
		    "category": "clothes",
		    "zone": 78,
		    "photo": "https://res.cloudinary.com/dd1g42791/image/upload/v1547129698/clothing-3831823_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547129697/fabric-3709238_1280.jpg",
		    "state": "available"
		}
		```
	- Exemple de la réponse (JSON):
	```
	{
	    "id": 2,
	    "user_id": 1,
	    "title": "Pull en laine blanc cassé",
	    "description": "J'ai tricotté ce pull parmi une dizaine d'autres l'hiver dernier mais je ne l'ai porté qu'une seule fois.",
	    "key_words": "pull,laine,tricot,hiver",
	    "category": "clothes",
	    "zone": 78,
	    "photo": "https://res.cloudinary.com/dd1g42791/image/upload/v1547129698/clothing-3831823_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547129697/fabric-3709238_1280.jpg",
	    "state": "available",
	    "created_at": "2019-01-10 14:54:20",
	    "updated_at": "2019-01-10 14:54:20"
	}
	```


 - **Mettre à jour un object:** PUT `/api/objects/{objectId}`
- Exemple corps de la requête (JSON):
		```
		{
		    "title": "Pull en cachemire",		 
		    "key_words": "pull,cachemire,tricot,hiver"
		}
		```
	- Exemple de la réponse (JSON):
	```
	{
	    "id": 2,
	    "user_id": 1,
	    "title": "Pull en cachemire",
	    "description": "J'ai tricotté ce pull parmi une dizaine d'autres l'hiver dernier mais je ne l'ai porté qu'une seule fois.",
	    "key_words": "pull,cachemire,tricot,hiver",
	    "category": "clothes",
	    "zone": 78,
	    "photo": "https://res.cloudinary.com/dd1g42791/image/upload/v1547129698/clothing-3831823_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547129697/fabric-3709238_1280.jpg",
	    "state": "available",
	    "created_at": "2019-01-10 14:54:20",
	    "updated_at": "2019-01-10 14:54:20"
	}
	```

 - **Supprrimer un object:** DELETE `/api/objects/{objectId}`
	- Exemple de la réponse (JSON):
		```
		{
		    "success": true
		}
		```


<a id="placards"></a>
## Placards
-   **Afficher le placard d’une personne :** GET `/api/users/{userId}/objects`
	- Les résultats sont paginés par 10
	- Exemple de la réponse (JSON) :
	```
	{
	  "current_page": 1,
	  "first_page_url": ".../api/users/1/objects?page=1",
	  "from": 1,
	  "last_page": 1,
	  "last_page_url": ".../api/users/1/objects?page=1",
	  "next_page_url": null,
	  "path": ".../api/users/1/objects",
	  "per_page": 10,
	  "prev_page_url": null,
	  "to": 2,
	  "total": 2,
	  "data": [
		    {
		        "id": 2,
		        "user_id": 1,
		        "title": "Pull en laine blanc cassé",
		        "description": "J'ai tricotté ce pull parmi une dizaine d'autres l'hiver dernier mais je ne l'ai porté qu'une seule fois.",
		        "key_words": "pull,laine,tricot,hiver",
		        "category": "clothes",
		        "photo": "https://res.cloudinary.com/dd1g42791/image/upload/v1547129698/clothing-3831823_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547129697/fabric-3709238_1280.jpg",
		        "state": "available",
		        "created_at": "2019-01-10 14:54:20",
		        "updated_at": null
		    },
		    {
		        "id": 4,
		        "user_id": 1,
		        "title": "Paire de Timberland basse T 43",
		        "description": "Paire de Timberland en cuir taille 43. Portées deux fois et encore en parfait état.\r\nJ'ai encore la boîte si vous le souhaitez.",
		        "key_words": "chaussures, cuir, timberland, marron",
		        "category": "clothes",
		        "photo": "https://res.cloudinary.com/dd1g42791/image/upload/v1547211343/leather-shoes-505338_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547211343/shoes-505341_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547211343/shoelace-505344_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547211343/shoe-505365_1280.jpg",
		        "state": "available",
		        "created_at": "2019-01-11 13:56:18",
		        "updated_at": null
		    }
		]
	}
	```

<a id="transactions"></a>
## Transactions

-   **Afficher toutes les transactions d'un user :** GET `/api/users/{userId}/transactions`

	- Exemple de la réponse (JSON) :
	```
	[
	    {
	        "id": 1,
	        "buyer_id": 1,
	        "seller_id": 2,
	        "buyer_object": null,
	        "seller_object": {
                "id": 2,
                "title": "Pull beige",
                "photo": "http://blabla.com"
            },
	        "state": "pending",
	        "alternative_message": null,
	        "created_at": "2019-03-11 13:53:53",
	        "updated_at": null
	    },
	    {
	        "id": 1,
	        "buyer_id": 3,
	        "seller_id": 2,
	        "buyer_object": {
                "id": 2,
                "title": "Pull beige",
                "photo": "http://blabla.com"
            },
	        "seller_object": {
                "id": 2,
                "title": "Pull beige",
                "photo": "http://blabla.com"
            },
	        "state": "accepted",
	        "alternative_message": null,
	        "created_at": "2019-03-11 13:53:53",
	        "updated_at": null
	    }
	]
	```

-   **Afficher les transactions d'un user selon l'état :** GET `/api/users/{userId}/transactions?state={pending/accepted/completed/aborted}`

	- Exemple de la réponse (JSON) :
	```
	[
	    {
	        "id": 1,
	        "buyer_id": 1,
	        "seller_id": 2,
	        "buyer_object_id": 3,
	        "seller_object_id": 4,
	        "state": "pending",
	        "alternative_message": null,
	        "created_at": "2019-03-11 13:53:53",
	        "updated_at": null
	    }
	]
	```

- **Créer une transaction:** POST `/api/transactions`
	- Exemple corps de la requête (JSON):
		```
		{
		    "buyer_id": 1,
		    "seller_id": 2,
		    "seller_object_id": 1,
		    "state": "pending"
		}
		```
	- Exemple de la réponse (JSON):
	```
	{
	    "id": 2,
	    "buyer_id": 1,
	    "seller_id": 2,
	    "buyer_object_id": null,
	    "seller_object_id": 1,
	    "state": "pending",
	    "alternative_message": null,
	    "created_at": "2019-03-12 09:19:31",
	    "updated_at": "2019-03-12 09:19:31"
	}
	```


 - **Mettre à jour une transaction:** PUT `/api/transactions/{transactionId}`
 	- Paramètres modifiables : "buyer_object_id", "state", "alternative_message"
	- Exemple corps de la requête (JSON):
		```
		{
		    "buyer_object_id": 6,		 
		    "state": "accepted"
		}
		```
	- Exemple de la réponse (JSON):
	```
	{
	    "id": 2,
	    "buyer_id": 1,
	    "seller_id": 2,
	    "buyer_object_id": 6,
	    "seller_object_id": 1,
	    "state": "accepted",
	    "alternative_message": null,
	    "created_at": "2019-03-12 09:19:31",
	    "updated_at": "2019-03-14 10:15:09"
	}
	```

<a id="users"></a>
## Users

- **Créer un user:** POST `/api/register`
	- Seules les variables "phone", "bio", et "avatar" peuvent être nulles
	- Exemple corps de la requête (JSON):
		```
		{
			"first_name": "laura",
			"last_name": "deubois",
			"email": "laura.dubois@hotmail.com",
			"password": "monpassword",
			"phone":"",
			"bio":"",
			"avatar":"",
			"post_code":"78140"
		}
		```
	- Exemple de la réponse (JSON):
	```
	{
    "id": 10,
    "first_name": "laura",
    "last_name": "deubois",
    "email": "laura.dubois@hotmail.com",
    "email_verified_at": null,
    "phone": "",
    "bio": "",
    "avatar": "",
    "post_code": "78140",
    "zone": "78",
    "note": null,
    "created_at": "2019-03-15 09:25:02",
    "updated_at": "2019-03-15 09:25:02"
}
	```
- **Afficher un user:** GET `/api/users/{userId}`
	- Exemple de la réponse (JSON):
	```
	{
	    "id": 1,
	    "first_name": "Madeleine",
	    "last_name": "Yu",
	    "email": "madeleine.yu@gmail.com",
	    "email_verified_at": null,
	    "phone": "0600667788",
	    "bio": "J'adore l'espace et les étoiles.",
	    "avatar": "https://res.cloudinary.com/dd1g42791/image/upload/v1548771920/photo-1534382929438-1becd923b203.jpg",
	    "post_code": "77500",
	    "zone": "77",
	    "note": 8,
	    "created_at": "2019-01-29 13:50:54",
	    "updated_at": "2019-01-29 13:50:54"
	}
	```

 - **Supprimer un user:** DELETE `/api/users/{objectId}`
	- Exemple de la réponse (JSON):
		```
		{
		    "success": true
		}
		```

<a id="evaluations"></a>
## Evaluations

- **Créer une évaluation :** POST `/api/evaluations`
	- Exemple corps de la requête (JSON):
		```
		{
			"assessor_id": 4,
			"evaluated_id": 2,
			"transaction_id": 2,
			"message": "en retard au rendez-vous",
			"note":4
		}
		```
	- Exemple de la réponse (JSON):
	```
	{
	    "id": 3,
	    "assessor_id": 4,
	    "evaluated_id": 2,
	    "transaction_id": 2,
	    "message": "en retard au rendez-vous",
	    "note": 4,
	    "created_at": "2019-03-15 14:53:47",
	    "updated_at": "2019-03-15 14:53:47"
	}
	```
- **Afficher les évaluations d'un user:** GET `/api/users/{userId}/evaluations`
	- Exemple de la réponse (JSON):
	```
	[
	    {
	        "id": 1,
	        "assessor_id": 2,
	        "evaluated_id": 1,
	        "transaction_id": 2,
	        "message": "Très bien",
	        "note": 5,
	        "created_at": "2019-03-14 11:39:43",
	        "updated_at": null
	    }
	]
	```
