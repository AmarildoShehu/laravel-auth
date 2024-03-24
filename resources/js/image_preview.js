const placeholder = "https://";
const input = document.getElementById("image");
const preview = document.getElementById("preview");

input.addEventListener("input", () => {
    preview.src = input.value || placeholder;
});
