This folder will contain notes, screenshots and odd dev resources.

# The stack

The simple choice was [Laravel Jetstream](https://jetstream.laravel.com/2.x/introduction.html) - it comes with
Fortify for authentication, with the advantage of catering for both Laravel auth as per the brief, or for
"headless" (jwt) auth fit for the mobile app, SPA, or exposed API.

# Dev manners

Git branches will be created to showcase the state of the app at various stages.

The dev methodology, however, will fully rely on CI (continuous integration) flow, so branches other than
**main** will act as snapshots and not be updated after their creation, while the **main** branch will receive
frequent updates and always show the latest state of the app.

Creating first branch and switching back to **main**:

```
git checkout -b starter
git push origin starter
git checkout main
```

# Decisions...
 
If there was an explicit requirement to use bootstrap.css, the simple solution would have been
to use [larafort](https://github.com/32u2/larafort) starter. Switching from Tailwind to Bootstrap
can even be done later in the project. As of now, the css markup for the following views would need to be changed:

- resources/views/layouts/app.blade.php
- resources/views/home.blade.php
- resources/views/auth/login.blade.php
- resources/views/auth/register.blade.php
- resources/views/auth/forgot-password.blade.php
- resources/views/auth/reset-password.blade.php
- resources/views/auth/verify-email.blade.php

All these 'replacement' views are available [here](https://github.com/32u2/larafort/tree/main/resources/views/auth).

# ToDo + on-the-fly decisions

### Day 1 (1/2)

- [x] copy local **.env** file to NOTES folder (it will later contain STRIPE sandbox creds)
- [x] create Product model
- [x] create ProductsController
- [x] create product/cards and product/single views + corresponding routes

Decision: use single Products controller rather than controller/view pairs, the auth is handled by route guard and layout,
so there won't be any confusion as to who can access what.

- [x] create product/manage view + guarded route
- [x] create product/create view + guarded route
- [x] create product/update view + guarded route
- [x] create product migration, update model and perhaps ~~create faker too~~ - used seeder instead ;)
- [x] add header to guest layout guest.blade.php (could have also been a component)
- [x] create dashboard landing page
- [x] create product/manage page (dashboard)

### Day 2

- [ ] eloquent queries for ProductController CRUD
- [ ] finalize home page (product cards / grid)
- [ ] finalize single product page

Decision: as role management is out of the scope, the first registered user will be assumed to be admin
and thus allowed to create/update products.

Further down the line, when collecting customers' emails prior to the first payment, there will be two
options available:

1. register customer as a user - this would allow customer login and access to past payments (currently out of the scope)
2. collect customers' emails in the payments table, together with the payment details (and decide later what to do with it)

- [ ] wire product create page form
- [ ] wire product management page (table)
- [ ] wire product update page

This would be the end of the Phase 1. The styling and responsiveness may still be outstanding.

### Day 3

- [ ] create payments controller, table, model and migration
- [ ] get Stripe and mailing provider dev credentials
- [ ] create 'Thank You' page
- [ ] create mail controller and markdown mail view for payment confirmation
- [ ] test payments (hopefully, this should work locally, if not, create ngrok tunnel)

The end of the Phase 2

- [ ] create cron job for the delayed 2nd payment
- [ ] refactor payment confirmation into payment confirmation #1 (deposit)
- [ ] create mail controller and markdown mail view for payment confirmation #2
- [ ] test Phase 3 flow

Without yet looking at it in detail, there may be a potential problem with this part of the brief.
Unless Stripe allows recurring payment with such a low frequency (5 minutes), the 2nd part of the payment may need
user interaction. If so, curl, or Guzzle may be inadequate to handle it as we can automate only legit API actions.

User interaction requires browser automation (along the lines of Selenium, or Chrome DP) and is out of the Laravel scope.

The end of Phase 3

### Day 4

- [ ] revisit styling
- [ ] test responsiveness on mobile and tablet sizes
- [ ] test all pages in Chrome, Opera, Firefox and Edge

## Off-brief, low hanging fruit

- [ ] show db summary in the admin dash, # of payments, total billing etc..

## How To

Run migration and seed 9 products:

```
php artisan migrate:fresh
php artisan db:seed --class=ProductsSeeder

```


