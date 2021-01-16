git stage -A && git commit -m "$(date '+%d/%m/%Y %H:%M:%S')" ; git push ; \
ssh root@alexandrebl.com "cd /var/www/teste.tintafresca.net/wp-content/themes/tintafresca_wp_theme && git pull"
