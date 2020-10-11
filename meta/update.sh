git stage -A && git commit -m "$1" && git push && \
ssh alex@alexandrebl.com "cd /var/www/tinta/wp-content/themes/tintafresca_wp_theme && git pull"
