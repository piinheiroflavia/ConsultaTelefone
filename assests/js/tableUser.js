console.log('foi')
function detalhesUsuario(userId, nome_usuario, sexo, data_nasc, nome_materno, login, email, cpf, celular, telefone, cep, logradouro, bairro, uf, senha, tipoUser, status) {
    // Preencher as informações do usuário no modal
    var userDetailsContent = document.getElementById('userDetailsContent');
    userDetailsContent.innerHTML = `
        <div>
        <p>ID: ${userId}</p>
        <p>Nome do Usuário: ${nome_usuario}</p>
        </div>

        <div>
        <p>Sexo: ${sexo}</p>
        <p>Data de Nascimento: ${data_nasc}</p>
        </div>

        <div>
        <p>Nome Materno: ${nome_materno}</p>
        <p>Login: ${login}</p>
        </div>

        <div>
        <p>Email: ${email}</p>
        <p>CPF: ${cpf}</p>
        </div>

        <div>
        <p>Celular: ${celular}</p>
        <p>Telefone: ${telefone}</p>
        </div>

        <div>
        <p>CEP: ${cep}</p>
        <p>Logradouro: ${logradouro}</p>
        </div>

        <div>
        <p>Bairro: ${bairro}</p>
        <p>UF: ${uf}</p>
        </div>

        <div>
        <p>Senha: ${senha}</p>
        <p>Tipo de Usuário: ${tipoUser}</p>
        <p>Status: ${status}</p>
        </div>
    `;

    // Abre o modal
    var userDetailsModal = new bootstrap.Modal(document.getElementById('userDetailsModal'));
    userDetailsModal.show();
}



function editarUsuario(id, nome_usuario, sexo, data_nasc, nome_materno, login, email, cpf, celular, telefone, cep, logradouro, bairro, uf, senha, tipoUser, status) {
// Preencher os campos do modal com os dados do usuário
document.getElementById("edit_id_modal").value = id;
    document.getElementById("edit_nome_usuario_modal").value = nome_usuario;
    document.getElementById("edit_login_modal").value = login; // Corrigido aqui


// Preencha outros campos conforme necessário

// Abrir o modal de edição
var editarUsuarioModal = new bootstrap.Modal(document.getElementById('editarUsuarioModal'));
editarUsuarioModal.show();
}
function excluirUsuario(userId) {
if (confirm("Tem certeza de que deseja excluir este usuário?")) {
    Swal.fire({
        title: 'Tem certeza?',
        text: 'Esta ação não pode ser revertida!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, exclua!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(window.location.href, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + userId,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remover a linha da tabela
                    var row = document.querySelector('tr[data-id="' + userId + '"]');
                    if (row) {
                        row.remove();
                    }

                    Swal.fire({
                        title: 'Excluído!',
                        text: 'Usuário excluído com sucesso.',
                        icon: 'success',
                        timer: 5000, // 5 segundos
                        timerProgressBar: true,
                        onClose: () => {
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Erro!',
                        text: 'Erro ao excluir o usuário: ' + data.error,
                        icon: 'error'
                    });
                }
            })
            .catch(error => console.error('Erro ao excluir usuário:', error));
        }
    });
}
}

document.getElementById('btnGerarPDF').addEventListener('click', function() {
  // Instancia o objeto jsPDF
  var doc = new jsPDF();

  // Pega a tabela
  var tabela = document.getElementById('tabela');

  // Converte a tabela para um array de arrays de dados
  var dados = [];
  var linhas = tabela.getElementsByTagName('tr');
  for (var i = 0; i < linhas.length; i++) {
     var linha = [];
     var colunas = linhas[i].getElementsByTagName('td');
     for (var j = 0; j < colunas.length; j++) {
        linha.push(colunas[j].innerText);
     }
     dados.push(linha);
  }

  // Adiciona os dados ao PDF
  doc.autoTable({
     head: [['ID', 'Usuário', 'Login','Status','Email'  ]], // Cabeçalho da tabela no PDF
     body: dados,
  });

  doc.save('tabela.pdf');
});



