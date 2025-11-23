<script>
	emailjs.init("wID3L0Rxnra-oEen_"); 
	
document.getElementById("portfolio-contact-form").addEventListener("submit", function (e) {
    e.preventDefault();
 
    const fileInput = document.getElementById("fileUpload");
    let fileBase64 = "";
 
    if (fileInput.files.length > 0) {
        const reader = new FileReader();
        reader.onload = function () {
            fileBase64 = reader.result.split(',')[1]; 
            sendEmail(fileBase64);
        };
        reader.readAsDataURL(fileInput.files[0]);
    } else {
        sendEmail("");
    }

    function sendEmail(attachment) {
        emailjs.send("service_wr8es65", "template_g61dowf", {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            phone: document.getElementById("phone").value,
            projectType: document.getElementById("projectType").value,
            budget: document.getElementById("budget").value,
            contactMethod: document.getElementById("contactMethod").value,
            deadline: document.getElementById("deadline").value,
            subject: document.getElementById("subject").value,
            message: document.getElementById("message").value,
            attachment: attachment  
        })
        .then(function () {
           
			Swal.fire({
  title: "Success",
  text: "Message sent successfully!",
  icon: "success"
});  
            document.getElementById("portfolio-contact-form").reset();
        }, function (error) {
		Swal.fire({
  title: "Error",
  text: "Failed to send message. Please try again.",
  icon: "warning"
});  
        });
    }
});
</script>