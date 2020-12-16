function changeExtraForm() {
    id = document.getElementById("ident").value;

    if (id == 00) {
        document.getElementById("Outsider").hidden = false;
        document.getElementById("Student").hidden = true;
        document.getElementById("Staff").hidden = true;
    } else if (id == 01) {
        document.getElementById("Outsider").hidden = true;
        document.getElementById("Student").hidden = false;
        document.getElementById("Staff").hidden = true;
    } else if (id == 10) {
        document.getElementById("Outsider").hidden = true;
        document.getElementById("Student").hidden = true;
        document.getElementById("Staff").hidden = false;
    }
}

function checkPwd(form) {
    if (form.password.value != form.validatePsw.value) {
        alert("密碼輸入錯誤！");
        return false;
    }
    return true;
}