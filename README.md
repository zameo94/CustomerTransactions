# Task
Questa applicazione ha come scopo la visualizzazione delle transazioni di un singolo utente in valuta € (coi dovuti cambi)

# Installazione

##### Testata su Linux Ubuntu 18.04

Una volta scaricato il progetto (e scompattato nel caso abbiate scaricato lo zip), sono necessari pochi passaggi per rendere funzionante l'applicazione, tra cui la creazione di un DB vuoto dedicato

- Col terminale posizionarsi nella Root del progetto e digitare i seguenti comandi:

- Per l'esecuzione dei test è necessario sql-lite. Se non siete sicuri di averlo, digitate:

```
sudo apt-get install php-sqlite3

```


- Installazione dei pacchetti necessari per il corretto funzionamento

```
composer install
```

- Copiare il file /project_root/.env.example in /project_root/.env

- Nel file .env appena creato, popolare i campi relativi al nome del DB creato in precedenza e alle relative credenziali di accesso 

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
php artisan key:generate
```

- Sempre nella Root del progetto, digitare il comando per la creazione delle tabelle. Attenzione all'opzione --seed, responsabile della popolazione dei dati necessari al corretto funzionamento

```
php artisan migrate --seed
```

- Se vi foste dimenticati --seed (o aveste dati non voluti nel DB), si può rimediare (riportando il DB alla fase del primo avvio) digitando

```
php artisan migrate:refresh --seed
```

# Funzionamento

L'applicazione ha delle funzionalità in più per rendere l'esperienza generale più fruibile e vicina ad un reale caso

Le risorse Principali sono Customer e CurrencyWebServer.
Per ognuna di loro è possibile visualizzare tramite chiamata API o tutte le risorse presenti o una singola risorsa indicata (utilizzabile da Postman)

```
Esempio link chiamata tutti i Customers
127.0.0.1:8000/customers

Esempio link chiamata singolo Customer
127.0.0.1:8000/customers/1

Esempio link chiamata tutti le Transazioni
127.0.0.1:8000/customers-transactions

Esempio link chiamata singola Transazione
127.0.0.1:8000/customers-transactions/1
```

È possibile dalla Root del progetto digitare 

```
php artisan serve
```

per creare un piccolo server locale e far funzionre le chiamate API con Postman

# Comandi
Dalla Root del progetto è possibile digitare i seguenti comandi:

#### Customer

- Lista di tutti i Customers presenti

```
php artisan customers:get
```

- Lista del Customer indicato

```
php artisan customers:get --customer=1
```

#### Transazioni

- Lista di tutte le Transazioni presenti

```
php artisan customers-transactions:get

```

- Lista della Transazione indicata

```
php artisan customers-transactions:get --transaction=1
```

#### Report

- Report delle Transazioni Del Customer indicato con le valute trasformate nella valuta primaria indicata nel programma (default €).
 Obbligatorio l' argomento che indica l' id del Customer selezionato

```
php artisan customer:report 1
```

# Struttura

- All'interno di 

```
 \app\Console\Commands
```

ci sono i file relativi alla prima iterazione col comando
 
- All'interno di 

```
 \app\Console\CommandsClass
```

ci sono i file relativi alla reale logica del comando, interazione col DB, gestione dell' output di risorsa singola e/o multipla, ecc
 
- All'interno di 

```
 \app\Http\Controllers
```

ci sono i Controllers dell'API, che viene richiamata sia con chiamata API (browser, postman, ecc) che dai comandi 
  
- 

```
 \app\CurrencyWebServer.php
 \app\Customer.php
 \app\CustomerTransaction.php
```

sono i Model delle rispettive risorse
 
- All'interno di 

```
 \database\factory\
```

ci sono le Factory per creare dati della risorsa specificata, utilizzati sia in fase di Test che nel primo avvio dell'applicazione

- All'interno di 

```
 \database\migrations\
```

ci sono le migrazioni, rappresentazione delle tabelle, sono i file che vengono eseguiti al comando 

```
php artisan migrate

```
 
- All'interno di 

```
 \database\seeds\
```

ci sono i Seeder, che utilizzano le Factory per la creazione di più risorse in simultanea

- All'interno di 

```
 \test\Feature\
```

ci sono i Test, relativi sia all' API sia ai comandi

Enjoy
