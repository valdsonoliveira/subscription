@component('mail::message')
# Novo Contato

Nome:{{$data['name']}}

Email:{{$data['email']}}

Mensagem:{{$data['message']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
