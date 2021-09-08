This folder will contain notes and screenshots.

PRIVATE-NOTES folder is .gitignore(d), but is available on request.

# The stack

The simple choice was [Laravel Jetstream](https://jetstream.laravel.com/2.x/introduction.html) - it comes with Fortify for authentication, with the advantage of catering for both Laravel auth as per the brief, or for "headless" (jwt) auth fit for the mobile app, SPA, or exposed API.

# Dev manners

Git branches will be created to showcase the state of the app at various stages.

The dev methodology, however, will fully rely on CI (continuous integration) flow, so branches other than **main** will act as snapshots and not be updated after their creation, while the **main** branch will receive frequent updates and always show the latest state of the app.

Creating first branch and switching back to **main**:

```
git checkout -b starter
git push origin starter
git checkout main
```
