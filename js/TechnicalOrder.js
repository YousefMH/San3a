function searchTechnicians() {
    let techniciansList = document.getElementById("technicians-list");
    techniciansList.innerHTML = "";
    let technicians = [
        { name: "كريم محمد", specialty: "نجار", rating: "4.5" },
        { name: "أحمد علي", specialty: "سباك", rating: "4.8" },
        { name: "محمود حسن", specialty: "حداد", rating: "4.6" }
    ];
    
    technicians.forEach(tech => {
        let card = document.createElement("div");
        card.className = "card";
        card.innerHTML = `
            <img src="avatar.png" alt="Avatar">
            <h3>${tech.name}</h3>
            <p>${tech.specialty}</p>
            <p>⭐ ${tech.rating}</p>
            <div class="actions">
                <button onclick="addToFavorites('${tech.name}')">❤️</button>
                <button onclick="shareTech('${tech.name}')">🔗</button>
                <button onclick="reportTech('${tech.name}')">⚠️</button>
            </div>
        `;
        techniciansList.appendChild(card);
    });
}

function addToFavorites(name) {
    alert(`${name} تمت إضافته للمفضلة!`);
}

function shareTech(name) {
    alert(`مشاركة ${name}`);
}

function reportTech(name) {
    alert(`تم الإبلاغ عن ${name} وسيتم مراجعة الطلب.`);
}



function navigateToPage(value) {
    if (value) {
        window.location.href = value;
    }
}