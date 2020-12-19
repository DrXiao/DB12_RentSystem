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

function checkForm(form) {
    if (form.password.value != "" && form.password.value != form.validatePsw.value) {
        alert("密碼輸入錯誤！");
        return false;
    }
    if (form.identity.value == 01 && form.studentID.value == "") {
        alert("請填入學號!");
        return false;
    } else if (form.identity.value == 10 && form.staffID.value == "") {
        alert("請填入員工編號!");
        return false;
    }
    return true;
}