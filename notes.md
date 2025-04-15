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

---

SQL

INSERT INTO `bailleurs`(`id`, `nom`, `commune_bailleur`, `convention_cadre`, `created_at`, `updated_at`, `nom_fichier_original`) VALUES ('1','bailleur test','Commune test','', '2025-04-11 15:05:58','2025-04-11 15:05:58','')

INSERT INTO `operations`(`id`, `nom_operation`, `adresse_operation`, `commune_operation`, `reference_cadastre`, `vefa_mod`, `neuf_aa`, `annee_prog`, `promoteur`, `numero_pc`, `date_pc`, `nombre_logements`, `nombre_lls`, `nombre_plai`, `nombre_plus`, `nombre_ulsplus`, `nombre_ulspls`, `nombre_pls`, `nombre_psla`, `nombre_brs`, `nombre_lli`, `nombre_ulli`, `date_livraison`, `nombre_logements_livres`, `RT`, `inventaire_sru`, `sig`, `commentaires`, `bailleur_id`, `created_at`, `updated_at`, `pc`, `nombre_plai_agrement`, `nombre_plus_agrement`, `nombre_pls_agrement`, `nombre_psla_agrement`) VALUES ('1','test nom','adresse test','commune test','cadastre test','VEFA','Neuf','2000','promoteur test','PC 1234','2025-04-14','10','25','20','55','22','58','13','12','10','1','1','2024','100','2020','inventaire_sru','SIG non renseigné','Commentaires test','1','2025-04-11 15:05:58','2025-04-11 15:05:58','','20','12','5','15')

INSERT INTO `garantie_emprunts`(`id`, `nom_operation`, `created_at`, `updated_at`, `type_financement`, `numero_delib`, `bureau_conseil`, `date_bureau_conseil`, `montant_total`, `montant_plai_construction`, `montant_plai_foncier`, `montant_pls_construction`, `montant_pls_foncier`, `montant_phb2`, `montant_booster`, `montant_plus_construction`, `montant_plus_foncier`, `date_deliberation`, `nombre_logements_reserves`, `operation_id`) VALUES ('1','operation-id','2025-04-11 15:05:58','2025-04-11 15:05:58','PLUS/PLAI','6','Bureau','2024-02-01','1500000','500000','200000','150000','652358','48523','15000','265000','582000','2025-04-11','8','1')