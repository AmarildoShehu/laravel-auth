const deleteForms = document.querySelectorAll(".delete-forms");
deleteForms.forEach((form) =>
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const hasConfirmed = confirm("Sei sicuro di vler eliminare il post?");
        if (hasConfirmed) form.submit();
    })
);
