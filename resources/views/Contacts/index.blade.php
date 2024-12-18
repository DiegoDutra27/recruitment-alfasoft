@extends('Contacts.layout');

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-start">
                <h2>Lista de contatos</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('contacts.create') }}"> Criar contato +</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Contato</th>
            <th>Endereço</th>
            <th width="200px">Ações</th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->contact }}</td>
            <td>{{ $contact->email }}</td>

            <td>
                <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}">Mostrar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    @if ($contacts->hasPages())
        <div>
            {{ __('messages.pagination.showing', [
                'start' => $contacts->firstItem(),
                'end' => $contacts->lastItem(),
                'total' => $contacts->total()
            ]) }}
        </div>
        {{ $contacts->links() }}
    @endif


@endsection
