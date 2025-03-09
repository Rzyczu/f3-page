// document.addEventListener("DOMContentLoaded", function () {
//     const form = document.getElementById("contact-form");
//     const nameField = document.getElementById("name");
//     const mailField = document.getElementById("mail");
//     const messageField = document.getElementById("message");
//     const gdprCheckbox = document.getElementById("gdpr");
//     const responseMessage = document.getElementById("form-response");

//     const errors = {
//         name: document.getElementById("name-error"),
//         mail: document.getElementById("mail-error"),
//         gdpr: document.getElementById("gdpr-error"),
//     };

//     function validateEmail(email) {
//         return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
//     }

//     function validateForm() {
//         let valid = true;

//         if (nameField.value.trim() === "") {
//             errors.name.classList.remove("hidden");
//             valid = false;
//         } else {
//             errors.name.classList.add("hidden");
//         }

//         if (!validateEmail(mailField.value.trim())) {
//             errors.mail.classList.remove("hidden");
//             valid = false;
//         } else {
//             errors.mail.classList.add("hidden");
//         }

//         if (!gdprCheckbox.checked) {
//             errors.gdpr.classList.remove("hidden");
//             valid = false;
//         } else {
//             errors.gdpr.classList.add("hidden");
//         }

//         return valid;
//     }

//     form.addEventListener("submit", function (event) {
//         event.preventDefault();

//         if (!validateForm()) return;

//         const formData = new FormData(form);
//         formData.append("action", "contact_form");

//         fetch(form.action, {
//             method: "POST",
//             body: formData
//         })
//             .then(response => response.json())
//             .then(data => {
//                 responseMessage.textContent = data.message;
//                 responseMessage.classList.remove("hidden");
//             })
//             .catch(error => {
//                 responseMessage.textContent = "Wystąpił błąd.";
//                 responseMessage.classList.remove("hidden");
//             });
//     });
// });
