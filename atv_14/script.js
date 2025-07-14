const form = document.getElementById("produtoForm");

    captura_eventos(form, "submit", validarFormulario);

    function captura_eventos(objeto, evento, funcao) {
      if (objeto.addEventListener) {
        objeto.addEventListener(evento, funcao, true);
      } else if (objeto.attachEvent) {
        objeto.attachEvent("on" + evento, funcao);
      }
    }

    function cancela_eventos(evento) {
      if (evento.preventDefault) {
        evento.preventDefault();
      } else {
        window.event.returnValue = false;
      }
    }

    function validarFormulario(event) {
      const nome = form.nome_produto.value.trim();
      const quantidade = parseInt(form.quantidade.value, 10);
      const valor = parseFloat(form.valor.value);
      const fornecedor = form.fornecedor.value.trim();

      if (nome === "") {
        alert("O campo Nome do Produto é obrigatório.");
        cancela_eventos(event);
        return false;
      }

      if (isNaN(quantidade) || quantidade <= 0) {
        alert("A quantidade deve ser maior que zero.");
        cancela_eventos(event);
        return false;
      }

      if (isNaN(valor) || valor <= 0) {
        alert("O valor deve ser maior que zero.");
        cancela_eventos(event);
        return false;
      }

      if (fornecedor === "") {
        alert("O campo Fornecedor é obrigatório.");
        cancela_eventos(event);
        return false;
      }

      alert("Produto cadastrado com sucesso!");
    }