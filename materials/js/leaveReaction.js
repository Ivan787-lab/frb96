import { getParam } from "../../js/main.js"

const btnLike = document.querySelector('.publication-action-form__icon')
const id = getParam("id")

btnLike.addEventListener("click", () => {
    if (btnLike.parentElement.classList.contains("publication-property-container__publication-action-form_grey")) {
        leaveLike("like-span", "like-form", "../php/post/info_action/leave_like.php")
    } else {
        const like_q = document.querySelector("#like-span").innerHTML;
        if (like_q > 0) {
            removeLike("like-span", "like-form", "../php/post/info_action/remove_like.php")
        }
    }
})

if (id == JSON.parse(localStorage.getItem("info" + getParam("id"))).id) {
    if (JSON.parse(localStorage.getItem("info" + getParam("id"))).isLike) {
        btnLike.parentElement.classList.add("publication-property-container__publication-action-form_red")
        btnLike.parentElement.classList.remove("publication-property-container__publication-action-form_grey")
    } else {
        btnLike.parentElement.classList.remove("publication-property-container__publication-action-form_red")
        btnLike.parentElement.classList.add("publication-property-container__publication-action-form_grey")
    }
}

function leaveLike(result_place, ajax_form, url) {
    jQuery.ajax({
        url: url,
        type: "POST",
        datetype: "text",
        data: jQuery("#" + ajax_form).serialize(),
        success: function response(response) {
            let result = jQuery.parseJSON(response)
            document.querySelector("#" + result_place).innerHTML = result
            btnLike.parentElement.classList.add("publication-property-container__publication-action-form_red")
            btnLike.parentElement.classList.remove("publication-property-container__publication-action-form_grey")
            let infoObject = {
                id: id,
                isLike: true
            }
            localStorage.setItem("info" + id, JSON.stringify(infoObject))
        },
        error: function (response) { // Данные не отправлены
            console.log("Ошибка. Данные не отправлены.");
        }
    })
}

function removeLike(result_place, ajax_form, url) {
    jQuery.ajax({
        url: url,
        type: "POST",
        datetype: "text",
        data: jQuery("#" + ajax_form).serialize(),
        success: function response(response) {
            let result = jQuery.parseJSON(response)
            document.querySelector("#" + result_place).innerHTML = result
            btnLike.parentElement.classList.remove("publication-property-container__publication-action-form_red")
            btnLike.parentElement.classList.add("publication-property-container__publication-action-form_grey")
            let infoObject = {
                id: id,
                isLike: false
            }
            localStorage.setItem("info" + id, JSON.stringify(infoObject))
        },
        error: function (response) { // Данные не отправлены
            console.log("Ошибка. Данные не отправлены.");
        }
    })
}