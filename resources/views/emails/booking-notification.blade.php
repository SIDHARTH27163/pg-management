@component('mail::message')
# New Room Booking Request

A new room booking request has been received. Here are the details:

**Name:** {{ $booking->name }}  
**Email:** {{ $booking->email }}  
**Phone:** {{ $booking->phone }}

@component('mail::button', ['url' => 'mailto:' . $booking->email])
Reply to Customer
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
