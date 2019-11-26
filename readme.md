# Laravel Duckform

[![Latest Stable Version](https://poser.pugx.org/tpenaranda/duckform/v/stable)](https://packagist.org/packages/tpenaranda/duckform) [![Total Downloads](https://poser.pugx.org/tpenaranda/duckform/downloads)](https://packagist.org/packages/tpenaranda/duckform) [![License](https://poser.pugx.org/tpenaranda/duckform/license)](https://packagist.org/packages/tpenaranda/duckform)

***WIP > This is on a very early stage < WIP***

Laravel package to modelize Forms/Surveys, save them into DB and handle them using API endpoints.

For FE VueJS components please ping `tate@tpenaranda.com` (npm package will be available by 2020).

*This package is being used to feed a VueJS app as you can see below. Form schema is defined [this way](https://raw.githubusercontent.com/tpenaranda/duckform/master/src/Database/Seeders/FormExamples/patient-intake-questionnaire.php).*
<p align="center">
  <img src="https://raw.githubusercontent.com/tpenaranda/duckform/master/screenshot.png" width="800">
</p>

## Installation

### Require package
```bash
$ composer require tpenaranda/duckform
```

### Run migrations in order to create tables for forms schemas and user responses.
```bash
$ php artisan migrate
```

### Seed DB with a sample form
```bash
php artisan db:seed --class TPenaranda\\Duckform\\Database\\Seeders\\DuckformSeeder
```

### Alternatively you can use factories to generate random form.
```bash
php artisan tinker
>>> use TPenaranda\Duckform\Facade\Duckform\Duckform
>>> use TPenaranda\Duckform\Models\Form
>>> Duckform::factory(Form::class)->states('with-sections-with-questions-with-possible-answers')->create()
```

## Routes (remember `php artisan route:list` for entire list)
```
Form objects (Form structure)
GET 'api/duckforms/' Get all Forms.
GET 'api/duckforms/{id-slug-token}' Get single Form.

FormSubmit objects (Data submitted for a Form)
POST 'api/duckforms/{id-slug-token}/submits' Create a FormSubmit.
PATCH 'api/duckforms/{id-slug-token}/submits/{submitToken}' Modify a FormSubmit
GET 'api/duckforms/{id-slug-token}/submits/{formSubmitToken}' Get a single FormSubmit.
GET 'api/duckforms/{id-slug-token}/submits' Get all submits for a single Form.
```
