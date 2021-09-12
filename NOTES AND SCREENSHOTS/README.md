This folder will contain notes, screenshots and odd dev resources.

# The stack

The simple choice was [Laravel Jetstream](https://jetstream.laravel.com/2.x/introduction.html) - it comes with
Fortify for authentication, with the advantage of catering for both Laravel auth as per the brief, or for
"headless" (jwt) auth fit for the mobile app, SPA, or exposed API. The alternative was Cartalyst's Sentinel, or
somewhat older Sentry.

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

- [x] eloquent queries for ProductController CRUD
- [x] finalize home page (product cards / grid)
- [x] finalize single product page
- [ ] thank you page

**USER ROLES**

Decision: as role management is out of the scope, the first registered user will be assumed to be admin
and thus allowed to create/update products.

Further down the line, when collecting customers' emails prior to the first payment, the choice will be between:

1. register customer as a user - this would allow customer login and access to past payments (currently out of the scope)
2. collect customers' emails in the payments table, together with the payment details (and decide later what to do with it)

**FORMS**

The guest pages are all done in a classic blade way and called by a single controller, never directly from the route (web.php).

Form pages will each have own controller and will be Livewire(d), so that, for example, form validation errors show without
reloading an entire page.

- [ ] wire product create page form
- [x] wire product management page (table)
- [x] wire product update page

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


The end of Phase 3

### Day 4

- [ ] revisit styling
- [ ] test responsiveness on mobile and tablet sizes
- [ ] test all pages in Chrome, Opera, Firefox and Edge

## Off-brief, low hanging fruit

- [x] pagination for 'manage products'\ table
- [x] javascript image cropper to ensure desired aspect ratio
- [ ] show db summary in the admin dash, # of payments, total billing etc..
- [x] if a user is logged in as admin, show edit button in the product card already on the landing page (besides accessing edit form via dashboard)
- [ ] footer

## How To

Run migration and seed 9 products:

```
php artisan migrate:fresh
php artisan db:seed --class=ProductsSeeder

```

