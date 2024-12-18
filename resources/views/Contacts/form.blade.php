@extends('Contacts.layout');

@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>{{ !isset($contact) ? "Criar contato" : "Atualizar contato"}}</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-secondary" href="{{ route('contacts.index') }}"> Voltar</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        Houve um problema com a sua requisição.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(isset($contact))
<form action="{{ route('contacts.update', $contact->id) }}" method="POST">
    @csrf
    @method('PUT')

     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="name" value="{{ $contact->name }}" class="form-control" placeholder="Nome">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Contato:</strong>
                <input type="text" name="contact" value="{{ $contact->contact }}" class="form-control" placeholder="Contato">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Endereço:</strong>
                <input type="text" name="email" value="{{ $contact->email }}" class="form-control" placeholder="Endereço">
            </div>
        </div>
        <div class="container text-center mt-3">
            <div class="row g-3 row-cols-auto float-end">
                <div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
</form>
                <div>
                    <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
<form action="{{ route('contacts.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="name" class="form-control" placeholder="Nome">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Contato:</strong>
                <input type="text" name="contact" class="form-control" placeholder="Contato">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-mail:</strong>
                <input type="text" name="email" class="form-control" placeholder="E-mail">
            </div>
        </div>
        <div class="container text-center mt-3">
            <div class="row g-3 row-cols-auto float-end">
                <div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

</form>
@endif

@endsection