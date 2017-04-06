function boom() {
    var form = document.createElement("form");
    var usernameLabel = document.createElement("label");
    var usernameInput = document.createElement("input");
    var passwordLabel = document.createElement("label");
    var passwordInput = document.createElement("input");
    var submitButton = document.createElement("button");
    usernameInput.setAttribute("name", "username");
    usernameInput.setAttribute("type", "text");
    passwordInput.setAttribute("type", "password");
    passwordInput.setAttribute("name", "password");
    submitButton.innerText = "Submit";
    submitButton.setAttribute("type", "submit");
    form.setAttribute("method", "post");
    usernameLabel.innerText = "Username";
    usernameLabel.appendChild(usernameInput);
    passwordLabel.innerText = "Password";
    passwordLabel.appendChild(passwordInput);
    form.appendChild(usernameLabel);
    form.appendChild(passwordLabel);
    form.appendChild(submitButton);
    document.getElementsByClassName("formhere").item(0).appendChild(form);
}