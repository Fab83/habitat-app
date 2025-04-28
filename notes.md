# 🧳 **Cheatsheet Laravel portable sur clé USB (Windows)**

---

## 📁 Arborescence recommandée

```
D:\
├── composer\             → Composer portable
│   ├── composer.bat
│   └── composer.phar
├── git\                 → Git portable
│   └── cmd\git.exe
├── php\                 → PHP portable
│   └── php.exe
├── xampp\               → XAMPP portable (Apache/MySQL)
│   ├── htdocs\
│   │   └── habitat_app_main\ → Projet Laravel
├── tools\
│   └── init.bat         → Script de démarrage personnalisé
```

---

## ⚙️ Étapes de préparation

### 🔧 1. PHP Portable

- Télécharger depuis : [https://windows.php.net/download/](https://windows.php.net/download/)
- Décompresser dans `D:\php\`

### 🔧 2. Composer Portable

- Télécharger `composer.phar` depuis [https://getcomposer.org/](https://getcomposer.org/)
- Créer `composer.bat` dans `D:\composer\` :
  ```bat
  @echo off
  php "%~dp0composer.phar" %*
  ```

### 🔧 3. Git Portable

- Télécharger `PortableGit-*.7z.exe` depuis [https://github.com/git-for-windows/git/releases](https://github.com/git-for-windows/git/releases)
- Extraire dans `D:\git\`

---

## ⚙️ 4. Création du projet Laravel

Dans `cmd` :
```cmd
cd D:\xampp\htdocs
D:\composer\composer.bat create-project laravel/laravel habitat_app_main
```

---

## ⚙️ 5. Configuration du `storage`

Dans le dossier du projet :
```cmd
cd D:\xampp\htdocs\habitat_app_main
php artisan storage:link
```

> Permet d'accéder aux fichiers stockés dans `storage/app/public` via l'URL `/storage`.

---

## ⚙️ 6. Configuration de Git local

### Initialiser le dépôt :
```cmd
cd D:\xampp\htdocs\habitat_app_main
git init
```

### Marquer le dépôt comme sûr :
```cmd
git config --global --add safe.directory D:/x/htdocs/habitat_app_main
```

---

## ⚙️ 7. Fichier `init.bat`

Créé dans `D:\tools\init.bat` :

```bat
@echo off
rem === CONFIGURATION DE L'ENVIRONNEMENT LARAVEL PORTABLE ===

set PATH=D:\git\cmd;D:\composer;D:\php;%PATH%

git config --global --add safe.directory D:/x/htdocs/habitat_app_main

cd /d D:\x\htdocs\habitat_app_main

cmd
```

→ Double-cliquer dessus lance un terminal prêt avec PHP, Composer, Git, positionné sur le projet.

---

## ⚙️ 8. Intégration avec VS Code (facultatif)

Dans `settings.json` de VS Code :

```json
{
    "git.path": "D:\\git\\cmd\\git.exe"
}
```

---

## ✅ Pour tester ton environnement

```cmd
php artisan serve
composer --version
git status
```
