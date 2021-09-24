<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-2">
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        Welcome to the simple-shop application!
    </div>

    <div class="mt-6 text-gray-500">
        <p>This app is executed using Laravel as part of the mini-hackaton organized in Sept 2021.</p>
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Documentation</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Project brief is available in the GitHub repository. In a nutshell: create rudimentary shop with on-the-fly user registration, hook it up to Stripe and enable novel payment flow in two installments.
            </div>

            <a href="https://github.com/32u2/simple-shop">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Explore the project brief</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laracasts.com">Dev Stack</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                The simple choice was Laravel Jetstream - it comes with Fortify for authentication, with the advantage of catering for both Laravel auth as per the brief, or for "headless" (jwt) auth fit for the mobile app, SPA, or exposed API.
            </div>

            <a href="https://github.com/32u2/simple-shop/tree/main/NOTES">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>See development notes</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://tailwindcss.com/">Early Decisions</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 pb-6 text-sm text-gray-500">
                Current options were to use legacy laravel/ui package which provides Bootstrap and rudimentary authorization, or to use Breeze or Jetstream which both offer Fortify auth flow, but with Tailwind instead of Bootstrap.

            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Authentication</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Authentication and registration is handled by Fortify with the advantage of catering for both Laravel auth as per the brief, or for "headless" (jwt) auth fit for the mobile app, SPA, or exposed API.
            </div>
        </div>
    </div>
</div>
