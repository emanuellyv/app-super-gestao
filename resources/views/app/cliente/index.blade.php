@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Lista de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                            <td>
                                <form method="post" id="form_{{ $cliente->id }}" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $cliente->id }}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('cliente.edit', ['cliente' => $cliente]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $clientes->appends($request)->links() }}
            <br>
            Exibindo {{ $clientes->count() }} clientes de  {{ $clientes->total() }} (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
        </div>
    </div>

@endsection
