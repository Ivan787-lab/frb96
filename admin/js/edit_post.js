const allForms = [...document.querySelectorAll(".info-about-material__status-of-material")]

for (let i = 0; i < allForms.length; i++) {
    $(allForms[i].children[0]).click(
        function () {
            deleteFile(allForms[i].getAttribute("class"), "../php/admin/material_action/delete_file.php")
            allForms[i].parentElement.remove()
            return false
        }
    );
}

function deleteFile(form, url) {
    jQuery.ajax({
        url: url, //url страницы (php/sotrudniki.php)
        type: "POST", //метод отправки
        dataType: "text", //формат данных
        data: jQuery('.' + form).serialize(),  // Сериализуем объект
        success: function (response) { //Данные отправлены успешно
            console.log(response);
        },
        error: function (response) { // Данные не отправлены
            console.log("Ошибка. Данные не отправлены.");
            console.log(response);
        }
    });
}