# Spanish DNI / NIF / CIF Field for Laravel Nova

This field provides built-in validation for spanish DNI, NIF and CIF.

### Install

Run this command into your nova project:
`composer require composer require r64/nova-dni-field`

### Add it to your Nova Resource:

```php
use R64\NovaDniField\Dni;

Dni::make('vat'),
```
