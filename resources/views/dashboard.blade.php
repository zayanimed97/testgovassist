<style>
    .container th h1 {
    font-weight: bold;
    font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
    font-weight: normal;
    font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
     -moz-box-shadow: 0 2px 2px -2px #0E1119;
          box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
    text-align: left;
    overflow: hidden;
    width: 80%;
    margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
    padding-bottom: 2%;
    padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
    background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
    background-color: #2C3446;
}

.container th {
    background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
     -moz-box-shadow: 0 6px 6px -6px #0E1119;
          box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
    transition-duration: 0.4s;
    transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}




</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Url Shortener') }}
        </h2>
    </x-slot>
    <x-slot name="slot">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 container">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if (session('success') ?? false)
                    <div class="flex justify-center w-full mb-4">
                        <div class="w-3/4 bg-green-200 rounded p-4">
                            {{ session('success') }}
                        </div>
                    </div> 
                @endif
                
                    
                <x-validation-errors class="mb-4" :errors="$errors" />

                    <form action="/shortenUrl" class="form-group" method="POST">
                        @csrf
                        <x-input id="destination" class="block mt-1 w-full" placeholder="Enter URL" type="text" name="destination" :value="old('destination')" required autofocus />

                        <x-label for="destination" class="mt-4" :value="'Enter the Url you want to shorten'" />

                        <div class="flex items-center justify-end mt-4">
            
                            <x-button class="ml-3">
                                Shorten Url
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-auto w-full mt-8">
                <thead>
                    <tr>
                        <th>SLUG</th>
                        <th>URL</th>
                        <th>CREATED AT</th>
                    </tr>
                    
                </thead>
                <tbody>
                    @foreach ($urls as $url)
                        <tr>
                            <td><a target="_blank" href="{{$url->short_url}}">{{$url->short_url}}</a></td>
                            <td>{{$url->destination}}</td>
                            <td>{{$url->created_at}}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            </x-slot>
        </div>
    </div>
</x-app-layout>