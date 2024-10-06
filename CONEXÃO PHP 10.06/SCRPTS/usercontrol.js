const queryInput = document.getElementById('input-command');
const elementActionSelect = document.getElementById('action-select');
const actionOption = document.getElementsByName('action');

const elementCollumnSelect = document.getElementById('collumn-select');
const labelCollumnSelect = document.getElementById('collumn-select-lbl');
const collumnOption = document.getElementsByName('collumn');

const elementGenderFieldset = document.getElementById('gender-fieldset');
const elementAdminFieldset = document.getElementById('admin-fieldset');

const userIdInput = document.getElementById('input-id');

let queryType = "--";

function activeUserIdInput(disable) {
    userIdInput.disabled = disable;
}

function enableCollumnSelect() {
    activeUserIdInput(true);

    if (actionOption[0].value == 'UPDATE') {
        elementCollumnSelect.style.display = 'block';
        labelCollumnSelect.style.display = 'block';
        queryType = "UPDATE usuario SET ";
        queryInput.value = queryType;
    } else {
        elementCollumnSelect.style.display = 'none';
        labelCollumnSelect.style.display = 'none';
        queryType = "DELETE FROM usuario WHERE id = ";
        queryInput.value = queryType;
        activeUserIdInput(false);
    }
}

function insertID() {
    queryInput.value += userIdInput.value;
}

function insertCollumn() {
    enableCollumnSelect();

    if (collumnOption[0].value == 'gender' || collumnOption[0].value == 'admin') {
        queryType += collumnOption[0].value + " = ";
        queryInput.value = queryType;
        enableFieldsets();
    } else {
        queryType += collumnOption[0].value + " = '(insira novo valor)' WHERE id = ";
        queryInput.value = queryType;
        activeUserIdInput(false);
    }
}

function enableFieldsets() {
    elementGenderFieldset.style.display = 'none';
    elementAdminFieldset.style.display = 'none';

    if (collumnOption[0].value == 'gender') {
        elementGenderFieldset.style.display = 'block';
    } else if (collumnOption[0].value == 'admin') {
        elementAdminFieldset.style.display = 'block';
    }
}

function checkAdminOrGender() {
    if (collumnOption[0].value == 'gender') {
        let checkRadio = document.querySelector('input[name="gender"]:checked');
        if (checkRadio != null) {
            queryInput.value = queryType + checkRadio.value + " WHERE id = ";
            activeUserIdInput(false);
        }
    } else if (collumnOption[0].value == 'admin') {
        let checkRadio = document.querySelector('input[name="admin"]:checked');
        if (checkRadio != null) {
            queryInput.value = queryType + checkRadio.value + " WHERE id = ";
            activeUserIdInput(false);
        }
    }
}

// Event listeners
elementActionSelect.addEventListener("change", enableCollumnSelect);
elementGenderFieldset.addEventListener("change", checkAdminOrGender);
elementAdminFieldset.addEventListener("change", checkAdminOrGender);
elementCollumnSelect.addEventListener("change", insertCollumn);
userIdInput.addEventListener("change", insertID);