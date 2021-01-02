git stage -A && git commit -m "$1" && git push ; \
ssh alex@alexandrebl.com "cd /var/www/tintafresca/wp-content/themes/tintafresca_wp_theme && git pull"
