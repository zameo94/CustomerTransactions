# Task
Questa applicazione ha come scopo la visualizzazione delle transazioni di un singolo utente in valuta € (coi dovuti cambi)

#Installazione
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


