# Laravel 5.5 based system for managing expenses and income

It is a demo project for demonstrating what can be generated with [QuickAdminPanel](https://quickadminpanel.com) tool.

Features:
- CRUDs for income/expenses and their categories
- Monthly reports by income/expenses and their categories
- Multi-tenancy: Ability to register new user who sees only their categories/entries (admin sees all).
- Formatting currency: ability to add/edit currencies with their formats (comma/dot separation etc.)

![Expense manager screenshot](http://webcoderpro.com/expense-manager-demo.png)

![Expense manager screenshot currency](http://webcoderpro.com/expense-manager-demo-currency.png)

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL and login with default credentials __admin@admin.com__ - __password__

## License

Basically, feel free to use and re-use any way you want.