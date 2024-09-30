## Notebook
Vous trouverez mon travail dans le fichier `webia.ipynb`. 

## Api

Je n'ai pas eu le temps de faire fonctionner les prédictions avec l'api mais voici comment démarrer l'app vue et symfony:

Dans le dossier `vueapp`; lancer la commande: 
```bash
npm run serve
```

Dans le dossier `_ms-template`, lancer la commande: 
```bash
docker compose up -d && \
docker compose exec symfony-php composer install
```