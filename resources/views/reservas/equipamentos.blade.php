@extends('layout.master')

@section('content')

<main>

    <h1>Reserva de Equipamentos</h1>

    <form action="" method="post">
            @csrf
            <div class="nome">
                <div>
                    <label for="campoEquipamento" class="form-label mt-3">Tipo:</label>
                    <select class="form-select" aria-label="Default select example" id="campoEquipamento" name="campoEquipamento">
                        <option value="" disabled selected>Selecione</option>
                        <option value="Datashow">Datashow</option>
                        <option value="Notebook">Notebook</option>
                    </select>

                </div>
                <div>
                    <label for="campoEspecificacao" class="form-label mt-3">Especificação:</label>
                    <select class="form-select" aria-label="Default select example" value="{{old('campoEspecificacao')}}" name="campoEspecificacao" id="campoEspecificacao" required>
                        <option value="" disabled selected>Selecione</option>
                        @foreach ($equipamentos as $equipamento)
                            <option value="{{ $equipamento->serialNum}}">oi</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="data">
                <div>
                    <label for="campoData" class="form-label mt-3">Data:</label>
                    <input type="date" class="form-control" value="{{old('campoData')}}" name="campoData" id="campoData" min="{{ date('Y-m-d') }}" required>
                </div>
                <div>
                    <label for="campoHoraIni" class="form-label mt-3">Horário início:</label>
                    <input type="time" class="form-control" name="campoHoraIni" value="{{old('campoHoraIni')}}" min="08:00" max="22:00" id="campoHoraIni" required>
                </div>
                <div>
                    <label for="campoHoraFim" class="form-label mt-3">Horário fim:</label>
                    <input type="time" class="form-control" name="campoHoraFim" value="{{old('campoHoraFim')}}" min="08:00" max="22:00" id="campoHoraFim" required>
                </div>
            </div>
            <div>
                <label for="campoDescricao" class="form-label mt-3">Descrição:</label>
                <textarea rows="7" class="form-control" style="resize: none;" name="campoDescricao" value="{{old('campoDescricao')}}" id="campoDescricao" required>
                </textarea>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>

</main>


<script>
    // Limpa as opções do campoEspecificacao assim que a página for carregada
    document.getElementById('campoEspecificacao').innerHTML = '<option value="" disabled selected>Selecione</option>';

    document.getElementById('campoEquipamento').addEventListener('change', function () {
        var tipo = this.value; // Pega o valor do tipo selecionado
        var selectEspecificacao = document.getElementById('campoEspecificacao');

        // Limpa as opções anteriores de especificação
        selectEspecificacao.innerHTML = '<option value="" disabled selected>Selecione</option>';

        // Faz a requisição AJAX se um tipo for selecionado
        if (tipo) {
            fetch(`/reserva/equipamento/especificacoes/${tipo}`)
                .then(response => response.json())
                .then(data => {
                    // Se houver descrições, preenche o campo de especificação
                    // Itera sobre o objeto recebido (chave = id_equipamentos, valor = descricao)
                    for (const [id_equipamentos, descricao] of Object.entries(data)) {
                        var option = document.createElement('option');
                        option.value = id_equipamentos;  // ID do equipamento
                        option.textContent = descricao; // Descrição do equipamento
                        selectEspecificacao.appendChild(option);
                    }
                    console.log(data); // Para depuração
                })
                .catch(error => console.error('Erro ao carregar especificações:', error));

        }
    });
</script>

@endsection