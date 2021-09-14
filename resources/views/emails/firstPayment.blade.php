@component('mail::message')
# Introduction

Thank you very much for your recent purchase.
({{ $email }})


The first payment has been processed and the second transhe of payment will occur within five minutes.

@component('mail::button', ['url' => 'http://127.0.0.1'])
Shop Some More
@endcomponent

Thanks,<br>
{{ config('app.name') Crew}}
@endcomponent
