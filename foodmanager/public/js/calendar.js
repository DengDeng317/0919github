
let currentYear, currentMonth, selectedDateElement = null;

// 初始化頁面時顯示提示文字
function initializePage() {
    const eventListDiv = document.getElementById('event-list');
    eventListDiv.innerHTML = '<div class="no-interaction"><p>請選擇上方日期檢視</p></div>';  // 顯示提示
}


// 檢查是否為即將過期的物品
function isUpcoming(date) {
    const today = new Date();
    const diffTime = date - today;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    return diffDays <= 7 && diffDays >= 0;  // 快過期的判定範圍：7天內
}

function selectDate(date, dayElement) {
    // 移除上一次選取的日期樣式
    if (selectedDateElement) {
        selectedDateElement.classList.remove('selected');
    }

    // 設置新選取的日期樣式
    selectedDateElement = dayElement;
    dayElement.classList.add('selected');

    // 顯示該日期的事件
    showEvents(date);
}


// 初始化頁面
initializePage();

document.getElementById('month-picker').addEventListener('input', (e) => {
    const [year, month] = e.target.value.split('-').map(Number);
    createCalendar(year, month - 1);
});

document.getElementById('prev-month').addEventListener('click', () => {
    const newDate = new Date(Date.UTC(currentYear, currentMonth - 1));
    createCalendar(newDate.getUTCFullYear(), newDate.getUTCMonth());
});

document.getElementById('next-month').addEventListener('click', () => {
    const newDate = new Date(Date.UTC(currentYear, currentMonth + 1));
    createCalendar(newDate.getUTCFullYear(), newDate.getUTCMonth());
});

// 預設顯示當前月份的日曆
const currentDate = new Date();
createCalendar(currentDate.getUTCFullYear(), currentDate.getUTCMonth());

function showEvents(date) {
    const eventList = events[date] || [];
    const eventListDiv = document.getElementById('event-list');

    eventListDiv.innerHTML = ''; // 清空舊的內容

    if (eventList.length === 0) {
        const emptyItem = document.createElement('div');
        emptyItem.className = 'event-item empty';
        emptyItem.innerHTML = `<p>尚無資料</p>`;
        eventListDiv.appendChild(emptyItem);
    } else {
        eventList.forEach((event, index) => {
            const eventItem = document.createElement('div');
            eventItem.className = 'event-item';
            eventItem.innerHTML = `
                <img src="${event.image}" alt="${event.name}">
                <p>${event.name}</p>
                <button class="complete-btn" data-date="${date}" data-index="${event.id}">完成</button>
            `;

            // 設置 modal 屬性和事件
            eventListDiv.appendChild(eventItem);
        });

        // 增加事件監聽器，處理點擊「完成」按鈕的操作
        document.querySelectorAll('.complete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const eventDate = this.getAttribute('data-date');
                const eventIndex = this.getAttribute('data-index');

                // 標記該食物為「完成」
                markAsComplete(eventDate, eventIndex);
            });
        });
    }
}

function createCalendar(year, month) {
    currentYear = year;
    currentMonth = month;

    const calendar = document.getElementById('calendar');
    calendar.innerHTML = ''; // 清空日曆

    const firstDay = new Date(Date.UTC(year, month, 1));
    const lastDay = new Date(Date.UTC(year, month + 1, 0));
    const startOfWeek = new Date(firstDay);
    startOfWeek.setUTCDate(firstDay.getUTCDate() - firstDay.getUTCDay());
    const endOfWeek = new Date(lastDay);
    endOfWeek.setUTCDate(lastDay.getUTCDate() + (6 - lastDay.getUTCDay()));

    for (let date = new Date(startOfWeek); date <= endOfWeek; date.setUTCDate(date.getUTCDate() + 1)) {
        const day = document.createElement('div');
        day.className = 'day';
        day.innerText = date.getUTCDate();

        const currentDate = date.toISOString().split('T')[0];

        if (currentDate === new Date().toISOString().split('T')[0]) {
            day.classList.add('today');
        }

        // 檢查是否有事件，且狀態不是「完成」或「過期」
        if (events[currentDate]) {
            const hasValidEvent = events[currentDate].some(event => event.status !== '完成' && event.status !== '過期');
            if (hasValidEvent) {
                day.classList.add('event');
            }
        }

        if (date.getUTCMonth() !== month) {
            day.classList.add('preview');
        }

        day.addEventListener('click', () => {
            selectDate(currentDate, day);
        });

        calendar.appendChild(day);
    }

    document.getElementById('month-picker').value = `${year}-${String(month + 1).padStart(2, '0')}`;
}

function checkForExpiredItems() {
    const today = new Date().toISOString().split('T')[0];

    // 檢查所有事件，過期的標記為「過期」
    for (const date in events) {
        events[date].forEach(event => {
            if (new Date(event.expiry) < new Date(today)) {
                event.status = '過期'; // 如果過期，標記為「過期」
            }
        });
    }

    // 重新生成日曆
    createCalendar(currentYear, currentMonth);
}

// 在頁面載入時檢查是否有過期的項目
checkForExpiredItems();
