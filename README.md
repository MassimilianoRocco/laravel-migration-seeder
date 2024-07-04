<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<img src="https://img.shields.io/badge/template-tested-green" alt="Build Status">
<img src="https://img.shields.io/badge/laravel-10.10-red" alt="Laravel 10.10" />
<img src="https://img.shields.io/badge/vite-5.00-red" alt="Vite 5.00" />
<br>
<img src="https://img.shields.io/badge/license-boolean_95-blue" alt="Licensed to Boolean Students #95" />
<img src="https://img.shields.io/badge/license-boolean_109-blue" alt="Licensed to Boolean Students #109" />
<img src="https://img.shields.io/badge/license-boolean_125-blue" alt="Licensed to Boolean Students #125" />
</p>

# INFO

Questo git-template fornisce lo scaffold di una web application realizzata con Laravel 10, Blade e SCSS. 

- [Documentazione Laravel 10.x](https://laravel.com/docs/10.x).

# SETUP INIZIALE

- Creare un repository a partire da questo template, cliccando in alto a destra sul pulsantone verde `Use this template` e poi su `Create a new repository`
- Clonare il repository appena creato sul proprio PC
- Da phpMyAdmin creare un database, importarvi i dati e segnarvi il nome dato al DB
- Creare un file `.env`. Si può procedere copiandolo da `.env.example`
- Per creare la APP_KEY nel `.env`, lanciare il comando dedicato, ma prima installare le dipendenze composer
	```bash
    composer install
	php artisan key:generate
	```
 - Installare anche le dipendenze NPM
	```bash
	npm i
	```
- Ri-controllare che tutti i dati nel `.env` siano corretti (attenzione al database!)
- Lanciare il progetto tramite il server built-in di PHP
	```bash
	php artisan serve
	```
- Lanciare vite
	```bash
	npm run dev
	```
- Puntare il browser all'indirizzo mostrato in terminale per controllare che tutto funzioni.

# CREAZIONE COLONNE E INSERIMENTO DATA

# Creazione/modifica Colonne
- Creo Database
- Creo Migration con 
```bash
php artisan make:migration create_users_table 
```
- Nella cartella database->migrations avrò il nuovo file di migrazione in cui aggiungeremo i nomi delle colonne desiderate.
(Al riguardo è utile [Available Column Types](https://laravel.com/docs/10.x/migrations#available-column-types) )
- Mando al database queste indicazioni usando:
```bash
php artisan migrate 
```
- Qualora volessi effettuare una modifica dovrò creare una migration di update, che inserirà un nuovo file in database->migrations, con: 
```bash
php artisan make:migration update_users_table --table=users
```
- Nel nuovo file creato andrò ad aggiungere nella function up(), per esempio, un nuova tabella, ma dovrò anche sistemare la function down() per un eventuale reverse:
```bash
$table->boolean('treno_veloce');

$table->dropColumn("treno_veloce");
```
- A questo punto effettuo nuovamente il php artisan migrate per "pushare" l'aggiornamento.

- Qualora dovessi cancellare tutte le migration effettuate (attenzione che i files delle migrazioni rimarranno nella cartella migrations, andranno ovviamente modificati prima di effettuare un nuovo eventuale migrate):
```bash
php artisan migrate:reset
```

# Inserimento Data
- A questo punto dovremo creare il seeder con 
```bash
php artisan make:seeder UsersTableSeeder
```
- A questo punto nella cartella database->seeders sarà stato creato un nuovo file UsersTableSeeder.php al cui interno andremo a popolare le tabelle.
Per farlo, però, dovremo inizialmente importare un modello di Class (ricorda, al singolare) creato con il comando: 
```bash
php artisan make:model User 
```

- A questo punto mi basterà nel file Seeder creare un nuovo oggetto della classe User affinchè mi consigli automaticamente l'import del model in questione.
- Da questo momento posso creare i vari data che andranno ad essere inseriti nelle colonne: 
```bash
	$primoUser = new Train();
    $primoUser->nome = 'Mario';
	$primoUser->cognome = 'Rossi';
	...
	$primoUser->save();
```
- Per l'inserimento automatico di X data considerare l'utilizzo di un ciclo for e FAKER(che darà valori casuali ai data ) e dovrò prima importarlo e poi usarlo come segue:
ps. (Controllare [Available Formatters](https://fakerphp.org/formatters/))
```bash
	use Faker\Generator as Faker;

	public function run(Faker $faker): void
    {
        for($i=0; $i<10; $i++){

            $primoTreno = new Train();
            $primoTreno->azienda = $faker->company();
            $primoTreno->stazione_di_partenza = $faker->city();
			...
			$primoTreno->save();
		}
	}
```

- A questo punto pusherò i data sul database con:

```bash
	php artisan db:seed --class=UsersTableSeeder
```

# STAMPA IN VIEW 
- Per stampare i dati in view, basterà creare un nuovo controller con il comando 
```bash
	php artisan make:controller Guest/PageController
```
- A questo punto, nel file controller, che si trova in app->Http->Controllers->Guest, creerò una nuova funzione che darà il return della view desiderata:
(ps. si dovrà importare il model)
```bash
	<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $trains=Train::all();

        $data=[
            'trains'=>$trains
        ];
        return view('home',$data);
    }
}
```
- In routes->web andremo a dire: 
```bash
	Route::get('/home', [PageController::class, "home"])->name("home");
```
- Nella view home adesso potremo andare a recuperare i dati del database e stamparli:
```bash
	<h1>TRAINS LIST</h1>

    @foreach ($trains as $train)
    <div class="card">
        <p>Azienda: {{$train->azienda}}</p>
        <p>Stazione di partenza: {{$train->stazione_di_partenza}}</p>
        <p>Stazione di arrivo: {{$train->stazione_di_arrivo}}</p>
        <p>Orario di Partenza: {{$train->orario_di_partenza}}</p>
        <p>Orario di Arrivo: {{$train->orario_di_arrivo}}</p>
		...
    </div>
    @endforeach
```


