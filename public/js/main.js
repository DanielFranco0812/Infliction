document.addEventListener("DOMContentLoaded", () => {
    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                obs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

    const chatWidget = document.getElementById('chat-widget');
    const chatBubble = document.getElementById('chat-bubble');
    const closeChatBtn = document.getElementById('close-chat-btn');
    const chatMessages = document.getElementById('chat-messages');
    const chatInput = document.getElementById('chat-input');
    const sendBtn = document.getElementById('send-btn');

    if (chatBubble && chatWidget) {
        const conversation = [];

        function addMessage(text, sender) {
            const msgDiv = document.createElement('div');
            msgDiv.className = `message ${sender === 'user' ? 'user-msg' : 'bot-msg'}`;
            msgDiv.textContent = text;
            chatMessages.appendChild(msgDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;

            if (sender === 'user' || sender === 'bot') {
                conversation.push({ role: sender === 'user' ? 'user' : 'assistant', content: text });
            }
        }

        function addQuickReply(label) {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'quick-reply';
            btn.textContent = label;
            btn.addEventListener('click', () => handleSend(label));
            chatMessages.appendChild(btn);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        const welcomeText = 'Hi! I\'m Infliction Assistant. How can I help you today?';
        addMessage(welcomeText, 'bot');
        addQuickReply('how are you');

        chatBubble.addEventListener('click', () => {
            chatWidget.classList.add('active');
            chatBubble.style.display = 'none';
        });

        closeChatBtn.addEventListener('click', () => {
            chatWidget.classList.remove('active');
            chatBubble.style.display = 'flex';
        });

        async function handleSend(userInput = null) {
            const userText = (userInput ?? chatInput.value).trim();
            if (!userText) return;

            if (!userInput) {
                addMessage(userText, 'user');
            }

            chatInput.value = '';

            const loading = document.createElement('div');
            loading.className = 'message bot-msg';
            loading.textContent = 'Thinking...';
            chatMessages.appendChild(loading);
            chatMessages.scrollTop = chatMessages.scrollHeight;

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
                const response = await fetch('/api/chatbot', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        message: userText,
                        conversation: conversation.slice(0, -1)
                    })
                });

                const data = await response.json();
                const reply = data.reply || 'I can help with memberships, classes, and gym hours.';

                loading.remove();
                addMessage(reply, 'bot');
            } catch (error) {
                loading.remove();
                addMessage('I am having trouble reaching the assistant right now. Please call our front desk at (044) 766-0000.', 'bot');
            }
        }

        sendBtn.addEventListener('click', () => handleSend());
        chatInput.addEventListener('keypress', (e) => { if (e.key === 'Enter') handleSend(); });
    }
});

function calculateBMI() {
    const weight = parseFloat(document.getElementById('bmi-weight').value);
    const heightCm = parseFloat(document.getElementById('bmi-height').value);
    const resultText = document.getElementById('bmi-result');

    if (!weight || !heightCm) {
        resultText.textContent = 'Please enter valid numbers.';
        resultText.style.color = '#ff4444';
        return;
    }

    const heightM = heightCm / 100;
    const bmi = (weight / (heightM * heightM)).toFixed(1);

    let category = '';
    if (bmi < 18.5) category = 'Underweight - Time to bulk up!';
    else if (bmi < 24.9) category = 'Normal weight - Keep it up!';
    else if (bmi < 29.9) category = 'Overweight - Let\'s cut some calories.';
    else category = 'Obese - Time for serious training.';

    resultText.style.color = '#e31837';
    resultText.textContent = `Your BMI is ${bmi}: ${category}`;
}
