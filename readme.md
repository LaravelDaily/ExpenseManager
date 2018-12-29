# Laravel 5.5 based system for managing expenses and income

It is a demo project for demonstrating what can be generated with [QuickAdminPanel](https://quickadminpanel.com) tool.

Features:
- CRUDs for income/expenses and their categories
- Monthly reports by income/expenses and their categories
- Multi-tenancy: Ability to register new user who sees only their categories/entries (admin sees all).
- Formatting currency: ability to add/edit currencies with their formats (comma/dot separation etc.)

## Clickable live-demo

[demo-expenses.quickadminpanel.com](http://demo-expenses.quickadminpanel.com)

- __Email__: admin@admin.com
- __Pass__: password

![Expense manager screenshot](https://quickadminpanel.com/assets/pages/demos/demo-expenses-01.png)

![Expense manager screenshot currency](https://quickadminpanel.com/assets/pages/demos/demo-expenses-02.png)

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL and login with default credentials __admin@admin.com__ - __password__

## License

Basically, feel free to use and re-use any way you want.

---

## More from our LaravelDaily Team

- Read our [Daily Blog with Laravel Tutorials](https://laraveldaily.com)
- FREE E-book: [50 Laravel Quick Tips (and counting)](https://laraveldaily.com/free-e-book-40-laravel-quick-tips-and-counting/)
- Check out our adminpanel generator QuickAdminPanel: [Laravel version](https://quickadminpanel.com) and [Vue.js version](https://vue.quickadminpanel.com)
- Subscribe to our [YouTube channel Laravel Business](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/)
