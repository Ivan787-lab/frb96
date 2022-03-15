let allDeleteForms = [...document.querySelectorAll(".td__form")]

allDeleteForms.forEach(item => {
    let deleteButton = item.children[1]
    $(document).ready(function () {
        $(deleteButton).click(
            function () {
                deleteAdmin(item.className, "../php/admin/index_page_action/delete_admin.php")
                return false
            }
        );
    });
})



function deleteAdmin(form,url) {
    jQuery.ajax({
        url: url, //url страницы (php/sotrudniki.php)
        type: "POST", //метод отправки
        dataType: "text", //формат данных
        data: jQuery("." + form).serialize(),  // Сериализуем объект
        success: function (response) { //Данные отправлены успешно
            const lastRecorders = [...document.querySelectorAll(".body-of-table")]
            lastRecorders.forEach(item => {
                item.remove()
            })

            const admins = JSON.parse(response)
            for (let i = 0; i < admins.length; i++) {
                const mainTr = document.createElement("tr")
                mainTr.classList.add("tbody__tr")

                const tdName = document.createElement("td")
                tdName.innerHTML = admins[i][0]

                const tdPass = document.createElement("td")
                tdPass.innerHTML = admins[i][1]

                const tdRole = document.createElement("td")
                tdRole.innerHTML = admins[i][2]

                const tdId = document.createElement("td")
                tdId.innerHTML = admins[i][3]

                const formTd = document.createElement("td")
                
                const form = document.createElement("form")
                form.setAttribute("action","#")
                form.classList.add("td__form")
                form.setAttribute("method","POST")

                const inputID = document.createElement("input")
                inputID.name = "id"
                inputID.type = "hidden"
                inputID.value = admins[i][3]

                const formBtn = document.createElement("button")
                formBtn.classList.add('form__button')

                const icon = document.createElement("i")
                icon.classList.add("fas")
                icon.classList.add("fa-trash")

                formBtn.append(icon)
                form.append(inputID)
                form.append(formBtn)
                formTd.append(form)


                mainTr.append(tdName)
                mainTr.append(tdPass)
                mainTr.append(tdRole)
                mainTr.append(tdId)
                mainTr.append(formTd)

                document.querySelector(".administrator-accounts-container__table").childNodes[1].append(mainTr)
            }
        },
        error: function (response) { // Данные не отправлены
            console.log("Ошибка. Данные не отправлены.");;
        }
    });
}
