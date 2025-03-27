document.getElementById("chatIcon").addEventListener("click", function () {
    document.getElementById("chatBox").style.display = "flex";
});

document.getElementById("closeChat").addEventListener("click", function () {
    document.getElementById("chatBox").style.display = "none";
});

// التعامل مع فتح محادثة معينة
document.querySelectorAll(".chat-item").forEach(item => {
    item.addEventListener("click", function () {
        const userName = this.getAttribute("data-user");
        document.getElementById("chatUserName").textContent = userName;
        document.getElementById("chatBox").style.display = "none";
        document.getElementById("chatWindow").style.display = "flex";
    });
});

// زر الرجوع إلى قائمة المحادثات
document.getElementById("backToList").addEventListener("click", function () {
    document.getElementById("chatWindow").style.display = "none";
    document.getElementById("chatBox").style.display = "flex";
});

// إرسال رسالة
document.getElementById("sendMessage").addEventListener("click", function () {
    const message = document.getElementById("messageInput").value;
    if (message.trim() !== "") {
        const newMessage = document.createElement("p");
        newMessage.textContent = "أنا: " + message;
        document.getElementById("chatBody").appendChild(newMessage);
        document.getElementById("messageInput").value = "";
    }
});


function navigateToPage(value) {
    if (value) {
        window.location.href = value;
    }
}