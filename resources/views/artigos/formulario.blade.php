<div class="campos">
    <div class="campo">
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text" maxlength="120" value="{{ old('nome', $artigo->nome ?? '') }}" required>
        @error('nome') <small class="erro-texto">{{ $message }}</small> @enderror
    </div>
    <div class="campo">
        <label for="tipo">Categoria</label>
        <input id="tipo" name="tipo" type="text" maxlength="60" value="{{ old('tipo', $artigo->tipo ?? '') }}" required>
        @error('tipo') <small class="erro-texto">{{ $message }}</small> @enderror
    </div>
    <div class="campo inteiro">
        <label for="detalhes">Descrição</label>
        <textarea id="detalhes" name="detalhes" maxlength="400" rows="3">{{ old('detalhes', $artigo->detalhes ?? '') }}</textarea>
        @error('detalhes') <small class="erro-texto">{{ $message }}</small> @enderror
    </div>
    <div class="campo">
        <label for="valor">Preço (R$)</label>
        <input id="valor" name="valor" type="number" step="0.01" min="0.01" value="{{ old('valor', $artigo->valor ?? '') }}" required>
        @error('valor') <small class="erro-texto">{{ $message }}</small> @enderror
    </div>
    <div class="campo">
        <label for="quantidade">Quantidade disponível</label>
        <input id="quantidade" name="quantidade" type="number" min="0" value="{{ old('quantidade', $artigo->quantidade ?? 0) }}" required>
        @error('quantidade') <small class="erro-texto">{{ $message }}</small> @enderror
    </div>
</div>
