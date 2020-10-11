ssh alex@alexandrebl.com "git pull -C /var/www/tinta/wp-content/themes/tintafresca_wp_theme"
git stage -A && git commit -m "$1" && git push
