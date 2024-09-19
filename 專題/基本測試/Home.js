var sidebar = document.getElementById("sidebar");

function toggleSidebar() {
    sidebar.classList.toggle("collapsed");
    var icon = document.querySelector(".sidebar .header h3");
    if (sidebar.classList.contains("collapsed")) {
        icon.innerHTML = "側選單"; // 收縮狀態顯示文字
    } else {
        icon.innerHTML = "側選單 &#9650;"; // 展開狀態顯示文字與圖示
    }
}

function showCurrent() {
    document.getElementById("currentRecords").style.display = "block";
    document.getElementById("wasteRecords").style.display = "none";
    document.getElementById("completedRecords").style.display = "none";
    setActiveLink("current");
    displayRecords("currentList", currentRecords);
}

function showWaste() {
    document.getElementById("currentRecords").style.display = "none";
    document.getElementById("wasteRecords").style.display = "block";
    document.getElementById("completedRecords").style.display = "none";
    setActiveLink("waste");
    displayRecords("wasteList", wasteRecords);
}

function showCompleted() {
    document.getElementById("currentRecords").style.display = "none";
    document.getElementById("wasteRecords").style.display = "none";
    document.getElementById("completedRecords").style.display = "block";
    setActiveLink("completed");
    displayRecords("completedList", completedRecords);
}

function setActiveLink(id) {
    var links = document.querySelectorAll(".sidebar a");
    links.forEach(function(link) {
        link.classList.remove("current");
    });
    document.querySelector(".sidebar a[href='#'][onclick='show" + id.charAt(0).toUpperCase() + id.slice(1) + "()']").classList.add("current");
}

function displayRecords(listId, records) {
    var list = document.getElementById(listId);
    list.innerHTML = "";
    records.forEach(function(record) {
        var recordElement = document.createElement("div");
        recordElement.classList.add("record");
        if (listId === "completedList") {
            recordElement.classList.add("completed");
        } else if (listId === "wasteList") {
            recordElement.classList.add("waste");
        }
        recordElement.textContent = record.type + " - " + record.date;
        list.appendChild(recordElement);
    });
}

// 假設有一些假數據用來測試
var currentRecords = [
    { type: "早餐", date: "2024-06-25" },
    { type: "午餐", date: "2024-06-25" }
];
var wasteRecords = [
    { type: "晚餐", date: "2024-06-24" }
];
var completedRecords = [
    { type: "點心", date: "2024-06-23" }
];

// 初始化顯示當前紀錄
showCurrent();
