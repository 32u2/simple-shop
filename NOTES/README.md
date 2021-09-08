This folder will contain notes and screenshots.

PRIVATE-NOTES folder is .gitignore(d), but is available on request.

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

- [x] copy local **.env** file to NOTES folder (it will later contain STRIPE sandbox creds)
- [x] create Product model
- [x] create ProductsController
- [x] create product/cards and product/single views + corresponding routes

Decision: use single Products controller rather than controller/view pairs, the auth is handled by route guard and layout,
so there won't be any confusion as to who can access what.

- [x] create product/manage view + guarded route
- [x] create product/create view + guarded route
- [x] create product/update view + guarded route
- [x] create product migration, update model and perhaps create faker too
- [x] add header to guest layout guest.blade.php (could have also been a component)
- [x] create dashboard landing page
- [x] create product/manage page (dashboard)







