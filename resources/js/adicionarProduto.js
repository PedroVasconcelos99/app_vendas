let produtoIndex = 0;

window.adicionarProduto = function() {
    const produtosDiv = document.getElementById('produtos');
    const produtoTemplate = `
        <div class="flex items-center mb-2" data-index="${produtoIndex}">
            <select name="produtos[${produtoIndex}][id]" class="border mr-2" onchange="calcularValorTotal()">
                <option value="">Selecione um produto</option>
                ${produtosOptions}
            </select>
            <input type="number" name="produtos[${produtoIndex}][quantidade]" class="border ml-2" placeholder="Quantidade" min="1" onchange="calcularValorTotal()">
            <button type="button" onclick="removerProduto(${produtoIndex})" class="text-red-500 cursor-pointer">Remover</button>
        </div>
    `;
    produtosDiv.insertAdjacentHTML('beforeend', produtoTemplate);
    produtoIndex++;
}

window.removerProduto = function(index) {
    const produtoDiv = document.querySelector(`div[data-index="${index}"]`);
    produtoDiv.remove();
    calcularValorTotal();
}

window.calcularValorTotal = function() {
    let total = 0;
    document.querySelectorAll('#produtos select').forEach(function(select) {
        const quantidadeInput = select.closest('div').querySelector('input[type="number"]');
        const quantidade = parseInt(quantidadeInput.value) || 0;
        const valor = parseFloat(select.options[select.selectedIndex].getAttribute('data-valor')) || 0;
        total += quantidade * valor;
    });
    document.getElementById('valor_total').value = total.toFixed(2);
}