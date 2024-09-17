<h3>Cadastrar Usuário</h3>

@if(session('success'))
    <p style='color: #086;'>
        {{ session('success') }}
    </p>
@endif

@if(session('error'))
    <p style='color: #f00;'>
        {{ session('error') }} <br>
    </p>
@endif

@if ($errors->any())
    <p style='color: #f00;'>
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </p>
@endif


<div class="card-body">

    <form action="{{ route('users.store') }}" method="POST" class="row g-3" >
        @csrf
        @method('POST')

        <div class="col-md-12 col-sm-12">
            <label class="form-label">Nome: </label>
            <input type="text" name="name" class="form-control" id="name" 
            placeholder="Nome completo" value={{old('name')}}>
        </div>

        <br>

        <div class="col-md-12 col-sm-12">
            <label class="form-label">E-Mail: </label>
            <input type="email" name="email" class="form-control" id="email" 
            placeholder="Melhor e-mail do usuário" value={{old('email')}}>
        </div>

        <br>

        <div class="col-md-12 col-sm-12">
            <label class="form-label">Senha: </label>
            <input type="password" name="password" class="form-control" id="password" 
            placeholder="Senha com no mínimo 6 caractéres">
        </div>
        
        <br>

        <div class="col-12">
            <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
        </div>

    </form>

</div>