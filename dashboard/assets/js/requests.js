function sweet(tipo, msg, title) {
  Swal.fire({
    title: title,
    text: msg,
    icon: tipo,
  });
}

const ajax = (acao, form_data, resposta) => {
  fetch("../front/requests.php", {
    method: "POST",
    body: form_data,
  })
    .then((res) => res.json())
    .then((response) => {
      if (response.status == 200) {
        if (
          acao == "login-admin" ||
          acao == "cadastrar-funcionario" ||
          acao == "cadastrar-tutor" ||
          acao == "associar-tutor-aluno" ||
          acao == "enviar-mensagem" ||
          acao == "login-docente"
        ) {
          sweet("SUCESSO", response.msgResponse, "Sucesso");
          setTimeout(() => {
            window.location.reload();
          }, 2000);
        } else {
          location.href = "./view=login";
        }
      } else {
        sweet("error", response.msgResponse, "ERRO");
        //  resposta.innerHTML = `<div class="alert alert-danger border-0">${response.msgResponse}</div>`;
      }
    });
};

// Ajax para Requests POST

const formElement = document.querySelector(".form");
const formElement_modal = document.querySelector(".form_modal");

formElement.addEventListener("submit", (e) => {
  e.preventDefault();

  const resposta = document.querySelector(".resposta");

  const form_data = new FormData(formElement);

  const acao = form_data.get("acao");

  ajax(acao, form_data, resposta);
});

formElement_modal.addEventListener("submit", (e) => {
  e.preventDefault();

  const resposta = document.querySelector(".resposta_modal");

  const form_data = new FormData(formElement_modal);

  const acao = form_data.get("acao");

  ajax(acao, form_data, resposta);
});
