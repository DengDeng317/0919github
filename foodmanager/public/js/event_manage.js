function toggleFolder(id) {
    var content = document.getElementById(id);
    var arrow = document.getElementById('arrow-' + id);
    if (content.style.display === "none" || content.style.display === "") {
        content.style.display = "flex";
        arrow.textContent = "▼"; // 展開時顯示向下箭頭
    } else {
        content.style.display = "none";
        arrow.textContent = "▶"; // 收縮時顯示向右箭頭
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const cardContainer = document.getElementById('cardContainer');
    const cards = Array.from(cardContainer.children);
    let currentIndex = 0;

    document.getElementById('nextBtn').addEventListener('click', function() {
        currentIndex++;
        if (currentIndex >= cards.length) {
            currentIndex = 0;
        }
        updateCards();
    });

    document.getElementById('prevBtn').addEventListener('click', function() {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = cards.length - 1;
        }
        updateCards();
    });

    function updateCards() {
        cards.forEach((card) => {
            card.style.display = 'none';
        });

        let count = 0;
        let index = currentIndex;
        while (count < 7) {
            cards[index].style.display = 'block';
            cards[index].style.order = count;
            index = (index + 1) % cards.length;
            count++;
        }
    }

    // 初始化顯示
    updateCards();
});
