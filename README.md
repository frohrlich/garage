# Garage
***

## Commandes utile
Installer bootstrap :
```
npm install
```
Si ça ne marche pas essayer :
```
npm i bootstrap@4.6.0
```

Pour commit sa progression :
```
git add .
git commit -m "Commentaire"
git push
```

Pour récupérer les données d'un autre :
```
git pull
```

Pour changer de branche :
```
git checkout nomdelabranche
```

Pour vérifier sur quelle branche on est / si on est synchronisé avec le repository :
```
git status
```
## Marche à suivre pour ajouter une nouvelle fonctionnalité (cas le plus simple sans conflit) :
D'abord créer sa nouvelle branche :
```
git branch nomdelafonctionnalite
git checkout nomdelafonctionnalite
git push --set-upstream origin nomdelafonctionnalite
```
Ensuite coder dessus !
Ensuite commit et push ses changements. A ce stade demander à quelqu'un de vérifier que tout est ok.
Ensuite merge avec develop (on ne touche pas à main pour le moment) :
```
git checkout develop
git merge nomdelafonctionnalite
git branch -d nomdelafonctionnalite
```
