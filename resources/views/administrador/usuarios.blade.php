@extends('layouts.app')

@section('contenido')
    @if(session('swal'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Bien hecho",
                text: "El registro se actualizo correctamente."
            });
        </script>
    @endif
    <div class="container mx-auto">
        <div class="text-center mt-3">
            <h1 class="text-3xl font-bold">Usuarios</h1>
        </div>
        <div class="mt-4">
            <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden my-5">
                <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4">#</th>
                    <th class="py-2 px-4">Nombre usuario</th>
                    <th class="py-2 px-4">Correo</th>
                    <th class="py-2 px-4">Sexo</th>
                    <th class="py-2 px-4">Edad</th>
                    <th class="py-2 px-4">Oficio</th>
                    <th class="py-2 px-4">Carrera</th>
                    <th class="py-2 px-4">Región</th>
                    <th class="py-2 px-4">Editar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $usuario)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{$loop->index}}</td>
                        <td class="py-2 px-4">{{$usuario->name}}</td>
                        <td class="py-2 px-4">{{$usuario->email}}</td>
                        <td class="py-2 px-4">{{$usuario->sexo}}</td>
                        <td class="py-2 px-4">{{$usuario->edad}}</td>
                        <td class="py-2 px-4">{{$usuario->oficio}}</td>
                        <td class="py-2 px-4">{{$usuario->carrera}}</td>
                        <td class="py-2 px-4">{{$usuario->region}}</td>
                        <td class="py-2 px-4">
                            <a href="{{route('user.edit', $usuario->id)}}" class="text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--Paginación-->
        <div class="mt-4">
            {{$user->links()}}
        </div>
    </div>



@endsection
