nano /root/.config/code-server/config.yaml
password:
60d6fb76c1873561784cfa8d96

Hostname : vps110478.serveur-vps.net
Adresse IP : 192.162.69.158
Utilisateur : root
Mot de passe : G0n7y6Z6a9u5o2o

mysql password G0n7y6Z6a9u56rTR

http://192.162.69.158:8080
code-server
60d6fb76c1873561784cfa8d96

PANEL
https://panel.lws.fr/
LWS-733794
HvQ3WNC3Nx!uA

ssh root@192.162.69.158

MAJ
cd ../var/www/habitat_app_main && git stash && git pull origin master && composer install --no-dev && php artisan migrate --force && php artisan cache:clear && php artisan config:clear
