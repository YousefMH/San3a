var error = document.getElementById("error");
var form = document.getElementById("form");
var form = document.getElementById("form");
var phone = document.getElementById("phone");
var password = document.getElementById("password");


form.addEventListener("submit", function ( event ) {
    event.preventDefault();
    if (phone.value === "" || password.value === "") {
        error.textContent = "يرجى تعبئة جميع الحقول";
    } else {
        error.textContent = "";
        form.submit();
    }



}); 


function navigateToPage(value) {
    if (value) {
        window.location.href = value;
    }
}










