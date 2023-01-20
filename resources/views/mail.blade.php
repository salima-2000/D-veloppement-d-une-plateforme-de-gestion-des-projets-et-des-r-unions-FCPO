@component('mail::message')
# Bienvenue
 Bienvenue  avec nous dans l'agence FCPO :)
 Voici votre mot de passe {{ $randomString}}
 @component('mail::button' ,['url' => '/'])

 Cordialement,<br>
 {{config('app.name')}}
 @endcomponent