<x-mail::message>
# Contact Us Form Details of {{ config('app.name') }}

<x-mail::panel>
    Name: {{$full_name}}<br>
    Contact: {{$contact}}<br>
    Email: {{$email}}<br>
    Subject: {{$formsubject}}<br>
    Message:{{$message}}
</x-mail::panel>

</x-mail::message>
