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