<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Обновление записи') }}
        </h2>
    </x-slot>

    <form action="{{ route('admin-update-submit' , $data->id) }}" class="max-w-7xl mx-auto sm:px-6 lg:px-8" method="post">
        @csrf
        <div class="form-group mt-2">
            <label for="name">Введите имя</label>
            <input type="text" name="name" value="{{ $data->name }}" placeholder="Введите имя" id="name" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ $data->email }}" placeholder="Введите email" id="email" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="subject">Тема сообщения</label>
            <input type="text" name="subject" value="{{ $data->subject }}" placeholder="Тема сообщения" id="subject" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="message">Сообщение</label>
            <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"> {{ $data->message }} </textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2">Обновить</button>

    </form>
</x-app-layout>