git stage -A && git commit -m "$(date '+%d/%m/%Y %H:%M:%S')" ; git push ; \
ssh root@tintafresca.net "cd /var/www/tintafresca/test && git pull"
