@extends('layouts.app')

@section('contenido')
    @if(session('swalCreate'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Bien hecho",
                text: "El registro se creo correctamente."
            });
        </script>
    @endif

    @if(session('swalUpdate'))
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
            <h1 class="text-3xl font-bold">Carreras</h1>
        </div>
        <div class="mt-4">
            <div class="flex justify-start">
                <a class="btn btn-secondary" href="{{route('administrador.carrera.create')}}" >Nuevo Registro</a>
            </div>
            <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden my-5">
                <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4">#</th>
                    <th class="py-2 px-4">Carrera</th>
                    <th class="py-2 px-4">Editar</th>
                    <th class="py-2 px-4">Eliminar</th>

                </tr>
                </thead>
                <tbody>
                @foreach($carreras as $carrera)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{$loop->index}}</td>

                        <td class="py-2 px-4">{{$carrera->carrera}}</td>

                        <td class="py-2 px-4">
                            <a href="{{route('administrador.carrera.edit', $carrera->id)}}" class="text-blue-500 hover:underline">Editar</a>
                        </td>


                        <td class="py-2 px-4">
                            <!-- Enlace para borrar con confirmación -->
                            <form action="{{ route('administrador.carrera.destroy', $carrera->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar esta carrera?')">Eliminar</button>
                            </form>
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--Paginación-->
        <div class="mt-4">
            {{ $carreras->links() }}
        </div>
    </div>
@endsection
