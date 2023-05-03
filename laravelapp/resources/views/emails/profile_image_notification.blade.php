@component('mail::message')
Dear {{ $client->last_name }} {{ $client->first_name }},

We noticed that you haven't uploaded your profile image yet. Please upload your passport photograph to Law Firm X's website as soon as possible.

Thank you for your cooperation.

Best regards,<br>
Law Firm X
@endcomponent
