# Documentation git

- [Manual](https://git-scm.com/doc)
- [Livre Pro-Git](https://git-scm.com/book)
- [Git Gitlab doc](https://docs.gitlab.com/ee/gitlab-basics/start-using-git.html)
- [Git Github doc](https://github.com/git-guides)
- [Git Bitbucket doc](https://www.atlassian.com/git/tutorials/learn-git-with-bitbucket-cloud)

# Démarrage

Un dépôt **git** doit contenir 3 fichiers :

- un fichier **readme.md** qui introduit et explique votre projet :
    - [https://www.makeareadme.com/](https://www.makeareadme.com/)
    - [https://readme.so/fr](https://readme.so/fr)
    - [https://github.com/matiassingers/awesome-readme](https://github.com/matiassingers/awesome-readme)

- un fichier **.gitignore** qui permet de spécifier les fichiers,dossiers à ne pas suivre
    - [https://gitignore.io](https://gitignore.io)
    - [https://github.com/github/gitignore](https://github.com/github/gitignore)

- fichier **LICENCE.md** qui permet d'avoir un contrat avec les utilisateurs de votre projet
   - [Licence logiciel](https://fr.wikipedia.org/wiki/Licence_de_logiciel)
   - [Licence juridique](https://fr.wikipedia.org/wiki/Licence_(juridique))
   - [Pourquoi vous devriez vous intéresser aux licences de vos logiciels ?](https://fr.linkedin.com/pulse/pourquoi-vous-devriez-int%C3%A9resser-aux-licences-de-vos-logiciels-madet?trk=pulse-article_more-articles_related-content-card)
   - [Licence Creative Commons](https://fr.wikipedia.org/wiki/Licence_Creative_Commons)

## Créer un nouveau dépôt en ligne de commande

```
touch README.md LICENCE.md .gitignore
git init
git add *
git commit -m "Debut du prjet initialisation"
git branch -M main (renommer branche principale si besoin)
git remote add origin https://github.com/user/nom-depot.git
git push -u origin main
```

## Envoyer(push) un dépôt existant en ligne de commande

```
git init
git remote add origin https://github.com/user/nom-depot.git
git branch -M main (renommer branche principale si besoin)
git push -u origin main
```

## Travail avec git au quotidien

- `git pull` Importer le travail du dépôt distant
- `git status` Vérifier l'état de votre dépôt
- `git add fichier(s)` ou `git add *` Ajouter les fichiers modifiés pour être prêt à être suivis
- `git commit` ou `git commit -m "Sujet du commit"` Enregistrer vos modifications 
- `git push` Envoyer votre travail sur le dépôt distant

## Commits

- [Conventional commits format](https://www.conventionalcommits.org)
- [Git : pourquoi écrire des commits atomiques ?](https://www.codeheroes.fr/2021/10/25/git-pourquoi-ecrire-des-commits-atomiques/)
- [Qu'est ce qu'un bon commit ?](https://jbuget.fr/posts/qu-est-ce-qu-un-bon-commit-git/)

## Méthode de travail avec git

- [Comparing Git Workflows: What You Should Know ](https://www.atlassian.com/git/tutorials/comparing-workflows)
- [Workflow Gitflow](https://www.atlassian.com/fr/git/tutorials/comparing-workflows/gitflow-workflow)
- [Développement basé sur le tronc ](https://www.atlassian.com/fr/continuous-delivery/continuous-integration/trunk-based-development)
- [About collaborative development models](https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/getting-started/about-collaborative-development-models)

## Articles relatifs à git

- [The Best Git Tutorials](https://www.freecodecamp.org/news/best-git-tutorial/)
- [Git Best Practices – How to Write Meaningful Commits, Effective Pull Requests, and Code Reviews](https://www.freecodecamp.org/news/git-best-practices-commits-and-code-reviews/)
- [Git Best Practices – A Guide to Version Control for Beginners](https://www.freecodecamp.org/news/how-to-use-git-best-practices-for-beginners/)

## Ssh-agent

- [Setting up SSH-Agent in Windows for Passwordless Git Authentication](https://interworks.com/blog/2021/09/15/setting-up-ssh-agent-in-windows-for-passwordless-git-authentication/)
