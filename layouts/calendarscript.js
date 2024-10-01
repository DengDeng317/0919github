const events = {
    '2024-09-28': ['會議', '生日派對'],
    '2024-09-30': ['提交報告'],
};

let currentYear, currentMonth, selectedDate = null;

function createCalendar(year, month) {
    currentYear = year;
    currentMonth = month;
    const calendar = document.getElementById('calendar');
    calendar.innerHTML = ''; // 清空日曆

    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const startOfWeek = new Date(year, month, 1 - firstDay.getDay());
    const endOfWeek = new Date(year, month + 1, 6 - lastDay.getDay());

    // 填充日曆
    for (let date = startOfWeek; date <= endOfWeek; date.setDate(date.getDate() + 1)) {
        const day = document.createElement('div');
        day.className = 'day';
        day.innerText = date.getDate();

        const currentDate = date.toISOString().split('T')[0];

        if (currentDate === `${new Date().toISOString().split('T')[0]}`) {
            day.classList.add('today');
        }

        if (date.getMonth() !== month) {
            day.classList.add('preview');
        }

        if (events[currentDate]) {
            day.classList.add('event');
            day.style.borderColor = '#76c7c0';
        }

        day.addEventListener('click', () => {
            selectDate(currentDate, day);
        });

        calendar.appendChild(day);
    }

    document.getElementById('month-picker').value = `${year}-${String(month + 1).padStart(2, '0')}`;
}

function selectDate(date, dayElement) {
    // 移除之前選中的日期的樣式
    if (selectedDate) {
        const previousSelected = document.querySelector(`.day.selected`);
        if (previousSelected) {
            previousSelected.classList.remove('selected');
        }
    }

    selectedDate = date;
    dayElement.classList.add('selected');

    // 更新事件顯示
    showEvents(date);
}

function showEvents(date) {
    const eventList = events[date] || [];
    const eventsDiv = document.getElementById('events');

    eventsDiv.innerHTML = `<h3>${date} 的事件</h3>`;
    
    if (eventList.length === 0) {
        eventsDiv.innerHTML += '<p>沒有事件</p>';
    } else {
        eventList.forEach(event => {
            eventsDiv.innerHTML += `<p>${event}</p>`;
        });
    }

    // 顯示“確定”按鈕
    document.getElementById('confirm-button').style.display = 'block';
}

document.getElementById('month-picker').addEventListener('input', (e) => {
    const [year, month] = e.target.value.split('-').map(Number);
    createCalendar(year, month - 1); // month從0開始
});

// 切換到上個月
document.getElementById('prev-month').addEventListener('click', () => {
    const newDate = new Date(currentYear, currentMonth - 1);
    createCalendar(newDate.getFullYear(), newDate.getMonth());
});

// 切換到下個月
document.getElementById('next-month').addEventListener('click', () => {
    const newDate = new Date(currentYear, currentMonth + 1);
    createCalendar(newDate.getFullYear(), newDate.getMonth());
});

// 確定按鈕事件
document.getElementById('confirm-button').addEventListener('click', () => {
    if (selectedDate) {
        alert(`已選擇日期: ${selectedDate}`);
        // 可以在這裡添加其他處理邏輯
    }
});

// 預設顯示當前月份的日曆
const currentDate = new Date();
createCalendar(currentDate.getFullYear(), currentDate.getMonth());
