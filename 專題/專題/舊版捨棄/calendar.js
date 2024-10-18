const events = {
    '2024-09-28': [
        { name: '蘋果', image: 'apple.jpg', expiry: '2024-09-28' },
        { name: '牛奶', image: 'milk.jpg', expiry: '2024-09-28' }
    ],
    '2024-09-29': [
        { name: '麵包', image: 'bread.jpg', expiry: '2024-09-29' }
    ]
};

let currentYear, currentMonth, selectedDateElement = null;

// 初始化頁面時顯示提示文字
function initializePage() {
    const eventListDiv = document.getElementById('event-list');
    eventListDiv.innerHTML = '<p>請選擇上方日期檢視</p>';  // 顯示提示
}

function createCalendar(year, month) {
    currentYear = year;
    currentMonth = month;

    const calendar = document.getElementById('calendar');
    calendar.innerHTML = ''; // 清空日曆

    const firstDay = new Date(Date.UTC(year, month, 1)); // 使用UTC，避免時區問題
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

        if (events[currentDate]) {
            day.classList.add('event');
            if (isUpcoming(date)) {
                day.classList.add('upcoming');
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

function isUpcoming(date) {
    const today = new Date();
    const diffTime = date - today;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    return diffDays <= 3 && diffDays >= 0;
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

function showEvents(date) {
    const eventList = events[date] || [];
    const eventListDiv = document.getElementById('event-list');

    eventListDiv.innerHTML = ''; // 清空舊的內容

    if (eventList.length === 0) {
        const emptyItem = document.createElement('div');
        emptyItem.className = 'event-item empty';
        emptyItem.innerHTML = `<p>尚無資料</p>`;
        emptyItem.addEventListener('click', () => {
            alert(`新增 ${date} 的食物`);
        });
        eventListDiv.appendChild(emptyItem);
    } else {
        eventList.forEach(event => {
            const eventItem = document.createElement('div');
            eventItem.className = 'event-item';
            eventItem.innerHTML = `
                <img src="${event.image}" alt="${event.name}">
                <p>${event.name} - 過期日期: ${event.expiry}</p>
            `;
            eventItem.addEventListener('click', () => {
                alert(`編輯食物: ${event.name}`);
            });
            eventListDiv.appendChild(eventItem);
        });
    }
}

// 初始化頁面
initializePage();

// 設置月份變化和日期選擇的邏輯
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
