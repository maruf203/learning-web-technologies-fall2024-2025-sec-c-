function validateForm() {
    var name = document.forms["registerForm"]["name"].value;
    var contact_no = document.forms["registerForm"]["contact_no"].value;
    var username = document.forms["registerForm"]["username"].value;
    var password = document.forms["registerForm"]["password"].value;

    if (name == "" || contact_no == "" || username == "" || password == "") {
        alert("All fields must be filled out");
        return false;
    }
    return true;
}
