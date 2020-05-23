@component('mail::message')

# Introduction

Blood Bank Reset Password

@component('mail::button', ['url' => ''])

Reset Password

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
