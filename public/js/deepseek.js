document.addEventListener("DOMContentLoaded", function () {
    const chatbotContainer = document.getElementById("chatbot-container");
    const closeBtn = document.getElementById("close-btn");
    const sendBtn = document.getElementById("send-btn");
    const chatbotInput = document.getElementById("chatbot-input");
    const chatbotMessages = document.getElementById("chatbot-messages");

    const chatbotIcon = document.getElementById("chatbot-icon");
    const closeButton = document.getElementById("close-btn");

    // Toggle chatbot visibility
    chatbotIcon.addEventListener("click", function () {
        chatbotContainer.classList.remove("hidden");
        chatbotIcon.style.display = "none";
    });

    closeButton.addEventListener("click", function () {
        chatbotContainer.classList.add("hidden");
        chatbotIcon.style.display = "flex";
    });

    sendBtn.addEventListener("click", sendMessage);
    chatbotInput.addEventListener("keypress", function (e) {
        if (e.key === "Enter") {
            sendMessage();
        }
    });

    function sendMessage() {
        const userMessage = chatbotInput.value.trim();
        if (userMessage) {
            appendMessage("user", userMessage);
            chatbotInput.value = "";
            getBotResponse(userMessage);
        }
    }

    function appendMessage(sender, message) {
        const messageElement = document.createElement("div");
        messageElement.classList.add("message", sender);
        messageElement.textContent = message;
        chatbotMessages.appendChild(messageElement);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }

    async function getBotResponse(userMessage) {
        const apiKey = "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"; // Replace with your actual API key
        const apiUrl = "https://openrouter.ai/api/v1/chat/completions";

        try {
            const response = await fetch(apiUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${apiKey}`,
                    "HTTP-Referer": "YOUR_WEBSITE_URL", // Required by OpenRouter
                    "X-Title": "YOUR_APP_NAME" // Required by OpenRouter
                },
                body: JSON.stringify({
                    model: "deepseek/deepseek-r1:free", // Note the provider prefix
                    messages: [{ role: "user", content: userMessage }],
                    max_tokens: 150
                })
            });

            if (!response.ok) {
                throw new Error(`API request failed with status ${response.status}`);
            }

            const data = await response.json();
            const botMessage = data.choices[0].message.content;
            appendMessage("bot", botMessage);
        } catch (error) {
            console.error("Error fetching bot response:", error);
            appendMessage("bot", "Sorry, something went wrong. Please try again.");
        }
    }
});

// https://openrouter.ai/api/v1/chat/completions
// deepseek/deepseek-chat-v3-0324:free