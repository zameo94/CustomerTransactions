# Task
Questa applicazione ha come scopo la visualizzazione delle transazioni di un singolo utente in valuta € (coi dovuti cambi)

#Installazione

#####Testata su Linux Ubuntu 18.04

Una volta scaricato il progetto (e scompattato nel caso abbiate scaricato lo zip), sono necessari pochi passaggi per rendere funzionante l'applicazione, tra cui la creazione di un DB vuoto dedicato

- Col terminale posizionarsi nella Root del progetto e dicitare i seguenti comandi:

- Installazione dei pacchetti necessari per il corretto funzionamento
```
composer install
```

- Copiare il file /project_root/.env.example in /project_root/.env.example

- Nel file .env appena creato, popolare i campi relativi al nome del DB create e alle credenziali di accesso 
```
Esempio:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task
DB_USERNAME=matteo
DB_PASSWORD=password
```

- Sempre nella Root del progetto, digitare
```
php artisan key generate
```

- Sempre nella Root del progetto, digitare il comando per la creazione delle tabelle. Attenzione all'opzione --seed, responsabile della popolazione dei dati necessari al corretto funzionamento
```
php artisan migrate --seed
```

- Se vi foste dimenticati --seed, si può rimediare digitando
```
php artisan migrate:refresh --seed
```

#Funzionamento

L'applicazione ha delle funzionalità in più per rendere l'esperienza generale più fruibile e vicina ad un reale caso

Le risorse Principali sono Customer e CurrencyWebServer.
Per oguna di loro è possibile visualizzare tramite chiamata API o tutte le risorse presenti o una singola risorsa indicata (utilizzabile da Postman)
```
Esempio link chiamata

127.0.0.1:8000/customers/1
```
 È poaaibile dalla Root del progetto digitare 
 ```
php artisan serve
```
per creare un piccolo server locale e far funzionre le chiamate API con Postman

A ueste risorse si affianca un sistema per la conversione del valore delle transazioni selezionate nella valuta voluta 

#Comandi

####Customer

- Lista di tutti i Customer presenti
```
php artisan customer:get
```
- Lista del Customer indicato
```
php artisan customer:get --customer=1
```

####Transazioni

- Lista di tutte le Transazioni presenti
```
php artisan customers-transactions:get
```
- Lista della Transazione indicato
```
php artisan customers-transactions:get --transaction=1
```

####Report

- Report delle Transazioni Del Customer indicato con le valute trasformate nella valuta primaria indicata nel programma (default €)
 Obbligatorio l'argomento che indica l'id del Customer selezionato
```
php artisan customer:report 1
```

