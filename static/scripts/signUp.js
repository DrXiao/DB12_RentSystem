function changeExtraForm() {
    id = document.getElementById("ident").value;

    if (id == 00) {
        document.getElementById("Student").hidden = true;
        document.getElementById("Outsider").hidden = false;
    } else if (id == 01) {
        document.getElementById("Student").hidden = false;
        document.getElementById("Outsider").hidden = true;
    }
}