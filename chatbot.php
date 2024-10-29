<div class="chatbot-icon" onclick="toggleChatbot()">💬</div>
<div class="chatbot" id="chatbot" style="display: none;">
    <div class="chatbot-header">
        <h3>Form Assistant</h3>
        <span onclick="toggleChatbot()" style="cursor: pointer;">✖️</span>
    </div>
    <div class="chatbot-body">
        <div id="chatbotMessages"></div>
        <div id="chatbotInputs"></div>
    </div>
</div>

<link rel="stylesheet" href="chatbot.css">

<script>
    let questionIndex = 0; 
    let userData = {}; 

    function toggleChatbot() {
        const chatbot = document.getElementById("chatbot");
        chatbot.style.display = chatbot.style.display === "none" ? "flex" : "none";
        if (chatbot.style.display === "flex") {
            startConversation();
        }
    }

    function startConversation() {
        questionIndex = 0; 
        userData = {}; 
        chatbotMessages.innerHTML = `<div class="message">Which type of form would you like to submit?</div>`;
        chatbotInputs.innerHTML = `
            <button onclick="selectFormType('Feedback')">Feedback Form</button>
            <button onclick="selectFormType('Contact')">Contact Form</button>
            <button onclick="selectFormType('Complaint')">Complaint Form</button>
        `;
    }

    function selectFormType(formType) {
        chatbotInputs.innerHTML = ""; 
        chatbotMessages.innerHTML += `<div class="message">You selected: ${formType} Form</div>`;
        askNextQuestion(formType);
    }

    const questions = {
        Feedback: [
            { label: "What is your name?", field: "name" },
            { label: "What is your email?", field: "email" },
            { label: "What is your phone number?", field: "phone" },
            { label: "Please share your feedback:", field: "feedback" }
        ],
        Contact: [
            { label: "What is your name?", field: "name" },
            { label: "What is your email?", field: "email" },
            { label: "What is your phone number?", field: "phone" }
        ],
        Complaint: [
            { label: "What is your name?", field: "name" },
            { label: "What is your email?", field: "email" },
            { label: "What is your phone number?", field: "phone" },
            { label: "Please describe your complaint:", field: "complaint" }
        ]
    };

    function askNextQuestion(formType) {
        if (questionIndex < questions[formType].length) {
            const question = questions[formType][questionIndex];
            chatbotMessages.innerHTML += `<div class="message">${question.label}</div>`;
            chatbotInputs.innerHTML = `
                <input type="text" id="userInput" class="user-input" placeholder="Your answer here" />
                ${questionIndex === questions[formType].length - 1 ? '' : '<button onclick="storeAnswer(\'' + formType + '\', \'' + question.field + '\')">Submit</button>'}
            `;
           
            const userInput = document.getElementById("userInput");
            userInput.focus(); 
            userInput.addEventListener("keypress", function (event) {
                if (event.key === "Enter") {
                    storeAnswer(formType, question.field);
                }
            });
        } else {
           
            submitFormData(formType);
        }
    }

    function storeAnswer(formType, field) {
        const userInput = document.getElementById("userInput").value.trim();
        if (userInput) {
            userData[field] = userInput; 
            questionIndex++; 
            askNextQuestion(formType); 
        } else {
            alert("Please provide an answer before proceeding.");
        }
    }

    function submitFormData(formType) {
        chatbotMessages.innerHTML += `<div class="message">Thank you! Your ${formType} form has been submitted.</div>`;
        chatbotInputs.innerHTML = "";
        fetch("submit.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ form_type: formType, ...userData })
        })
        .then(response => response.text())
        .then(response => {
            chatbotMessages.innerHTML += `<div class="message">${response}</div>`;
            questionIndex = 0; 
            userData = {}; 
        })
        .catch(error => console.error("Error:", error));
    }
</script>
