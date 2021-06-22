# work-stocks-laravel
 work-stocks laravel
 
 * Eseguire php artisan migrate:refresh
 * Eseguire php artisan db:seed --class=DatabaseSeeder
 * Eseguire php artisan db:seed --clas=MenuSeeder
 * Eseguire php artisan db:seed --class=MenuItemSeeder
 * Eseguire php artisan voyager:install
 * Eseguire php artisan voyager:admin admin@admin.it
 * Eseguire php artisan queue:work --queue=high,default per avviare il work che invia le email in maniera asincrona


Comandi utili:

php artisan ide-helper da utilizzare con l'ooportuna opzione :models e :generate per avere aiuto in fase di scrittura dei modelli
va lanciato a modello terminato e scegliere l'opzione 'yes' quando il prompt lo richiede

I tag possono essere raggruppati per gruppi, il comando per creare un nuovo gruppo è:
php artisan tagging:create-group MyTagGroup

Tutti gli altri comandi sui gruppi sono disponibili sul repo github indicato sopra



Documentazione delle librerie introdotte:

* Tags: https://github.com/rtconner/laravel-tagging

Aggiungere nel file .env la seguente proprietà:
isProduction=true
