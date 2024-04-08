<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ваши сообщения') }}
        </h2>
    </x-slot>

    <div class="mt-8">
        @foreach($data as $el)
        <div class="alert alert-info max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3>{{$el->subject}}</h3>
            <p>{{$el->email}}</p>
            <p><small>{{$el->created_at}}</small></p>
            <a href="{{route('user-data-one', $el->id)}}"><button class="btn btn-warning">Детальнее</button></a>
        </div> 
        @endforeach
    </div>
</x-app-layout>