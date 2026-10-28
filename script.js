document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("enquiryForm");

    if (form) {

        form.addEventListener("submit", function (event) {

            const name =
                document.getElementById("visitor_name").value.trim();

            const email =
                document.getElementById("email").value.trim();

            const service =
                document.getElementById("service").value;

            const message =
                document.getElementById("message").value.trim();


            if (
                name === "" ||
                email === "" ||
                service === "" ||
                message === ""
            ) {

                alert("Please complete all fields.");

                event.preventDefault();

                return;
            }


            if (!email.includes("@")) {

                alert("Please enter a valid email address.");

                event.preventDefault();

                return;
            }

        });

    }

});
