document.addEventListener("DOMContentLoaded", function (ev) {
    const blockApproveButtons = document.querySelectorAll('.blockApproveButton');
    blockApproveButtons.forEach(function (button) {
        button.addEventListener('click', function (ev) {
            let target = ev.target;
            let commentId = target.parentElement.getAttribute('data-comment__id');
            let newStatus = target.value;
            let commentItem = target.parentElement.parentElement;



            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        console.log('RESPONSE ', this.responseText);
                        let res = JSON.parse(this.responseText);
                        if (res.success) {
                            commentItem.remove();
                        } else {
                            console.log("Failed action")
                        }
                    } else {
                        console.log('Failed async call');
                    }
                }
            };
            xmlhttp.open("POST", `?action=approveBlock&commentId=${commentId}&newStatus=${newStatus}`, true);
            xmlhttp.send();
        });
    });
});