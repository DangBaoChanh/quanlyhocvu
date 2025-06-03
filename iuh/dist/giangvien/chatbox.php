 <!-- Nút mở chat -->
  <style>
        body { font-family: Arial, sans-serif; }
        .chat-toggle {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 24px;
            cursor: pointer;
            z-index: 1000;
        }
        .chat-container {
            position: fixed;
            bottom: 100px;
            right: 25px;
            width: 350px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            display: none;
            flex-direction: column;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            z-index: 999;
        }
        .chat-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .chat-body {
            padding: 10px;
            max-height: 300px;
            overflow-y: auto;
            background-color: #f9f9f9;
        }
        .chat-footer {
            padding: 10px;
            border-top: 1px solid #ddd;
        }
        .chat-footer textarea {
            width: 100%;
            height: 60px;
            padding: 5px;
        }
        .chat-footer button {
            margin-top: 5px;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .message { margin: 5px 0; }
        .user { font-weight: bold; color: #333; }
        .bot { background: #e6e6e6; border-radius: 5px; padding: 5px; }
    </style>
<button class="chat-toggle" onclick="toggleChat()">💬</button>

<!-- Chatbox -->
<div class="chat-container" id="chatBox">
    <div class="chat-header">Trợ lý ảo - IUH</div>
    <div class="chat-body" id="chatBody"></div>
    <div class="chat-footer">
        <textarea id="prompt" placeholder="Nhập câu hỏi..." required></textarea>
        <button onclick="sendPrompt()">Gửi</button>
    </div>
</div>

<script>
    function toggleChat() {
        const box = document.getElementById('chatBox');
        box.style.display = box.style.display === 'flex' ? 'none' : 'flex';
    }

    function appendMessage(sender, text) {
        const chatBody = document.getElementById('chatBody');
        const messageDiv = document.createElement('div');
        messageDiv.className = 'message';
        if (sender === 'user') {
            messageDiv.innerHTML = `<div class="user">Bạn:</div><div>${text}</div>`;
        } else {
            messageDiv.innerHTML = `<div class="bot"><strong>Gemini:</strong><br>${text}</div>`;
        }
        chatBody.appendChild(messageDiv);
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    function sendPrompt() {
        const promptInput = document.getElementById('prompt');
        const prompt = promptInput.value.trim();
        if (!prompt) return;

        appendMessage('user', prompt);
        promptInput.value = '';

        fetch('chat_process.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'prompt=' + encodeURIComponent(prompt)
        })
        .then(response => response.text())
        .then(data => {
            appendMessage('bot', data);
        })
        .catch(err => {
            appendMessage('bot', 'Lỗi khi gửi yêu cầu đến Gemini.');
            console.error(err);
        });
    }
</script>