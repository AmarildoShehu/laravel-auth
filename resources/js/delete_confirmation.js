// Raccolgo tutti gli elementi che servono
const deleteForms = document.querySelectorAll(".delete-forms");
const modal = document.getElementById("modal");
const modalBody = document.querySelector(".modal-body");
const modalTitle = document.querySelector(".modal-title");
const confirmationButton = document.getElementById("modal-confirmation-button");

let activeForm = null;
deleteForms.forEach((form) =>
    form.addEventListener("submit", (e) => {
        // Blocco temporaneamente l'invio
        e.preventDefault();

        activeForm = form;

        // inserisco i contenuti
        confirmationButton.innerText = "Conferma Elimina";
        confirmationButton.className = "btn btn-danger";
        modalTitle.innerText = "Elimina post";
        modalBody.innerText = "Sei sicuro vuoi eliminare il post";
    })
);

confirmationButton.addEventListener("click", () => {
    if (activeForm) activeForm.submit();
});

modal.addEventListener("hidden.bs.modal", () => {
    activeForm = null;
});
