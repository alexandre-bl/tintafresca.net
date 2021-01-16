git stage -A && git commit -m "$(date '+%d/%m/%Y %H:%M:%S')" && git push && \
ssh alex@alexandrebl.com "cd /var/www/tinta/wp-content/themes/tintafresca_wp_theme && git pull"
