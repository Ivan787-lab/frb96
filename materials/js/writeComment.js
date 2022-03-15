const btnWriteComment = document.querySelector('.write-comment-form__send-comment')



$(document).ready(function () {
    $(btnWriteComment).click(
        function () {
            let is_not_empty = false
            let allInputs = [...document.querySelectorAll(".input-container_input")]
                allInputs.forEach(item => {
                    if (item.value.length > 0) {
                        is_not_empty++
                    }
                })
            if (document.querySelector(".input-container__textarea").value.length > 0 && is_not_empty==2) {
                writeComment("write-comment", "../php/post/comments_action/write_comment.php")
                document.querySelector(".input-container__textarea").value = ""
                let allInputs = [...document.querySelectorAll(".input-container_input")]
                allInputs.forEach(item => {
                    item.value = ""
                })
                $("html, body").animate({ scrollTop: 0 }, 600);
    
            }
            return false
        }
    );
});

function writeComment(ajax_form, url) {
    jQuery.ajax({
        url: url,
        type: "POST",
        datetype: "text",
        data: jQuery("#" + ajax_form).serialize(),
        success: function response(response) {
            let result = jQuery.parseJSON(response)
            document.querySelector("#comments-q").innerHTML = result.length

            console.log(result);

            const container = document.querySelector(".publication-statistics__publication-comments-container")

            const lastComments = [...document.querySelectorAll('.publication-comments-container__comment')]
            lastComments.forEach(item => {
                item.remove()
            })

            for (let i = 0; i < result.length; i++) {
                const commentContainer = document.createElement("div")
                commentContainer.classList.add("publication-comments-container__comment")
                commentContainer.id = result[i]["id"]

                const commentName = document.createElement("p")
                commentName.classList.add("comment__name")
                commentName.innerText = result[i]["name"]

                const commentText = document.createElement("xmp")
                commentText.classList.add("comment__text")
                commentText.innerText = result[i]["text"]

                const form = document.createElement("form")
                form.classList.add("publication-comments-container__comment-action-form")
                form.classList.add("publication-comments-container__comment-action-form_send-lawsuit-comment-form")
                form.setAttribute("method", "POST")
                form.setAttribute("action","../php/post/comments_action/send_lawsuit.php")
                form.id = result[i]["id"]

                const button = document.createElement("button")
                button.classList.add("comment-action-form__button-send-lawsuit")
                button.innerHTML = "Отправить жалобу"
                form.append(button)

                const input1 = document.createElement("input")
                input1.type = "hidden"
                input1.setAttribute("name","comment_id")
                input1.value = result[i]["id"]
                form.append(input1)
                
                const input2 = document.createElement("input")
                input2.type = "hidden"
                input2.setAttribute("name","post_id")
                input2.value = result[i]["post_id"]
                form.append(input2)

                commentContainer.append(commentName)
                commentContainer.append(commentText)
                commentContainer.append(form)
                container.append(commentContainer)
            }

        },
        error: function (response) { // Данные не отправлены
            console.log("Ошибка. Данные не отправлены.");
        }
    })
}