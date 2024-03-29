const ajax = (acao, form_data, resposta) => {
  fetch("./requests.php", {
    method: "POST",
    body: form_data,
  })
    .then((res) => res.json())
    .then((response) => {
      if (response.status == 200) {
        if (acao == "login_aluno") {
          resposta.innerHTML = `<div class="alert alert-info border-0">${response.msgResponse}</div>`;

          location.reload();
        } else if (acao == "enviar-mensagem" || acao == 'enviar-tcc') {
          window.location.reload();
        } else {
          window.location.href = "./view=login";
        }
      } else {
        resposta.innerHTML = `<div class="alert alert-danger border-0">${response.msgResponse}</div>`;
      }
    });
};

// Ajax para login cadastro de alunos

const formElement = document.querySelector(".form");

formElement.addEventListener("submit", (e) => {
  e.preventDefault();

  const resposta = document.querySelector(".resposta");

  const form_data = new FormData(formElement);

  const acao = form_data.get("acao");

  ajax(acao, form_data, resposta);
});
