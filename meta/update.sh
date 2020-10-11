ssh alex@alexandrebl.com "cd /var/www/tinta/wp-content/themes/tintafresca_wp_theme && git pull" && \
git stage -A && git commit -m "$1" && git push
